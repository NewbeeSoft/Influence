<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use Session;

use App\Models\User;
use App\Models\Profile;
use App\Models\UserRole;


use App\Http\Actions\UserAction;
use App\Http\Actions\MailAction;

use App\Mail\MailHelper;

use App\Http\Datas\MailData;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('signed')->only('verify');
        // $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function index(Request $request)
    {
        $email = Session::get('resend_email');

        return view('auth.verify', [
            'email' => $email
        ]);
    }

    public function resend(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $data = Arr::except($request->all(), ['_token']);

        $email = Session::get('resend_email');
        $verifyCode = Str::random(12);

        $resetFlag = UserAction::resetToken($email, $verifyCode);

        $error = null;

        if($resetFlag)
        {
            $verifyLink = 'https://twhive.com/verify/auth/email?email='.$data['email'].'&verifyCode='.$verifyCode;

            $mailData = new MailData;
            $mailData->content = $verifyLink;

            Mail::to($data['email'])->send(new MailHelper($mailData));
        }
        else
        {
            $error = 'resend_error';
        }



        return view('auth.verify', [
            'email' => $email,
            'error' => $error,
        ]);
    }


}
