<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin', 
            'email' => 'admin@admin.com', 
            'password' => Hash::make('123456789')
        ]);

        User::create([
            'name' => 'User', 
            'email' => 'user@user.com', 
            'password' => Hash::make('123456789')
        ]);

        $role = Role::create(['name' => 'admin']);
        $user->assignRole($role);
    }
}
