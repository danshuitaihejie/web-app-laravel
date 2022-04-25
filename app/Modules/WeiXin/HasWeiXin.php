<?php

namespace App\Modules\WeiXin;

use App\Models\WeiXinUser;
use Laravel\Jetstream\HasProfilePhoto;
use Facades\App\Modules\WeiXin\WeiXinService;
use Facades\Laravolt\Avatar\Avatar;

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
        $avatar= $this->getWeiXinAvatar();
        if($avatar!=null) return  $avatar;

        return Avatar::create($this->name)->toBase64();

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
