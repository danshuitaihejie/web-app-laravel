<?php

namespace App\Modules\WeiXin;

use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use App\Models\WeiXinUser;
use App\Models\User;
use Laravel\Socialite\Contracts\User as CallbackWxUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use App\Actions\Fortify\CreateNewUser;
use Illuminate\Support\Facades\Hash;

class WeiXinService
{

    public  function  redirectToLogin()
    {
        return Socialite::driver('weixinweb')->redirect();
    }

    public  function  loginCallback(){
       return $this->loginCallbackToRegisterUser();
    }
    public  function  loginCallbackToRegisterUser()
    {
        $wxUser = Socialite::driver('weixinweb')->user();
        $openId=$wxUser->getId();
        $user=$this->getUserByWxOpenId($openId);
        if($user==null)
        {
            $nickName=$wxUser->getNickname();
            $avatar=$wxUser->getAvatar();
            session()->flash( 'temp_login_wx_openid',$openId);
            session()->flash( 'temp_login_wx_name',$nickName);
            session()->flash( 'temp_login_wx_avatar',$avatar);

            $password= $this->createTempWeiXinDefaultPassword();
            $email=$this->createTempEmail($openId);

            request()->merge([
                'name' => $nickName,
                'email' => $email,
                'password' => $password,
                'password_confirmation' => $password,
                'profile_photo_path'=>$avatar
            ]);

            return App::make(RegisteredUserController::class)->store(
                request(),
                App::make(CreateNewUser::class));
        }
        Auth::login($user);
        return redirect(RouteServiceProvider::HOME);
    }

    public  function  loginCallbackToRegisterForm()
    {
        $wxUser = Socialite::driver('weixinweb')->user();

        $user=$this->getUserByWxOpenId($wxUser->getId());
        if($user==null)
        {
            session()->flash( 'temp_login_wx_openid',$wxUser->getId());
            session()->flash( 'temp_login_wx_name',$wxUser->getNickname());
            session()->flash( 'temp_login_wx_avatar',$wxUser->getAvatar());

            return redirect(route('register'));
        }
        Auth::login($user);
        return redirect('home');
    }

    public function tryCreateAndBindWeiXinUser(User $user)
    {
        if(!session()->has('temp_login_wx_openid'))return;

        $wxUserOpenId=session('temp_login_wx_openid','');
        $wxUserNickname=session('temp_login_wx_name','');
        $wxUserAvatar=session('temp_login_wx_avatar','');

        if(Hash::check($this->createTempWeiXinDefaultPassword(), $user->password))
        {
            $user->forceFill([
                'password' => Hash::make(''),
            ])->save();
        }

        $user->WeiXinUser()->save(WeiXinUser::forceCreate([
            'wxopen_id'=>$wxUserOpenId,
            'user_id' => $user->id,
            'nickname' => $wxUserNickname,
            'avatar' => $wxUserAvatar
        ]));
    }

    public function  isTempEmail($email): bool
    {
        return Str::endsWith($email, 'null.null');
    }

    private function createTempEmail($openId): string
    {
        return $openId."@null.null";
    }

    private  function  createTempWeiXinDefaultPassword(): string
    {
        return 'Temp_weixin_user_default_password';
    }

    private  function  getUserByWxOpenId($wxOpenId)
    {
        $weixinUser= WeiXinUser::where('wxopen_id', $wxOpenId)->first();
        if($weixinUser==null)return null;

        $user=$weixinUser->User()->first();
        return  $user;
    }


}
