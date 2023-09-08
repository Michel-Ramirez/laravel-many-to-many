<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            ['label' => 'PHP', 'color' => 'primary'],
            ['label' => 'HTML', 'color' => 'danger'],
            ['label' => 'CSS', 'color' => 'info'],
            ['label' => 'JS ES6', 'color' => 'warning'],
            ['label' => 'Bootstrap', 'color' => 'dark'],
            ['label' => 'SQL', 'color' => 'secondary'],
            ['label' => 'Laravel', 'color' => 'success'],
            ['label' => 'Vue JS', 'color' => 'danger'],
        ];

        foreach ($technologies as $technology) {
            $new_technology = new Technology();
            $new_technology->label = $technology['label'];
            $new_technology->color = $technology['color'];
            $new_technology->save();
        }
    }
}
