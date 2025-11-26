<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TimelineEvent;

class TimelineEventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'ordre' => 1,
                'annee' => '2025 avril - mai',
                'titre' => 'Premières réunions de maison',
                'description' => 'Quelques familles se réunissent pour la prière et l\'étude biblique.',
                'image' => 'histoire_1995.jpg',
            ],
            [
                'ordre' => 2,
                'annee' => '2025 juin',
                'titre' => 'Ouverture de l\'assemblée de Hogne',
                'description' => 'Nous avons décidés de nous rassembler en tant qu\'église.',
                'image' => 'histoire_2005.jpg',
            ],
            [
                'ordre' => 3,
                'annee' => '2025 août',
                'titre' => 'Développement des activités',
                'description' => 'Mise en place d\'études bibliques, groupes de jeunes, et actions de soutien.',
                'image' => 'histoire_2020.jpg',
            ],
        ];

        foreach ($events as $event) {
            TimelineEvent::create($event);
        }
    }
}
