<?php

namespace Database\Seeders;

use App\Models\Floor;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $floor1 = Floor::create([
            'name' => '1st Floor',
            'status' => '1',
        ]);
    }
}
