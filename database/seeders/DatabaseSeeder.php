<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Staf Administrasi Perkim',
            'email' => 'admin.perkim@muba.go.id',
            'password' => Hash::make('perkim2026'),
        ]);
    }
}