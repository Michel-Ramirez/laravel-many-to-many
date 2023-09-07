<?php

namespace Database\Seeders;

use App\Models\Type;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $types = ['full stack', 'frontend', 'backend', 'designe', 'UX/UI'];

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->label = $type;
            $new_type->color = $faker->hexColor();

            $new_type->save();
        }
    }
}
