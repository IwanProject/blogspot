<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
            'name' => 'Iwan',
            'username' => 'iwanradjasa',
            'email' => 'iwanradjasa@gmail.com',
            'password' => bcrypt('1234'),
            'is_admin' => 0
        ]);

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234'),
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'julio',
            'username' => 'kulio',
            'email' => 'julio@gmail.com',
            'password' => bcrypt('1234'),
            'is_admin' => 2
        ]);








    }
}
