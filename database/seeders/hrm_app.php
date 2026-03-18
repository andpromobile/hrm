<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class hrm_app extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('departments')->insert([
            [
                'name' => 'Human Resources',
                'description' => $faker->paragraph,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Finance',
                'description' => $faker->paragraph,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'IT',
                'description' => $faker->paragraph,
                'status' => 'active',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('roles')->insert([
            [
                'name' => 'Manager',
                'description' => $faker->paragraph,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Developer',
                'description' => $faker->paragraph,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Accountant',
                'description' => $faker->paragraph,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('employees')->insert([
            [
                'full_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'birth_date' => $faker->date(),
                'hire_date' => Carbon::now()->subYears(2),
                'department_id' => 1,
                'role_id' => 1,
                'status' => 'active',
                'salary' => $faker->randomFloat(2, 30000, 100000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'full_name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
                'birth_date' => $faker->date(),
                'hire_date' => Carbon::now()->subYears(1),
                'department_id' => 2,
                'role_id' => 3,
                'status' => 'active',
                'salary' => $faker->randomFloat(2, 30000, 100000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('tasks')->insert([
            [
                'title' => 'Complete Project Report',
                'description' => $faker->paragraph,
                'assigned_to' => 1,
                'due_date' => Carbon::now()->addDays(7),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Prepare Financial Statements',
                'description' => $faker->paragraph,
                'assigned_to' => 2,
                'due_date' => Carbon::now()->addDays(10),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('payrolls')->insert([
            [
                'employee_id' => 1,
                'salary' => 50000,
                'bonus' => 5000,
                'deductions' => 2000,
                'net_salary' => 53000,
                'payment_date' => Carbon::now()->subDays(15),
                'status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2,
                'salary' => 40000,
                'bonus' => 3000,
                'deductions' => 1500,
                'net_salary' => 41500,
                'payment_date' => Carbon::now()->subDays(15),
                'status' => 'paid',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('presences')->insert([
            [
                'employee_id' => 1,
                'date' => Carbon::now()->subDays(1),
                'check_in_time' => Carbon::now()->subDays(1)->setTime(9, 0),
                'check_out_time' => Carbon::now()->subDays(1)->setTime(17, 0),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2,
                'date' => Carbon::now()->subDays(1),
                'check_in_time' => Carbon::now()->subDays(1)->setTime(9, 30),
                'check_out_time' => Carbon::now()->subDays(1)->setTime(17, 30),
                'status' => 'present',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

        DB::table('leave_requests')->insert([
            [
                'employee_id' => 1,
                'leave_type' => 'Vacation',
                'start_date' => Carbon::now()->addDays(30),
                'end_date' => Carbon::now()->addDays(40),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'employee_id' => 2,
                'leave_type' => 'Sick Leave',
                'start_date' => Carbon::now()->addDays(5),
                'end_date' => Carbon::now()->addDays(10),
                'status' => 'pending',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
