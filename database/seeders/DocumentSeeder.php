<?php

namespace Database\Seeders;

use App\Models\Documents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Documents::factory()->count(50)->create();
    }
}
