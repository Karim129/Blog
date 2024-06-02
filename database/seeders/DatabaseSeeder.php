<?php

namespace Database\Seeders;

use App\Models\Contact;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\SettingsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(SettingsSeeder::class);
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);
        Contact::factory(10)->create();

    }
}
