<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;

use App\Http\Actions\UserAction;

class UserStateComposer
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
        $userType = UserAction::getUserType();
        session(['userType' => $userType]);

        $view->with('userType', $userType);
    }
}
