<?php

namespace App\Modules\WeiXin;

use App\Models\WeiXinUser;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Jetstream\HasProfilePhoto;
use Facades\App\Modules\WeiXin\WeiXinService;

trait HasWeiXin
{
    use HasProfilePhoto {
        getProfilePhotoUrlAttribute as protected getProfilePhotoUrlAttributeOrignal;
    }

    public function getWeiXinAvatar()
    {
        $wxUser=$this->getWeiXinUser();
        if($wxUser==null)return null;

        return $wxUser->avatar;
    }

    public function WeiXinUser(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(WeiXinUser::class);
    }

    public function getWeiXinUser()
    {
        return $this->WeiXinUser()->first();
    }

    public function deleteWeiXinUser()
    {
        $wxUser= $this->getWeiXinUser();
        if($wxUser==null)return;

        $wxUser->delete();
    }


    public function getProfilePhotoUrlAttribute()
    {
        $photoUrl= $this->getProfilePhotoUrlAttributeOrignal();

        if($photoUrl!=null
            && $photoUrl!=$this->defaultProfilePhotoUrl()
        )return  $photoUrl;

        $avatar= $this->getWeiXinAvatar();
        if($avatar!=null) return  $avatar;

        $publicPhotoUrl=$this->getPublicPhotoUrlByEmail();
        if($publicPhotoUrl!=null)return  $publicPhotoUrl;

        return  $photoUrl;
    }

    private  function  getPublicPhotoUrlByEmail(): ?string
    {
        if($this->email=='') return  null;
        return 'https://secure.gravatar.com/avatar/'.md5(Str::lower($this->email)).'?size=512';
    }

    public function getEmailAttribute($email)
    {
        if(WeiXinService::isTempEmail($email))
        {
            return '';
        }

        return  $email;
    }
}
