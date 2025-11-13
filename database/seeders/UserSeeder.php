<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'employee_id' => 'PPC1187',
            'site' => 'PI-SP',
            'first_name' => 'Aron Kyle',
            'last_name' => 'Suarnaba',
            'birthday' => Carbon::parse('2002-05-07'),
            'gender' => 'Male',
            'address' => '777 Lunas St., Brgy. Malamig, Mandaluyong City, Metro Manila',
            'contact' => '09072927198',
            'department' => 'Information Technology',
            'manager_id' => 'PPC1185', // Self-managed for top level
            'position' => 'System Analyst Programmer',
            'privilege' => 'Superadmin', // KEY: Set to Admin
            'email' => 'aron.suarnaba@printwell.com.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('PPC1187'),
        ]);

        User::create([
            'employee_id' => 'PPC0001',
            'site' => 'PI-SP',
            'first_name' => 'User',
            'last_name' => 'Admin',
            'birthday' => Carbon::parse('1985-11-20'),
            'gender' => 'Male',
            'address' => '38 Dansalan St., Mandaluyong City, Metro Manila',
            'contact' => '9170001002',
            'department' => 'Information Technology',
            'manager_id' => 'PPC1185', // Reports to Admin
            'position' => 'System Analyst Programmer',
            'privilege' => 'Superadmin', // KEY: Set to Manager
            'email' => 'technical.support@printwell.com.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('@BrightP@ssword123'),
        ]);

        // --- 3. Standard End User (Standard Employee) ---
        User::create([
            'employee_id' => '',
            'site' => 'PI-SP',
            'first_name' => 'John',
            'last_name' => 'Smith',
            'birthday' => Carbon::parse('1995-02-01'),
            'gender' => 'Male',
            'address' => '789 Oak Ave, Financial District',
            'contact' => '9170001003',
            'department' => 'Marketing',
            'manager_id' => 'EMP0100', // Reports to Jane Doe (Manager)
            'position' => 'Marketing Specialist',
            'privilege' => 'User', // KEY: Set to User
            'email' => 'user@itsm.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);

        // --- Optional: Use Factory for Dummy Data ---
        // If you need more users, ensure your UserFactory is updated with these new columns
        // User::factory(20)->create();
    }
}
