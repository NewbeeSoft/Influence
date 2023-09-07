<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

use GuzzleHttp\Client;

use App\Http\Actions\UserAction;
use App\Http\Actions\SocialAction;

class JsonController extends Controller
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
    }

    public function keytopicList(Request $request)
    {
        //$jsonString = file_get_contents(base_path('public\stack\json\instagram-filter.json'));
        $jsonString = file_get_contents(storage_path('app/stack/json/instagram-filter.json'));
        $data = json_decode($jsonString, true);
        // $data['country.title'] = "Change Manage Country";
        return $data['keyTopics'][0];
    }
}
