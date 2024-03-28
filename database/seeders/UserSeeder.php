<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Silber\Bouncer\Bouncer;
use Silber\Bouncer\BouncerFacade;
use Silber\Bouncer\BouncerFacader;

class UserSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory()->count(4)->create();
        $users = [
            [
                'name' => 'Admin',

                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' =>   Hash::make('12345678'),
                'remember_token' =>  Str::random(10),

            ],
            [
                'name' => 'User',

                'email' => 'user@user.com',
                'email_verified_at' => now(),
                'password' =>   Hash::make('12345678'),
                'remember_token' =>  Str::random(10),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        $admin = BouncerFacade::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);

        $admin_abilities = BouncerFacade::ability()->firstOrCreate([
            'name' => 'create-users',
            'title' => 'Create new users',
        ]);

        BouncerFacade::allow($admin)->to($admin_abilities);
        $user = User::first();
        BouncerFacade::assign('admin')->to($user);
    }
}
