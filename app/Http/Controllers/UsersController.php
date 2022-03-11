<?php

namespace App\Http\Controllers;

use App\Mail\NewMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function contact(Request $request)
    {
        $name = $_REQUEST["name"];
        $subject = $_REQUEST["subject"];
        $email = $_REQUEST["email"];
        $message = $_REQUEST["message"];

        $to = "eng.abdallah.joma.1221@gmail.com";


        $header = "From:$email \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";

      //  $retval = mail($to,$subject,$message,$header);


        $from = $email;




        $link = '#';

        $details = [
            'to'      => $to,
            'from'    => $from,
            'link'    => $link,
            'subject' => $subject,
            'name'    => $name,
            "message" => $message,
            "text_msg" => '',
        ];
     //   \Mail::to($to)->send(new \App\Mail\NewMail($details));
        Mail::to($to)->send(new NewMail($details));

        /*Mail::send('mail', [], function($message) use ($details){
            $message->to('eng.abdallah.joma.1221@gmail.com', $details['subject'])->subject
            ($details['message']);
            $message->from($details['from'],$details['name']);
        });*/
        echo "Basic Email Sent. Check your inbox.";


    }
}
