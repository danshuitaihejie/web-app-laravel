<?php

namespace Tests\Feature;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Laravel\Jetstream\Http\Livewire\DeleteUserForm;
use Laravel\Jetstream\Http\Livewire\UpdatePasswordForm;
use Livewire\Livewire;
use Tests\TestCase;
use Mockery;
use Mockery\MockInterface;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\Provider;
use Laravel\Socialite\Contracts\User;
use Auth;
use  App\Models\WeiXinUser;
use Facades\App\Modules\WeiXin\WeiXinService;

class WeiXinUserTest extends TestCase
{
    public function test_must_create_new_weixin_user_after_registered()
    {
        $this->spySocialite();
        $this->assertSame(0,WeiXinUser::all()->count());
        $this->get(route('wx.login.callback'));
        $this->assertSame(1,WeiXinUser::all()->count());
    }

    public  function  test_must_delete_bind_weixin_user_after_deleted_user()
    {
        $this->spySocialite();
        $this->get(route('wx.login.callback'));
        $this->assertSame(1,WeiXinUser::all()->count());
        $user = Auth::user();
        $this->assertNotNull($user);
        $user->delete();
        $this->assertSame(0,WeiXinUser::all()->count());
    }

    public function test_user_must_bind_with_weixin_user_after_registered()
    {
        $wxUserOpenId="test_open_id";
        $this->spySocialite();
        $this->get(route('wx.login.callback'));
        $this->assertSame($wxUserOpenId, Auth::user()->getWeiXinUser()->wxopen_id);
    }

    public function test_register_user_by_weixin()
    {
        $wxUserOpenId="test_open_id";
        $wxUserNickname="test_nickName";
        $wxUserAvatar="test_avatar";

        $this->spySocialite();

        $this->assertGuest();// no login

        $wxLoginCallbackResponse = $this->get(route('wx.login.callback'));
        Socialite::shouldHaveReceived('driver')->once()->with('weixinweb');
//        $wxLoginCallbackResponse->assertSessionHas([
//            'temp_login_wx_openid'=>$wxUserOpenId,
//            'temp_login_wx_name'=>$wxUserNickname,
//            'temp_login_wx_avatar'=>$wxUserAvatar
//        ]);
        $wxLoginCallbackResponse->assertRedirect(RouteServiceProvider::HOME);

        $this->assertAuthenticated();// user logined

        $user = Auth::user();
        $this->assertSame($wxUserAvatar,$user->profile_photo_url);
        $this->assertSame('', $user->email);
    }

    public function test_default_password_is_empty(){
        $this->spySocialite();
        $this->get(route('wx.login.callback'));
        $user = Auth::user();
        $this->assertTrue(Hash::check('', $user->fresh()->password));
    }

    public function test_can_change_password(){
        $this->spySocialite();
        $this->get(route('wx.login.callback'));
        $user = Auth::user();

        $this->actingAs($user);

        Livewire::test(UpdatePasswordForm::class)
            ->set('state', [
                'current_password' => '',
                'password' => 'new-password',
                'password_confirmation' => 'new-password',
            ])
            ->call('updatePassword')
            ->assertHasNoErrors(['current_password']);

        $user=$user->fresh();
        $this->assertFalse(Hash::check('', $user->password));
        $this->assertTrue(Hash::check('new-password', $user->password));
    }

    public function test_cant_login_by_empty_password(){
        $this->spySocialite();
        $this->get(route('wx.login.callback'));
        $user = Auth::user();
        Auth::logout();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '',
        ]);
        $this->assertGuest();
    }

    public function test_login_page_contain_weixin_login_url()
    {
        $response = $this->get(route('login'));
        $response->assertSee(route('wx.login.redirect'),false);
    }

    public function test_need_submit_form_for_register_user_by_weixin()
    {
        return $this->markTestSkipped('No form submission required');

        $wxUserOpenId="test_open_id";
        $wxUserNickname="test_nickName";
        $wxUserAvatar="test_avatar";

        $this->spySocialite();

        $this->assertGuest();// no login

        $wxLoginCallbackResponse = $this->get(route('wx.login.callback'));
        //$wxLoginCallbackResponse->dumpSession();
        Socialite::shouldHaveReceived('driver')->once()->with('weixinweb');
        $wxLoginCallbackResponse->assertSessionHas([
            'temp_login_wx_openid'=>$wxUserOpenId,
            'temp_login_wx_name'=>$wxUserNickname,
            'temp_login_wx_avatar'=>$wxUserAvatar
        ]);
        $wxLoginCallbackResponse->assertRedirect(route('register'));

        $registerUIResponse=$this->get(route('register'));
        $registerUIResponse->assertSessionHas([
            'temp_login_wx_openid'=>$wxUserOpenId,
            'temp_login_wx_name'=>$wxUserNickname,
            'temp_login_wx_avatar'=>$wxUserAvatar
        ]);
        #$registerUIResponse->dumpSession();
        #$registerUIResponse->dump();
        $registerUIResponse->assertSee($wxUserNickname,false);//注册界面有显示用微信户名
        $registerUIResponse->assertSee($wxUserAvatar,false);//注册界面有显示微信用户头像

        $registeredResponse=$this->post(route('register'),[
            'name' => session('temp_login_wx_name'),
            'email' => session('temp_login_wx_openid').'@null.null',
            'password' => 'TestPassword123',
            'password_confirmation'=>'TestPassword123'
        ]);
        $registeredResponse->assertRedirect(RouteServiceProvider::HOME);

        $this->assertAuthenticated();// user logined

        $user = Auth::user();
        $weiXinUser=$user->getWeiXinUser();
        $this->assertSame($wxUserOpenId, $weiXinUser->wxopen_id);
    }

    private  function spySocialite(){
        Socialite::spy();
        Socialite::shouldReceive('driver')
            ->once()
            ->with('weixinweb')
            ->andReturn(new class {
                public function user()
                {
                    return new class{
                        public  function  getId(){return "test_open_id";}
                        public  function  getNickname(){return "test_nickName";}
                        public  function  getAvatar(){return "test_avatar";}
                    };
                }
            });
    }

}
