<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;

class MailAction extends Controller
{
    public static function sendSystemMail()
    {
        // Mail::to($request->user())
        //     ->cc($moreUsers)
        //     ->bcc($evenMoreUsers)
        //     ->queue(new OrderShipped($order));
        Mail::raw('Now I know how to send emails with Laravel', function($message)
        {
            $message->subject('Hi There!!');
            $message->from(config('mail.from.address'), config("app.name"));
            $message->to('topstar199026@gmail.com');
        });
    }
}
