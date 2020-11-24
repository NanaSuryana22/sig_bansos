<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'masyarakat')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $masyarakat = new User();
        $masyarakat->name = 'Masyarakat';
        $masyarakat->email = 'masyarakat@gmail.com';
        $masyarakat->password = bcrypt('masyarakat123');
        $masyarakat->save();
        $masyarakat->roles()->attach($role_user);

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin123');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
