<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Ad;
use App\Models\AdImage;
use App\Models\SocialUser;
use App\Models\User;
use App\Models\UserFollow;
use App\Traits\firebaseNotificationTrait;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use firebaseNotificationTrait;

    public function test(){
        dd('ssabc');

        $email = 'ahmed151@gmail.com';
        $first_name = strstr($email,'@',true);
        dd($first_name);

        $notifications = auth()->user()->notifications;
        foreach ($notifications as $notification){
            if (isset($notification->data['chat_id'])){
                $notification->markAsRead();
                dd($notification);
            }
//            var_dump($notification->data);

        }

        dd('ss');
        foreach (AdImage::all() as $image){
            $str = $image->image;
            $str = explode('/',$str);
            $str[2] = $str[2].'jpg';
            $str = implode('/',$str);
            $image->image = $str;
            $image->save();
        }
        foreach (Ad::all() as $ad){
            $str = $ad->image;
            $str = explode('/',$str);
            $str[2] = $str[2].'jpg';
            $str = implode('/',$str);
            $ad->image = $str;
            $ad->save();
        }
        dd('yes');




        $ads = Ad::all();
        $count = 0;

        foreach ($ads as $ad){
            if (!count($ad->images)){
                $ad->forceDelete();
                $count++;
            }
        }
        dd($count);





//        $followers = UserFollow::where('followed_id',6)->pluck('follower_id')->toArray();
//dd($followers);
        $user = User::find(6)->followers->count();
        dd($user);
        $followers = UserFollow::where('follower_id', 6)->pluck('followed_id')->toArray();
dd($followers);


        $data =  app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage("users/13",[
            'id'=>13,
            'data'=>'ahmed ali',
        ]);

dd($data);


        //send notification to followed user
//    $user = User::find(29);
        $notification_data = [
            'user_id'=>1,
            'type'=>'follow',
            'url'=>url('user-profile/1'),
        ];
//    $user->notify(new DefaultUserNotification($notification_data));
        //send push firebase notification
        $result = $this->sendNotification(['d-mzIMcCg0pEspkTUDyNda:APA91bEYePozyum2aaYOJPvkqYvbikMbto8ZF7MjLFi3D7sVeuGPOpcg4wXECMYj8zQ1UF19dCGpdEFYHe3X5U1DWDPfSPxdEmh8gJ60PBNabc5XZ1v8O1qPDWnvA76wfQs4ejDva_SK'],'follow',$notification_data);
//        $result = $this->sendNotification(['dUzKG7a54EGZh15ZFM2yEa:APA91bHC7GeYyiQF88w1mihn-xt2-hArBXict0ZpaOE_W_u0Me0cyDXz3aNEUyxEHFf2LTyS4ymfvb31nCpZTthLO_hstBl1VYgW99U6DuEZE0oJq_55ikz0tO9AZqSV-eYqxP6YTBYU'],'follow',$notification_data);
        dd($result);
        //send notification to followed user
        $user = User::find(1);
//    $user->notify(new DefaultUserNotification([
//        'user_id'=>1,
//        'type'=>'follow',
//        'url'=>url('user-profile/1'),
//    ]));
        dd($user->unreadNotifications);



//    $cats = Http::withHeaders(['lang'=>'en'])->post('https://staging.tajercom.com/api/subcategories',[
//        'category_id'=>33
//    ]);
//    $cats = json_decode($cats->body())->subcategories;
//    $cats = collect($cats);
//    dd($cats->where('id','=',34)->first());
    }

}
