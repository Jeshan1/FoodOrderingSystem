<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            'username' => 'admin',
            'email' => config('adminCreds.admin_email'),
            'password'=>Hash::make(config('adminCreds.admin_password')),
            'role_id'=> 1,        
        ];

        User::create($user);
    }
}
