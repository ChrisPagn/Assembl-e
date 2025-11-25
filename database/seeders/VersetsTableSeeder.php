<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Verset;

class VersetsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Tu pourras en ajouter jusqu'à 365, un par jour_index

        Verset::updateOrCreate(
            ['jour_index' => 1],
            [
                'reference' => 'Jean 3:16',
                'texte'     => "Car Dieu a tant aimé le monde qu'il a donné son Fils unique, "
                             . "afin que quiconque croit en lui ne périsse point, mais qu'il ait la vie éternelle."
            ]
        );

        Verset::updateOrCreate(
            ['jour_index' => 2],
            [
                'reference' => 'Psaume 23:1',
                'texte'     => "L’Éternel est mon berger: je ne manquerai de rien."
            ]
        );

        Verset::updateOrCreate(
            ['jour_index' => 3],
            [
                'reference' => 'Matthieu 11:28',
                'texte'     => "Venez à moi, vous tous qui êtes fatigués et chargés, et je vous donnerai du repos."
            ]
        );

        Verset::updateOrCreate(
            ['jour_index' => 4],
            [
                'reference' => 'Matthieu 18:20',
                'texte'     => "Car là où deux ou trois sont assemblés en mon nom, je suis au milieu d’eux."
            ]
        );

        Verset::updateOrCreate(
            ['jour_index' => 5],
            [
                'reference' => 'Psaume 119:105',
                'texte'     => "Ta parole est une lampe à mon pied, et une lumière sur mon sentier."
            ]
        );
    }
}
