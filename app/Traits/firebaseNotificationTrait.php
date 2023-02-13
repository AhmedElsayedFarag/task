<?php
namespace App\Traits;
use App\Models\User;

trait firebaseNotificationTrait {
    public function sendNotification($firebaseToken,$type,$notification_data){
        $title = trans('messages.'.$type);
        if ($type == 'follow'){
            $body = User::find($notification_data['user_id'])->first_name.' '.User::find($notification_data['user_id'])->last_name.' '.trans('messages.start_follow');
        }elseif ($type == 'offer'){
            $body = User::find($notification_data['user_id'])->first_name.' '.User::find($notification_data['user_id'])->last_name.' '.trans('messages.sent_offer');
        }elseif ($type == 'message'){
            $body = User::find($notification_data['user_id'])->first_name.' '.User::find($notification_data['user_id'])->last_name.' '.trans('messages.sent_message');
        }else{
            $body='محتوى تجريبى';
        }
        $SERVER_API_KEY = 'AAAAg018bAo:APA91bEzYJFrnNPBJaPQ86NJE0d67ETxWMN_rSBnCx2qlZdXbwavBeLcOvQP8n3_GGX0PGBiJRfpWpr4qPd2clVrzbwLjd-74_JkNoDK6-Z7mB6H-I5EjDIbi_13qBKRp7C1cALx8TlP';
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $title,
                "body" => $body,
            ]
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
        return $response;
    }//end sendNotification
    public function sendAdminNotification($firebaseToken,$title,$body){
        $SERVER_API_KEY = 'AAAAg018bAo:APA91bEzYJFrnNPBJaPQ86NJE0d67ETxWMN_rSBnCx2qlZdXbwavBeLcOvQP8n3_GGX0PGBiJRfpWpr4qPd2clVrzbwLjd-74_JkNoDK6-Z7mB6H-I5EjDIbi_13qBKRp7C1cALx8TlP';
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $title,
                "body" => $body,
            ]
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
        return $response;
    }//end sendNotification

}
