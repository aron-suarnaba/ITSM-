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


        // IT MANAGER
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
            'manager_id' => 'PPC0004',
            'position' => 'Manager',
            'privilege' => 'Admin',
            'email' => 'it_manager@printwell.com.ph',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('PPC0004'),
        ]);

        // USERS MANAGER
        User::create([
            'employee_id' => 'PPC0000',
            'site' => 'PI-SP',
            'first_name' => 'Users',
            'last_name' => 'Manager',
            'birthday' => Carbon::parse('1985-11-20'),
            'gender' => 'Female',
            'address' => '38 Dansalan St., Mandaluyong City, Metro Manila',
            'contact' => '09170001002',
            'department' => 'Marketing(Sales)',
            'manager_id' => 'PPC0000',
            'position' => 'Manager',
            'privilege' => 'User',
            'email' => 'manager@printwell.com.ph',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('PPC0000'),
        ]);


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
            'manager_id' => 'PPC0004',
            'position' => 'System Analyst Programmer',
            'privilege' => 'Superadmin',
            'email' => 'aron.suarnaba@printwell.com.ph',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('PPC1187'),
        ]);

        //MARKETING USERS
        User::create([
            'employee_id' => 'PPC1102',
            'site' => 'PI-SP',
            'first_name' => 'Hannah Lei',
            'last_name' => 'Agustin',
            'birthday' => Carbon::parse('1985-11-20'),
            'gender' => 'Female',
            'address' => '38 Dansalan St., Mandaluyong City, Metro Manila',
            'contact' => '09170001002',
            'department' => 'Marketing(Sales)',
            'manager_id' => 'PPC0000',
            'position' => 'Sales',
            'privilege' => 'User',
            'email' => 'hannah.agustin@printwell.com.ph',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('PPC1102'),
        ]);

        // IT SPECIALIST
        User::create([
            'employee_id' => 'PPC0001',
            'site' => 'PI-SP',
            'first_name' => 'IT',
            'last_name' => 'Specialist',
            'birthday' => Carbon::parse('1985-11-20'),
            'gender' => 'Male',
            'address' => '38 Dansalan St., Mandaluyong City, Metro Manila',
            'contact' => '09170001002',
            'department' => 'Information Technology',
            'manager_id' => 'PPC0004',
            'position' => 'IT Specialist',
            'privilege' => 'User',
            'email' => 'technical.support@printwell.com.ph',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('PPC0001'),
        ]);

        // SUPERVISOR
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
            'manager_id' => 'PPC0004',
            'position' => 'Supervisor',
            'privilege' => 'Admin',
            'email' => 'supervisor@printwell.com.ph',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('PPC0002'),
        ]);

        // IT CONSULTANT
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
            'manager_id' => 'PPC0004',
            'position' => 'IT Consultant',
            'privilege' => 'Admin',
            'email' => 'it_consultant@printwell.com.ph',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('PPC0003'),
        ]);


    }
}
