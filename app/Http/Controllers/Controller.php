<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $INSTAGRAM = 'instagram';
    public $FACEBOOK = 'facebook';
    public $LINKDIN = 'linkedin';
    public $TIKTOK = 'tiktok';
    public $YOUTUBE = 'youtube';
    public $WHATSAPP = 'whatsapp';
    public $WECHAT = 'wechat';
    public $TWITTER = 'twitter';
    public $GOOGLE = 'google';
    public $QQ = 'qq';

    public function sendResult($status, $data = null, $message = null)
    {
        return array(
            'status' => $status,
            'data' => $data,
            'message' => $message
        );
    }
}
