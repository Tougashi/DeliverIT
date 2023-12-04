<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Status;
use App\Models\Finance;
use App\Models\Service;
use App\Models\Credibility;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'role' => 'Admin',
            'created_at' => Carbon::now()
        ]);
        Role::create([
            'role' => 'User',
            'created_at' => Carbon::now()
        ]);
        Role::create([
            'role' => 'Driver',
            'created_at' => Carbon::now()
        ]);

        Status::create([
            'status' => 'Active'
        ]);
        Status::create([
            'status' => 'Banned'
        ]);

        Service::create([
            'vehicle' => 'PickUp',
            'weight' => '200',
            'size' => '1000',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        User::create([
            'firstName' => 'Adryan',
            'lastName' => 'Suryaman',
            'birthDate' => Carbon::now(),
            'adress' => 'Tasikmalaya',
            'email' => 'adryanowh@gmail.com',
            'password' => Hash::make('Qwerty123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'roleId' => '1',
            'statusId' => '1',
        ]);

        Finance::create([
            'userId' => "1",
            'balance' => "200",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Credibility::create([
            'userId' => "1",
            'credibility' => "2",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Transaction::create([
            
        ]);
    }
}
