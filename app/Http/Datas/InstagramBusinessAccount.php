<?php

namespace App\Http\Datas;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class InstagramBusinessAccount
{
    public $fbPageId;
    public $fbPageName;
    public $fbCategory;
    public $fbPageAccessToken;

    public $igId;
    public $igName;
    public $igEmail;
    public $igAvatarUrl;

    public function __construct($fbPageId, $fbPageName, $fbCategory, $fbPageAccessToken, $igId, $igName, $igEmail, $igAvatarUrl)
    {
        $this->fbPageId = $fbPageId;
        $this->fbPageName = $fbPageName;
        $this->fbCategory = $fbCategory;
        $this->fbPageAccessToken = $fbPageAccessToken;

        $this->igId = $igId;
        $this->igName = $igName;
        $this->igEmail = $igEmail;
        $this->igAvatarUrl = $igAvatarUrl;
    }
}
