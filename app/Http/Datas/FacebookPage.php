<?php

namespace App\Http\Datas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

use App\Http\Datas\InstagramBusinessAccount;

class FacebookPage
{
    public $fbUserId;
    public $accessToken;
    public $igBusinessAccount;

    public function __construct($fbUserId, $accessToken)
    {
        $this->fbUserId = $accessToken;
        $this->accessToken = $accessToken;
        $this->igBusinessAccount = array();
    }

    public function addIgAccount($fbPageId, $fbPageName, $fbCategory, $fbPageAccessToken, $igId, $igName, $igEmail, $igAvatarUrl)
    {
        $this->igBusinessAccount[] = new InstagramBusinessAccount($fbPageId, $fbPageName, $fbCategory, $fbPageAccessToken, $igId, $igName, $igEmail, $igAvatarUrl);
    }
}
