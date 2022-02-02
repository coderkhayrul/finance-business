<?php

namespace Database\Seeders;

use App\Models\Basic;
use App\Models\ContactInformation;
use App\Models\Role;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => "Admin",
            'email' => "admin@mail.com",
            'password' => Hash::make('Password'),
            'role_id' => 1,
            'status' => 1,
        ]);

        Role::create([
            'role_name' => "Admin",
            'role_slug' => Str::slug('admin'),
            'role_status' => 1,
        ]);

        Basic::create([
            'basic_status' => 1
        ]);

        ContactInformation::create([
            'cont_status' => 1
        ]);
        SocialMedia::create([
            'sm_status' => 1
        ]);
    }
}
