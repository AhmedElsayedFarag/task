<?php
namespace App\Traits;
trait sendSmsTrait {
    function sendSms($code,$phone){
        $MessageBody="Your%20verification%20code%20is%20$code";
        $url = "https://api.javna.com:444/epicenter/gatewaysendG.asp?LoginName=Muyawama&Password=D56bb78&MsgTyp=5&MessageRecipients=962$phone&MessageBody=$MessageBody&SenderName=KBG1";

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                // Set Here Your Requesred Headers
                'Content-Type: application/json',
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            print_r(json_decode($response));
        }
    }//end sendPhoneVerificationCode
}
