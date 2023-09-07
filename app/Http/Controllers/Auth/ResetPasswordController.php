<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\Http\Actions\UserAction;
use App\Http\Actions\MailAction;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function index(Request $request)
    {
        $resetToken = $request->input('resetToken');
        $request->merge(['remember_token' => $resetToken]);

        $request->validate([
            'email'     => 'required',
            'remember_token'  => 'required'
        ]);

        $data = Arr::except($request->all(), ['_token']);

        return view('auth.reset', [
            'email' => data_get($data, 'email'),
            'resetToken' => data_get($data, 'remember_token')
        ]);
    }

    public function reset(Request $request)
    {
        $resetToken = $request->input('resetToken');
        $request->merge(['remember_token' => $resetToken]);

        $request->validate([
            'email'     => ['required', 'email'],
            'password' => ['required', 'string', 'min:8'],
            'remember_token'  => 'required'
        ]);

        $email = $request->input('email');
        $remember_token = $request->input('remember_token');
        $newPassword = $request->input('password');

        $flag = UserAction::resetPassword($email, $remember_token, $newPassword);

        if($flag)
        {
            //Mail::to($data['email'])->send(new MailHelper($mailData));
            return redirect('/login')->with('reset_success', 'reset_success');
        }
        else{
            return redirect('/login')->with('reset_fail', 'reset_fail');
        }
    }
}
