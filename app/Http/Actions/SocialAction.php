<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

use App\Models\SocialType;
use App\Models\SocialLink;
use App\Models\Profile;

class SocialAction extends Controller
{    
    public static function getSocialTypeId($socialTypeName)
    {
        $socialType = SocialType::where('name', '=', $socialTypeName)->get();
        return $socialType[0]->id;
    }

    public static function getSocialLink($userId, $socialTypeName)
    {
        $socialTypeId = self::getSocialTypeId($socialTypeName);
        $socialLink = SocialLink::where('user_id', '=', $userId)
            ->where('social_type', '=', $socialTypeId)
            ->get();
        if(count($socialLink) == 0) return SocialLink::create([
            'social_type' => $socialTypeId,
            'social_link' => 'blank',
            'social_verified' => 0,
            'user_id' => $userId,
        ]);
        else if(count($socialLink) > 2) return null;
        else return $socialLink[0];        
    }

    public static function getCurrentSocialLink($userId, $socialTypeName, $returnType = 0)
    {
        $socialTypeId = self::getSocialTypeId($socialTypeName);
        $socialLink = SocialLink::where('user_id', '=', $userId)
            ->where('social_type', '=', $socialTypeId);
        $returnType == 1 && $socialLink->select('id');
        return $socialLink->first();       
    }

    public static function saveSocialLink($userId, $socialType, $fbUserId, $token, $socialData)
    {
        $socialLink = self::getSocialLink($userId, $socialType);

        switch($socialType)
        {
            case 'instagram':

                $socialLink->ig_user_id = $socialData['id'];
                $socialLink->ig_user_name = $socialData['username'];

                $socialLink->save();
                return true;
                break;
            case 'facebook':
                $socialLink->fb_user_id = $fbUserId;
                $socialLink->fb_token = $token;

                $socialLink->fb_page_id = $socialData->fbPageId;
                $socialLink->fb_page_name = $socialData->fbPageName;
                $socialLink->fb_page_token = $socialData->fbPageAccessToken;
                $socialLink->fb_category = $socialData->fbCategory;

                $socialLink->ig_user_id = $socialData->igId;
                $socialLink->ig_user_name = $socialData->igName;
                $socialLink->ig_user_email = $socialData->igEmail;
                $socialLink->ig_avatar_url = $socialData->igAvatarUrl;

                $socialLink->save();
                return true;
                break;
        }
        return false;
    }
}
