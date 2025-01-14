<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        if (!User::where('email', 'teste@teste.com')-> first ()) {
            User::create([
                'name' => 'Kayke',
                'email' => 'teste@teste.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
            ]);
           
        }

        if (!User::where('email', 'teste2@teste.com')-> first ()) {
            User::create([
                'name' => 'Adriano',
                'email' => 'teste2@teste.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
            ]);
           
        }

        if (!User::where('email', 'teste3@teste.com')-> first ()) {
            User::create([
                'name' => 'Karen',
                'email' => 'teste3@teste.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
            ]);
           
        }

        if (!User::where('email', 'teste4@teste.com')-> first ()) {
            User::create([
                'name' => 'Cris',
                'email' => 'teste4@teste.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
            ]);
           
        }

        if (!User::where('email', 'teste5@teste.com')-> first ()) {
            User::create([
                'name' => 'João',
                'email' => 'teste5@teste.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
            ]);
           
        }

        if (!User::where('email', 'teste6@teste.com')-> first ()) {
            User::create([
                'name' => 'Iago',
                'email' => 'teste6@teste.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
            ]);
           
        }
    }
}
