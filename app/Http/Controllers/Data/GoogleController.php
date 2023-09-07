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

class GoogleController extends Controller
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

    public function locationList(Request $request)
    {
        //return env('GOOGLE_API_KEY', '');
        $data = Arr::except($request->all(), ['_token']);
        $q = data_get($data, 'q', null);
        return $locationListResponse = Http::get(config('social.googleAutocompleteUrl').'input='.$q.'&types=geocode&key='.env('GOOGLE_API_KEY', ''));
    }
}
