<?php

namespace App\Modules\WeiXin;

use App\Models\User;
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
}
