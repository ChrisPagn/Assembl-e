<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Verset;

class AdditionalVersetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $versets = [
            [
                'reference' => 'Jean 3:16',
                'texte' => 'Car Dieu a tant aimé le monde qu\'il a donné son Fils unique, afin que quiconque croit en lui ne périsse point, mais qu\'il ait la vie éternelle.',
                'jour_index' => 6,
            ],
            [
                'reference' => 'Psaume 23:1',
                'texte' => 'L\'Éternel est mon berger : je ne manquerai de rien.',
                'jour_index' => 7,
            ],
            [
                'reference' => 'Romains 8:28',
                'texte' => 'Toutes choses concourent au bien de ceux qui aiment Dieu.',
                'jour_index' => 8,
            ],
            [
                'reference' => 'Philippiens 4:13',
                'texte' => 'Je puis tout par celui qui me fortifie.',
                'jour_index' => 9,
            ],
            [
                'reference' => 'Matthieu 5:16',
                'texte' => 'Que votre lumière luise ainsi devant les hommes, afin qu\'ils voient vos bonnes œuvres, et qu\'ils glorifient votre Père qui est dans les cieux.',
                'jour_index' => 10,
            ],
            [
                'reference' => 'Josué 1:9',
                'texte' => 'Fortifie-toi et prends courage ! Ne t\'effraie point et ne t\'épouvante point, car l\'Éternel, ton Dieu, est avec toi dans tout ce que tu entreprendras.',
                'jour_index' => 11,
            ],
            [
                'reference' => 'Ésaïe 41:10',
                'texte' => 'Ne crains rien, car je suis avec toi ; ne promène pas des regards inquiets, car je suis ton Dieu.',
                'jour_index' => 12,
            ],
            [
                'reference' => 'Psaume 46:2',
                'texte' => 'Dieu est pour nous un refuge et un appui, un secours qui ne manque jamais dans la détresse.',
                'jour_index' => 13,
            ],
            [
                'reference' => 'Jean 14:6',
                'texte' => 'Je suis le chemin, la vérité et la vie. Nul ne vient au Père que par moi.',
                'jour_index' => 14,
            ],
            [
                'reference' => 'Proverbes 3:5',
                'texte' => 'Confie-toi en l\'Éternel de tout ton cœur, et ne t\'appuie pas sur ta sagesse.',
                'jour_index' => 15,
            ],
        ];

        foreach ($versets as $verset) {
            Verset::create($verset);
        }
    }
}
