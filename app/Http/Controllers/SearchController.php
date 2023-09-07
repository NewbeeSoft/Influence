<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use App\Http\Actions\UserAction;
use App\Http\Actions\SocialAction;

class SearchController extends Controller
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

        //$jsonString = file_get_contents(base_path('public\stack\json\lang-en.json'));
        $jsonString = file_get_contents(storage_path('app/stack/json/lang-en.json'));
        $resData['languageList'] = json_decode($jsonString, true);

        if($fbInfo === null)
            return view('search.index', $resData);
        else
            return view('search.index', $resData);
    }

    public function search(Request $request)
    {
        $data = Arr::except($request->all(), ['_token']);

        $searchResponse = Http::asForm()->post(config('url.botUrl') . 'searchProfile', $data);

        return $searchResponse;

    }

    // public function edit()
    // {
    //     $resData = array();

    //     $userType = session('userType');
    //     $resData['userType'] = $userType;

    //     $appId = config('social.appId');
    //     $resData['appId'] = $appId;

    //     $igLink = config('social.instagram');
    //     $resData['igLink'] = $igLink;

    //     $fbLink = config('social.facebook');
    //     $resData['fbLink'] = $fbLink;

    //     $profile = UserAction::getProfile();
    //     $resData['profile'] = $profile;

    //     $igInfo = SocialAction::getCurrentSocialLink(Auth::id(), $this->INSTAGRAM);
    //     $resData['igInfo'] = $igInfo;
    //     $fbInfo = SocialAction::getCurrentSocialLink(Auth::id(), $this->FACEBOOK);
    //     $resData['fbInfo'] = $fbInfo;

    //     return view('profile.edit', $resData);
    // }

    // public function save(Request $request)
    // {
    //     // $validatedData = $request->validate([
    //     //     'first_name' => ['first_name', 'string', 'max:255'],
    //     //     'last_name' => ['last_name', 'string', 'max:255'],
    //     //     'email' => ['email', 'string', 'email', 'max:255', 'unique:users'],
    //     //     'second_email' => ['second_email', 'string', 'email', 'max:255', 'unique:users'],
    //     //     'phone' => ['phone', 'string', 'max:255'],
    //     //     'web_site' => ['web_site', 'string', 'max:255'],
    //     //     'about_me' => ['about_me', 'string'],
    //     // ]);

    //     $data = Arr::except($request->all(), ['_token']);

    //     $result = UserAction::saveProfile($data);

    //     return redirect()->intended('profile/edit');
    // }
}
