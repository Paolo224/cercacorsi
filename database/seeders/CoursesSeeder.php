<?php

namespace Database\Seeders;

use App\Models\Admin\Courses;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 5; $i++) {
            $newCourse = new Courses();
            $newCourse->categoria = $faker->word();
            $newCourse->titolo = $faker->word();
            $newCourse->descrizione = $faker->realText(500, 2);
            $newCourse->durata = '600';
            $newCourse->competenze_partenza = $faker->word(3, true);
            $newCourse->prezzo = 243.54;
            $newCourse->programma = $faker->realText(500, 2);
            $newCourse->obiettivi = $faker->realText(50, 2);
            $newCourse->a_chi_si_rivolge = $faker->realText(50, 2);
            $newCourse->requisiti_richiesti = $faker->realText(100, 2);
            $newCourse->save();
        }
    }
}
