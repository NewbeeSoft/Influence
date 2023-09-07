<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\Http\Actions\UserAction;
use App\Http\Actions\MailAction;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $username;

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    //     $this->username = $this->findUsername();
    // }

    // public function findUsername()
    // {
    //     $login = request()->input('email');

    //     $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

    //     request()->merge([$fieldType => $login]);

    //     return $fieldType;
    // }

    // public function username()
    // {
    //     return $this->username;
    // }

    public function selectAuthType(Request $request)
    {
        $login = $request->input('email');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $request->merge([$fieldType => $login]);

        $request->request->add(['member_activate' => 1]);
        switch ($fieldType)
        {
            case 'email':
                return true;
                break;
            case 'name':
                return false;
                break;
        }
    }

    public function index(Request $request)
    {
        return $data = Arr::except($request->all(), ['_token']);
        return view('auth.login', ['success' => 'false']);
    }

    public function login(Request $request)
    {
        $this->selectAuthType($request);
        $validator = $this->selectAuthType($request) ?
            $request->validate([
                'email'     => 'required',
                'password'  => 'required',
                'member_activate'  => 'required'
                //'password'  => 'required|min:6'
            ])
            :
            $request->validate([
                'name'     => 'required',
                'password'  => 'required',
                'member_activate'  => 'required'
                //'password'  => 'required|min:6'
            ])
        ;
        if (Auth::attempt($validator))
        {
            return redirect()->intended('profile');
        }
        else
        {
            return view('auth.login', ['authFail' => 'authFail']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    public function actionLogin(Request $request)
    {
        MailAction::sendSystemMail();
        return 1;
    //    return view('test', ['test' => count(UserAction::checkSocialState())]);
    //    $socialCount = count(UserAction::checkSocialState());

    }
}
