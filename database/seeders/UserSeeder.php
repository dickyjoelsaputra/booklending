<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => '123', 'role_id' => 1],
            ['name' => 'Student', 'email' => 'student@gmail.com', 'password' => '123', 'role_id' => 2],
            ['name' => 'StudentDua', 'email' => 'student2@gmail.com', 'password' => '123', 'role_id' => 2],
        ];

        foreach ($data as $value) {
            # code...
            User::insert([
                'name' => $value['name'],
                'email' => $value['email'],
                'role_id' => $value['role_id'],
                'password' => Hash::make($value['password']),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
