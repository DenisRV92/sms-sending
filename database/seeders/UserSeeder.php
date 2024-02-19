<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $command = new \App\Console\Commands\get_data_from_google_sheets();
        $users = $command->handle();
        foreach ($users as $user) {
            User::create([
                'phone' => $user[0],
                'name' => $user[1],
                'birthday' => $user[2],
            ]);
        }
    }
}
