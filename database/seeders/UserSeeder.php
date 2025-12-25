<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Workspace;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Workspace::Create([
            'name' => "emely's workspace"
        ]);

        Workspace::Create([
            'name' => "jorge's workspace"
        ]);

        User::Create([
            'name' => 'jorge',
            'email' => 'correo@correo.com',
            'active_workspace' => 1,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),

        ]);

        User::Create([
            'name' => 'emely',
            'email' => 'correo2@coreo.com',
            'active_workspace' => 1,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),

        ]);
    }
}
