<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@ladysalon.com',
            'password' => bcrypt('password'),
        ]);

        \App\Models\Setting::create(['key' => 'phone', 'value' => '+62 812-3456-7890']);
        \App\Models\Setting::create(['key' => 'address', 'value' => 'Jl. Kecantikan Indah No. 1, Jakarta Selatan']);
        \App\Models\Setting::create(['key' => 'maps_embed', 'value' => '']);
        \App\Models\Setting::create(['key' => 'instagram', 'value' => 'https://instagram.com/ladysalonsriwindany']);
    }
}
