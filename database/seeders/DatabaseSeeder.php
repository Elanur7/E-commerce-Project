<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"=>"elanur",
           "surname"=>"basaran",
           "telephone"=>"123456789",
           "email"=>"admin@admin.com",
           "password"=>bcrypt("123456")
        ]);
    }
}
