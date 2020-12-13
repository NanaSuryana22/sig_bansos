<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_dinas_sosial = new Role();
        $role_dinas_sosial->name = 'dinas_sosial';
        $role_dinas_sosial->description = 'Hak Akses Petugas Dinas Sosial';
        $role_dinas_sosial->save();

        $role_kecamatan = new Role();
        $role_kecamatan->name = 'kecamatan';
        $role_kecamatan->description = 'Hak Akses Petugas Kecamatan';
        $role_kecamatan->save();

        $role_desa = new Role();
        $role_desa->name = 'desa';
        $role_desa->description = 'Hak Akses Petugas Desa';
        $role_desa->save();

        $role_user = new Role();
        $role_user->name = 'masyarakat';
        $role_user->description = 'Hak Akses Masyarakat';
        $role_user->save();
    }
}
