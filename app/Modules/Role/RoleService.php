<?php
namespace App\Modules\Role;

use Spatie\Permission\Guard;
use Spatie\Permission\Models\Role;

class RoleService
{
    public  function existRole(string $roleName):bool
    {
        $guard_name= Guard::getDefaultName(Role::class);
        if (Role::where('name', $roleName)->where('guard_name', $guard_name)->first()) {
            return true;
        }
        return false;
    }
}
