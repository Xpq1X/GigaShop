<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
{
    if (!User::where('email', 'admin@gmail.com')->exists()) {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Admin123'), // Always use bcrypt to hash passwords
            'is_admin' => true, // Make sure this field exists in the User model
        ]);
    }
}

}
