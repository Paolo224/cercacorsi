<?php

namespace Database\Seeders;

use App\Models\Admin\Agency;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AgencySeeder extends Seeder
{
    public function run(Faker $faker)
    {
        $user = User::all();

        for ($i = 0; $i < 5; $i++) {
            $newAgency = new Agency();
            $newAgency->user_id = User::inRandomOrder()->first()->id;
            // $newAgency->logo = 'immagine_placeholder.jpg';
            // $newAgency->immagine_copertina = 'immagine_placeholder_copertina.jpg';
            $newAgency->nome = $faker->company();
            $newAgency->slug = Str::slug($newAgency->nome);
            $newAgency->descrizione = $faker->realText(500, 2);
            $newAgency->motto = $faker->realText(40, 2);
            $newAgency->telefono1 = $faker->numberBetween();
            $newAgency->telefono2 = $faker->numberBetween();
            $newAgency->email = $faker->companyEmail();
            $newAgency->indirizzo = $faker->streetAddress();
            $newAgency->cap = '89654';
            $newAgency->citta = $faker->city();
            $newAgency->provincia = $faker->stateAbbr();
            $newAgency->paese = $faker->country();
            $newAgency->ragione_sociale = $faker->company();
            $newAgency->p_iva = 'IT84512698547';
            $newAgency->codice_fiscale = 'PDRJHY85Y38D982H';
            $newAgency->tipo = 'SPA';
            //$newAgency->premium = $faker->boolean(30);
            $newAgency->pec_sdi = $faker->email();
            $newAgency->altre_informazioni = $faker->realText(500, 2);
            $newAgency->save();
        };
    }
}
