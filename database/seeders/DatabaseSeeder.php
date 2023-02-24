<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin', 
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'super_user' => 1
        ]);


        DB::table('users')->insert([
            'name' => 'Earl', 
            'email' => 'emaz@mac.com',
            'email_verified_at' => now(),
            'password' => bcrypt('11111111'),
            'super_user' => 1
        ]);

        DB::table('project_status_types')->insert(['name' => 'New Project', 'sort_by' => 1]);
        DB::table('project_status_types')->insert(['name' => 'In Progress', 'sort_by' => 2]);
        DB::table('project_status_types')->insert(['name' => 'M1 Paid',     'sort_by' => 3]);
        DB::table('project_status_types')->insert(['name' => 'Completed',   'sort_by' => 4]);
        DB::table('project_status_types')->insert(['name' => 'Cancelled',   'sort_by' => 5]);
        DB::table('project_status_types')->insert(['name' => 'On Hold',     'sort_by' => 6]);

        DB::table('companies')->insert(['name' => 'No Company']);

        DB::table('company_account_types')->insert(['name' => 'Dealer']);
        DB::table('company_account_types')->insert(['name' => 'Developer']);
        DB::table('company_account_types')->insert(['name' => 'Accountant']);
        DB::table('company_account_types')->insert(['name' => 'Demo']);


    }
}
