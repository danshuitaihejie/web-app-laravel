<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Facades\App\Modules\Role\RoleService;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');
        if(RoleService::existRole('admin'))
        {
            return;
        }

        Permission::create(['name'=>'view nova']);

        // create permissions for Diagram
        $diagramPermissionGroup=[
            'create diagram',
            'edit diagram',
            'delete diagram',
            'publish diagram',
            'unpublish diagram',
            'fork diagram',
        ];

        foreach ($diagramPermissionGroup as $value) {
            Permission::create(['name'=>$value]);
        }


        $editorRole = Role::create(['name' => 'editor']);
        $editorRole->givePermissionTo($diagramPermissionGroup);


        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $this->createAdminUser();
    }

    private function createAdminUser()
    {
        $adminUser = User::firstOrCreate([
            'name' => 'admin',
            'email' => env('ADMIN_USER_EMAIL',),
            'password' => Hash::make(env('ADMIN_USER_PASSWORD',)),
        ]);
        $adminUser->assignRole('admin');
    }
}
