<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
        //$this->call(UsersTableSeeder::class);
        //Model::reguard();        
        $this->call(FinanceiroTableSeeder::class);
    }
}
