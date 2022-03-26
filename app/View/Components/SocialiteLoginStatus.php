<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SocialiteLoginStatus extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct()
    {
        //
    }

    public function hasLoginUser()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $hasSocialiteUser=session()->has('temp_login_wx_openid');
        session()->reflash();
        $userName= session('temp_login_wx_name','');
        $avatar=session('temp_login_wx_avatar','');


        return view('components.socialite-login-status',[
            'hasSocialiteUser' => $hasSocialiteUser,
            'name' => $userName,
            'avatar' => $avatar
        ]);
    }
}
