<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Membuat 100 data pengguna
        User::factory()->count(5)->create();
    }
}
