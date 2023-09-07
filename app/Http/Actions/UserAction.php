<?php

namespace App\Http\Actions;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserAction extends Controller
{
    public static function checkSocialState()
    {
        return Auth::user()->socialLinks;
    }

    public static function getProfile()
    {
        return Auth::user()->profile;
    }

    public static function saveProfile($data)
    {
        $profile = self::getProfile();

        $profile->first_name = data_get($data, 'first_name');
        $profile->last_name = data_get($data, 'last_name');
        $profile->phone = data_get($data, 'phone');
        $profile->web_site = data_get($data, 'web_site');
        $profile->about_me = data_get($data, 'about_me');
        $profile->country_id = data_get($data, 'county');

        $profile->save();
    }

    public static function verifyEmail($email, $code)
    {
        $_user = User::where('email', '=', $email)
            ->where('remember_token', '=', $code)
            ->where('member_activate', '=', 0)
            ->get();
        if(count($_user) == 1)
        {
            $user = $_user[0];
            $user->member_activate = 1;
            $user->remember_token = '';
            $user->save();
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function getUserByEmail($email)
    {
        return User::where('email', '=', $email)
            ->first();
    }

    public static function resetToken($email, $token)
    {
        $user = User::where('email', '=', $email)
            ->where('member_activate', '=', 0)
            ->first();
        if($user)
        {
            $user->remember_token = $token;
            $user->save();

            return true;
        }
        else return false;
    }

    public static function resetPassword($email, $remember_token, $newPassword)
    {
        $user = User::where('email', '=', $email)
            ->where('remember_token', '=', $remember_token)
            ->first();

        if($user)
        {
            $user->password = Hash::make($newPassword);
            $user->remember_token = '';
            $user->save();

            return true;
        }
        else return false;
    }

    public static function getUserTypeByEmail($userEmail)
    {
        $user = User::where('email', '=', $userEmail)
            ->first();
        $roles = $user->roles;
        foreach($roles as $role)
        {
            if($role->name == 'brand') return 'brand';
            if($role->name == 'influencer') return 'influencer';
        }
    }

    public static function getUserType()
    {
        $roles = Auth::user()->roles;

        foreach($roles as $key =>  $role)
        {
            switch ($role->name) {
                case 'brand':
                    return 'brand';
                    break;

                case 'influencer':
                    return 'influencer';
                    break;
            }
        }


    }
}
