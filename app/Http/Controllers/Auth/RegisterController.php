<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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

use App\Mail\MailHelper;

use App\Http\Datas\MailData;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $roleId = $data['type'] == '0' ? 5 : 7;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Profile::create([
            'user_id' => $user->id
        ]);
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => $roleId
        ]);



        return $user;
    }

    public function index(Request $request)
    {
        $data = Arr::except($request->all(), ['_token']);

        $type = 'brand';
        if(Arr::exists($data, 'type') && data_get($data, 'type') === 'influencer') $type = 'influencer';

        return view('auth.register', [
            'type' => $type
        ]);
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $data = Arr::except($request->all(), ['_token']);

        $roleId = $data['type'] == 0 ? 5 : 7;

        $verifyCode = Str::random(12);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'remember_token' => $verifyCode
        ]);

        Profile::create([
            'user_id' => $user->id,
            'public_email' => $data['email']
        ]);
        UserRole::create([
            'user_id' => $user->id,
            'role_id' => $roleId
        ]);

        $verifyLink = 'https://twhive.com/verify/auth/email?email='.$data['email'].'&verifyCode='.$verifyCode;

        $mailData = new MailData;
        $mailData->content = $verifyLink;

        Mail::to($data['email'])->send(new MailHelper($mailData));
        //return $user;
        //return redirect('/login')->with('register_success', 'register_success');

        Session::put('resend_email', $data['email']);

        return redirect('/verify');
    }
}
