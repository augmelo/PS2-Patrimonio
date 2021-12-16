<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Augusto Melo',
            'registration' => 123456,
            'username' => 'augusto',
            'password' => 'augusto',
            'permission' => true
        ]);
        User::create([
            'name' => 'Robert',
            'registration' => 145678,
            'username' => 'Robert',
            'password' => 'Robert',
            'permission' => true
        ]);
        User::create([
            'name' => 'Renan',
            'registration' => 679876,
            'username' => 'renan',
            'password' => 'renan',
            'permission' => true
        ]);
        User::create([
            'name' => 'Matheus',
            'registration' => 396491,
            'username' => 'matheus',
            'password' => 'matheus',
            'permission' => true
        ]);
        User::create([
            'name' => 'Elke Almeida',
            'registration' => 120503,
            'username' => 'elke',
            'password' => 'elke',
            'permission' => true
        ]);

        User::create([
            'name' => 'Usuário Comum',
            'registration' => 120504,
            'username' => 'comum',
            'password' => 'comum',
            'permission' => false
        ]);
    }
}
