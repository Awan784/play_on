<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use League\CommonMark\Extension\Table\Table;
use Spatie\Permission\Contracts\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(
            [
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            "password"=>Hash::make('12345678'),
            "role_id"=>1
            ]
        );
    DB::table('roles')->insert([
        'name'=>'admin','guard_name'=>'admins'
]);
    DB::table('roles')->insert([
        'name'=>'manager','guard_name'=>'admins'
]);
    DB::table('roles')->insert([
        'name'=>'player','guard_name'=>'users'
]);
    DB::table('location')->insert([
        ['name'=>'Model Town'],
        ['name'=>'Garden Town'],
        ['name'=>'Satellite Town'],
        ['name'=>'Gulshan Town'],
        ['name'=>'Gulberg Town'],
        ['name'=>'Master City'],
        ['name'=>'Wazirabad'],
        ['name'=>'Rawalpindi Bypass'],
        ['name'=>'Sialkot Bypass'],
]);
    DB::table('category')->insert([
        ['name'=>'Cricket'],
        ['name'=>'Football'],
        ['name'=>'Basketball'],
        ['name'=>'Badminton'],
        ['name'=>'Table Tennis'],
        ['name'=>'VolleyBall'],
        
]);

    }
}
