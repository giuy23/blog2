<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Laravel\Prompts\password;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Antoni Lujan Carrión',
            'email' => '123456789@gmail.com',
            'password' => bcrypt('123456789')
        ])->assignRole('Admin');
        User::factory(9)->create();
    }
}
