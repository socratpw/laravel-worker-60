<?php

namespace Database\Seeders;

use App\Models\Profile;
use Database\Factories\ProfileFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::factory(10)->create();


    }
}
