<?php

namespace Database\Seeders;

use App\Models\YearLevel;
use Illuminate\Database\Seeder;

class YearLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year_levels = [

            'First Year',
            'Second Year',
            'Third Year',
            'Fourth Year',
        ];
        foreach($year_levels as $year_level) {
            YearLevel::create(['year_description' => $year_level]);
        }
    }
}
