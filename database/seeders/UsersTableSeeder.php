<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $demo_data['name'] = 'admin';
        $demo_data['email'] = 'admin@admin.it';
        $demo_data['password'] = 'adminnnn';
        $admin_test_user = User::create($demo_data);
    }
}
