<?php

namespace App\Http\Controllers;

class SendSMSController extends Controller
{
    public function gw_send_sms($sms_from, $sms_to, $sms_msg)
    {

        $ch = curl_init();
        $parameters = array(
            'apikey' => 'af1f70d45233cbaef2ff17a6e018b60c', //Your API KEY
            'number' => $sms_to,
            'message' => $sms_msg,
            'sendername' => $sms_from
        );
        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);

        //Send the parameters set above with the request
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

        // Receive response from server
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);

        //Show the server response
        echo $output;
    }
}
