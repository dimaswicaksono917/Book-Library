<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'address' =>  'Books Store',
                'status' =>  'active',
                'role_id' => 1
            ],
            [
                'username' => 'customer',
                'password' => Hash::make('customer'),
                'address' =>  'Bogor',
                'status' =>  'active',
                'role_id' => 2
            ]
        ]);
    }
}
