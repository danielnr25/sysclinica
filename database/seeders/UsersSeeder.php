<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jahayra',
            'email' => 'Naye@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'cedula' => '74448244',
            'address' => 'Santa Victoria',
            'phone' => '(888) 937-7238',
            'role' => 'admin'
        ]);

        User::factory()
            ->count(50)
            ->create();
    }
}
