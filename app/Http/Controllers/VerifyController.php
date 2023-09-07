<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;

use App\Http\Datas\DataResponse;
use App\Http\Datas\FacebookPage;

use App\Http\Actions\SocialAction;
use App\Http\Actions\UserAction;

use App\Mail\MailHelper;

use App\Http\Datas\MailData;

class VerifyController extends Controller
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
    public function index()
    {
        return view('verify.index');
    }

    public function verifyInstagram(Request $request)
    {
        $code = $request->input('code');

        // $igResponse = Http::withOptions([
        //     'form_params' => [
        //         'client_id' => '965902173847692',
        //         'client_secret' => '9f7198f4827900e29f822cc9eeee6ab4',
        //         'grant_type' => 'authorization_code',
        //         'redirect_uri' => 'https://twhive.com/verify/auth/instagram/',
        //         'code' => $code
        //     ]
        // ])->post('https://api.instagram.com/oauth/access_token');

        // $client = new Client();

        // $igResponse = $client->request('POST', 'https://api.instagram.com/oauth/access_token', [
        //     'form_params' => [
        //         'client_id' => '965902173847692',
        //         'client_secret' => '9f7198f4827900e29f822cc9eeee6ab4',
        //         'grant_type' => 'authorization_code',
        //         'redirect_uri' => 'https://twhive.com/verify/auth/instagram/',
        //         'code' => $code
        //     ]
        // ]);


        // $igResponse = Http::post('http://localhost:830/api/user/verify', [
        //     'auth' => $code,
        // ]);

        $igResponse = Http::asForm()->post(config('social.instagramGetAccessTokenUrl'), [
            'client_id' => '965902173847692',
            'client_secret' => '9f7198f4827900e29f822cc9eeee6ab4',
            'grant_type' => 'authorization_code',
            'redirect_uri' => config('social.instagramRedirectUrl'),//'https://twhive.com/verify/auth/instagram/',
            'code' => $code,
        ]);

        if($igResponse->successful())
        {
            $user_id = $igResponse['user_id'];
            $access_token = $igResponse['access_token'];

            $userResponse = Http::get(config('social.instagramBaseGraphUrl').'id,username,account_type&access_token='.$access_token);

            if(isset($userResponse['id']))
            {
                $res = SocialAction::saveSocialLink(Auth::id(), $this->INSTAGRAM, null, null, $userResponse);

                // if($res) return view('verify.index', ['result' => $res]);
                // else return view('verify.index', ['result' => $res]);
                if($res) return redirect()->intended('profile')->with('instagram_success', true);
                else  return redirect()->intended('profile')->with('instagram_fail', false);
            }
        }
        else
            // return view('verify.index', ['result' => false]);
            return redirect()->intended('profile')->with('instagram_fail', false);


    }

    public function verifyFacebook(Request $request)
    {
        $fbUserId = $request->input('userId');
        $accessToken = $request->input('accessToken');

        $fbInfo =  new FacebookPage($fbUserId, $accessToken);

        $fbAccountDataResponse = Http::get(config('social.facebookGraphUrl').$fbUserId.'?fields=email&access_token='.$accessToken);
        $fbUserEmail = $fbAccountDataResponse['email'];

        $fbPageListResponse = Http::get(config('social.facebookGetPageListUrl').$accessToken);
        foreach($fbPageListResponse['data'] as $fbPage)
        {
            $pageId = $fbPage['id'];
            $pageName = $fbPage['name'];
            $pageCategory = $fbPage['category'];
            $pageAccessToken = $fbPage['access_token'];

            $fbPageDataResponse = Http::get(config('social.facebookGraph8_0Url').$pageId.'?fields=instagram_business_account&access_token='.$pageAccessToken);

            if(isset($fbPageDataResponse['instagram_business_account']))
            {
                $igBusinessAccountId = $fbPageDataResponse['instagram_business_account']['id'];

                $igBusinessAccountDataResponse = Http::get(config('social.facebookGraph3_2Url').$igBusinessAccountId.
                    '?fields=username,profile_picture_url,biography,followers_count,follows_count,media_count,name,website&access_token='.$accessToken
                );
                //return $igBusinessAccountDataResponse = Http::get(config('social.facebookGraph8_0Url').$igBusinessAccountId.'?fields=email,username,profile_picture_url&access_token='.$accessToken);
                //facebookGraphUrl
                $igUserId = $igBusinessAccountDataResponse['id'];
                $igUserName = $igBusinessAccountDataResponse['username'];
                $igAvatarUrl = $igBusinessAccountDataResponse['profile_picture_url'];
                $fbInfo->addIgAccount(
                    $pageId,
                    $pageName,
                    $pageCategory,
                    $pageAccessToken,
                    $igUserId,
                    $igUserName,
                    '',
                    $igAvatarUrl);
            }
        }

        if(count($fbInfo->igBusinessAccount) == 1)
        {
            $igInfo = $fbInfo->igBusinessAccount[0];
            $res = SocialAction::saveSocialLink(Auth::id(), $this->FACEBOOK, $fbUserId, $accessToken, $igInfo);

            if($res)
            {
               return $this->sendResult(true);
            }
            else
            {
                return $this->sendResult(false);
            }
        }
        else
        {
            return $this->sendResult(false);
        }

    }

    public function verifyEmail(Request $request)
    {
        $data = Arr::except($request->all(), ['_token']);
        if(Arr::exists($data, 'email') && Arr::exists($data, 'verifyCode'))
        {
            $userEmail = data_get($data, 'email');
            $verifyCode = data_get($data, 'verifyCode');
            $flag = UserAction::verifyEmail($userEmail, $verifyCode);
            if($flag)
            {
                $userType = UserAction::getUserTypeByEmail($userEmail);
                $mailData = new MailData;
                $mailData->mailType = 'welcome';
                $mailData->content = $userType;
                Mail::to($data['email'])->send(new MailHelper($mailData));
                return redirect('/login')->with('verify_success', 'verify_success');
            }
            else return redirect('/login')->with('verify_fail', 'verify_fail');
        }
        else{
            return abort(404);
        }
    }

    public function check(Request $request)
    {
        return $code = $request->input('code');


        // $igResponse = Http::post('http://localhost:830/api/user/verify', [
        //     'auth' => $code,
        // ]);

        //return $igResponse;
    }
}
