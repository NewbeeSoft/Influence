<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

use App\Http\Actions\UserAction;

class SocialStateComposer
{
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $socialCount = count(UserAction::checkSocialState());

        if($socialCount == 0) $view->with('instagramLink', false); else $view->with('instagramLink', true);
    }
}
