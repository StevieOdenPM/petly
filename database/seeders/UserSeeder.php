<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'role_role_id' => 3,
            'password' => 'admin1234',
            'phone_number' => '081949742576',
            'email' => 'admin@gmail.com',
        ]);

        User::create([
            'username' => 'courier',
            'role_role_id' => 2,
            'password' => 'courier1234',
            'phone_number' => '081223388991',
            'email' => 'salikinsalimin@gmail.com',
        ]);
      
        User::create([
            'username' => 'Johnny',
            'role_role_id' => 3,
            'password' => 'Johnny1234',
            'phone_number' => '086606525311',
            'email' => 'Johnny@gmail.com',
        ]);

        User::create([
            'username' => 'Messi',
            'role_role_id' => 3,
            'password' => 'Messi1234',
            'phone_number' => '088447026558',
            'email' => 'Messi@gmail.com',
        ]);

        User::create([
            'username' => 'Yo',
            'role_role_id' => 3,
            'password' => 'Yo1234',
            'phone_number' => '087022003661',
            'email' => 'Yo@gmail.com',
        ]);

        User::create([
            'username' => 'Gurt',
            'role_role_id' => 3,
            'password' => 'Gurt1234',
            'phone_number' => '084406230163',
            'email' => 'Gurt@gmail.com',
        ]);

        User::create([
            'username' => 'Anton',
            'role_role_id' => 3,
            'password' => 'Anton1234',
            'phone_number' => '089665481147',
            'email' => 'Anton@gmail.com',
        ]);

        User::create([
            'username' => 'Budi',
            'role_role_id' => 3,
            'password' => 'Budi',
            'phone_number' => '080715804298',
            'email' => 'Budi@gmail.com',
        ]);
    }
    
}
