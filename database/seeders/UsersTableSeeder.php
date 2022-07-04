<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Cleiton Tester',
            'email'=>'cleiton@teste.com',
            'password'=> Hash::make('teste123'),
            'cd_profile'=> User::PERFIL_ADMINISTRADOR
        ]);        
    }
}