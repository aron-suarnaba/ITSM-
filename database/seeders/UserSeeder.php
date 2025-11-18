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
            'manager_id' => 'PPC0005', // Self-managed for top level
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
            'last_name' => 'account',
            'birthday' => Carbon::parse('1985-11-20'),
            'gender' => 'Male',
            'address' => '38 Dansalan St., Mandaluyong City, Metro Manila',
            'contact' => '09170001002',
            'department' => 'Information Technology',
            'manager_id' => 'PPC0001', // Reports to Admin
            'position' => 'IT Specialist',
            'privilege' => 'User', // KEY: Set to Manager
            'email' => 'technical.support@printwell.com.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('PPC0001'),
        ]);

        // --- 3. Standard End User (Standard Employee) ---
        User::create([
            'employee_id' => 'PPC0002',
            'site' => 'PI-SP',
            'first_name' => 'Supervisor',
            'last_name' => 'Account',
            'birthday' => Carbon::parse('1995-02-01'),
            'gender' => 'Male',
            'address' => '38 Dansalan St., Mandaluyong City, Metro Manila',
            'contact' => '09170001003',
            'department' => 'Information Technology',
            'manager_id' => 'PPC0002', // Reports to Jane Doe (Manager)
            'position' => 'Supervisor',
            'privilege' => 'Admin', // KEY: Set to User
            'email' => 'technical.support@printwell.com.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('PPC0002'),
        ]);

        User::create([
            'employee_id' => 'PPC0003',
            'site' => 'PI-SP',
            'first_name' => 'IT Consultant',
            'last_name' => 'Account',
            'birthday' => Carbon::parse('1995-02-01'),
            'gender' => 'Female',
            'address' => '38 Dansalan St., Mandaluyong City, Metro Manila',
            'contact' => '09170001003',
            'department' => 'Information Technology',
            'manager_id' => 'PPC0003',
            'position' => 'IT Consultant',
            'privilege' => 'Admin',
            'email' => 'technical.support@printwell.com.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('PPC0003'),
        ]);

        User::create([
            'employee_id' => 'PPC0004',
            'site' => 'PI-SP',
            'first_name' => 'IT Manager',
            'last_name' => 'Account',
            'birthday' => Carbon::parse('1995-02-01'),
            'gender' => 'Male',
            'address' => '38 Dansalan St., Mandaluyong City, Metro Manila',
            'contact' => '09170001003',
            'department' => 'Information Technology',
            'manager_id' => 'PPC0050',
            'position' => 'Manager',
            'privilege' => 'Admin',
            'email' => 'technical.support@printwell.com.ph',
            'email_verified_at' => now(),
            'password' => Hash::make('PPC0004'),
        ]);
    }
}
