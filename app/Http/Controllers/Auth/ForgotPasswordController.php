<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;



use App\Mail\MailHelper;

use App\Http\Datas\MailData;

use App\Http\Actions\UserAction;
use App\Http\Actions\MailAction;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(Request $request)
    {
        return view('auth.forgot', ['NOCAPTCHA_SITEKEY' => env('NOCAPTCHA_SITEKEY', null)]);
    }

    public function forgot(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $email = $request->input('email');
        $gSec = $request->input('g-recaptcha-response');

        $resetToken = Str::random(64);

        $user = UserAction::getUserByEmail($email);
        $user->remember_token = $resetToken;
        $user->save();

        $resetLink = 'https://twhive.com/reset?email='.urlencode($email).'&resetToken='.$resetToken;

        $mailData = new MailData;
        $mailData->content = $resetLink;
        $mailData->mailType = 'resetLink';

        Mail::to($email)->send(new MailHelper($mailData));

        return redirect('/login')->with('reset_mail', 'reset_mail');
    }
}
