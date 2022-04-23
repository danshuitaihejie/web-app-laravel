<?php

namespace App\Modules\Common;

use App\Models\User;
use Facades\App\Modules\Role\RoleService;
class UserObserver
{
    /**
     * 监听数据删除后的事件。
     *
     * @param  User $user
     * @return void
     */
    public function deleted(User $user)
    {
        $user->deleteWeiXinUser();
    }

    public function created(User $user)
    {
        if(RoleService::existRole('editor')){
            $user->assignRole('editor');
        }

    }

}
