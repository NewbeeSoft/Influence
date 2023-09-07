<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

use App\Http\Actions\UserAction;
use App\Http\Actions\SocialAction;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $resData = array();

        $appId = config('social.appId');
        $resData['appId'] = $appId;

        $profile = UserAction::getProfile();
        $resData['profile'] = $profile;

        $igInfo = SocialAction::getCurrentSocialLink(Auth::id(), $this->INSTAGRAM);
        $resData['igInfo'] = $igInfo;
        $fbInfo = SocialAction::getCurrentSocialLink(Auth::id(), $this->FACEBOOK);
        $resData['fbInfo'] = $fbInfo;

        if($fbInfo === null)
            return redirect()->intended('profile/edit');
        else
            return view('profile.index', $resData);
    }

    public function edit()
    {
        $resData = array();

        $appId = config('social.appId');
        $resData['appId'] = $appId;

        $igLink = config('social.instagram');
        $resData['igLink'] = $igLink;

        $fbLink = config('social.facebook');
        $resData['fbLink'] = $fbLink;

        $profile = UserAction::getProfile();
        $resData['profile'] = $profile;

        $igInfo = SocialAction::getCurrentSocialLink(Auth::id(), $this->INSTAGRAM);
        $resData['igInfo'] = $igInfo;
        $fbInfo = SocialAction::getCurrentSocialLink(Auth::id(), $this->FACEBOOK);
        $resData['fbInfo'] = $fbInfo;

        return view('profile.edit', $resData);
    }

    public function save(Request $request)
    {
        // $validatedData = $request->validate([
        //     'first_name' => ['first_name', 'string', 'max:255'],
        //     'last_name' => ['last_name', 'string', 'max:255'],
        //     'email' => ['email', 'string', 'email', 'max:255', 'unique:users'],
        //     'second_email' => ['second_email', 'string', 'email', 'max:255', 'unique:users'],
        //     'phone' => ['phone', 'string', 'max:255'],
        //     'web_site' => ['web_site', 'string', 'max:255'],
        //     'about_me' => ['about_me', 'string'],
        // ]);

        $data = Arr::except($request->all(), ['_token']);

        $result = UserAction::saveProfile($data);

        return redirect()->intended('profile/edit');
    }
}
