<?php

namespace Database\Seeders;
use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'name' => 'asmaasaad',
            'email' => 'asmaasaadmohamed0123456@gmail.com',
            'password' => Hash::make('2551999'),
            'role_id' => 2,
           ]);
           User::create([
            'name' => 'fatmaa',
            'email' => 'fatmaa@gmail.com',
            'password' => Hash::make('2551999'),
            'role_id' => 3,
           ]);
  
    }
}
