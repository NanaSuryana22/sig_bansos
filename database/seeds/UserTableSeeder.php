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
        $role_dinas_sosial = Role::where('name', 'dinas_sosial')->first();
        $role_kecamatan = Role::where('name', 'kecamatan')->first();
        $role_desa = Role::where('name', 'desa')->first();

        $masyarakat = new User();
        $masyarakat->name = 'Masyarakat';
        $masyarakat->email = 'masyarakat@gmail.com';
        $masyarakat->password = bcrypt('masyarakat123');
        $masyarakat->save();
        $masyarakat->roles()->attach($role_user);

        $dinas_sosial = new User();
        $dinas_sosial->name = 'Petugas Dinas Sosial';
        $dinas_sosial->email = 'dinas_sosial@mail.com';
        $dinas_sosial->password = bcrypt('dinassosial123');
        $dinas_sosial->save();
        $dinas_sosial->roles()->attach($role_dinas_sosial);

        $kecamatan = new User();
        $kecamatan->name = 'Petugas Kecamatan';
        $kecamatan->email = 'kecamatan@mail.com';
        $kecamatan->password = bcrypt('kecamatan123');
        $kecamatan->save();
        $kecamatan->roles()->attach($role_kecamatan);

        $desa = new User();
        $desa->name = 'Petugas Desa';
        $desa->email = 'desa@mail.com';
        $desa->password = bcrypt('desa123');
        $desa->save();
        $desa->roles()->attach($role_desa);
    }
}
