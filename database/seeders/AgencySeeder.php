<?php

namespace Database\Seeders;

use App\Models\Admin\Agency;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AgencySeeder extends Seeder
{
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 5; $i++) {
            $newAgency = new Agency();
            $newAgency->nome = $faker->name();
            $newAgency->slug = Str::slug($newAgency->nome);
            $newAgency->descrizione = $faker->text(200);
            $newAgency->telefono = $faker->phoneNumber();
            $newAgency->indirizzo = $faker->streetAddress();
            $newAgency->cap = $faker->postcode();
            $newAgency->citta = $faker->city();
            $newAgency->paese = $faker->country();
            $newAgency->ragione_sociale = $faker->company();
            $newAgency->p_iva = $faker->randomNumber(5, true);
            $newAgency->tipo = $faker->sentence(3);
            //$newAgency->premium = $faker->boolean(30);
            $newAgency->pec_sdi = $faker->email();
            $newAgency->save();
        };
    }
}
