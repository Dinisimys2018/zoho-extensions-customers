<?php

namespace Database\Seeders;

use App\Models\Extension;
use Database\Factories\ExtensionFactory;
use Illuminate\Database\Seeder;

class ExtensionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Extension::factory()->create([
            'id' => 1
        ]);
    }
}
