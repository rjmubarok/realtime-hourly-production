<?php

namespace Database\Seeders;

use App\Models\Line;
use Illuminate\Database\Seeder;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $line1 = Line::create([
            'floor_id' => '1',
            'name' => 'Line 1',
            'status' => '1',
        ]);
    }
}
