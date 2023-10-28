<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Tasks;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        Tasks::factory(5)->create();
        // \App\Models\User::factory(10)->create();

        // Tasks::create([
        //     'name' => 'Tugas 1',
        //     'deskripsi' => 'Ini adalah Tugas pertama',
        //     'status' => '1',
        //     'user_id' => '1',
        // ]);
        // Tasks::create([
        //     'name' => 'Tugas 1',
        //     'deskripsi' => 'Ini adalah Tugas pertama',
        //     'status' => '1',
        //     'user_id' => '2',
        // ]);
        // User::create([
        //     'name' => 'Agung Ferdinan',
        //     'email' => 'agung1223@gmail.com',
        //     'password' => bcrypt('admin'),
        // ]);
        // User::create([
        //     'name' => 'Scarlett',
        //     'email' => 'scarlett@gmail.com',
        //     'password' => bcrypt('admin'),
        // ]);
    }
}
