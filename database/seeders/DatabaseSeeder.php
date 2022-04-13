<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);
        $this->createAdminUser();
    }

    private function createAdminUser()
    {
        $adminUser = User::firstOrCreate([
            'name' => 'admin',
            'email' => env('ADMIN_USER_Email',),
            'password' => Hash::make(env('ADMIN_USER_PASSWORD',)),
        ]);
        $adminUser->assignRole('admin');
    }
}
