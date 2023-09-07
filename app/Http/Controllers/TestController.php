<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use App\Http\Actions\UserAction;
use App\Http\Actions\MailAction;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function test(Request $request)
    {
        //$jsonString = file_get_contents(base_path('public\stack\json\influencedata.json'));
        $jsonString = file_get_contents(storage_path('app/stack/json/initialdata.json'));
        return $data = json_decode($jsonString, true);
        $arr =[];

        foreach($data as $one)
        {
            array_push($arr, $one['userName']);
        }
        return $arr;
        // $data['country.title'] = "Change Manage Country";
        return $data['keyTopics'][0];
        //return Auth::user()->roles;
        return view('auth.verify');
    }
}
