<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Event;
use App\Models\Verset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer les pages principales
        Page::firstOrCreate(
            ['slug' => 'accueil'],
            [
                'titre' => 'Accueil',
                'contenu_html' => '<p>Bienvenue sur le site de l\'Assemblée Évangélique de Hogne.</p>',
            ]
        );

        Page::firstOrCreate(
            ['slug' => 'a-propos'],
            [
                'titre' => 'À Propos',
                'contenu_html' => '<p>Notre histoire et notre mission.</p>',
            ]
        );

        Page::firstOrCreate(
            ['slug' => 'contact'],
            [
                'titre' => 'Contact',
                'contenu_html' => '<p>Contactez-nous pour plus d\'informations.</p>',
            ]
        );

        // Créer quelques événements de test
        Event::firstOrCreate(
            ['titre' => 'Culte dominical'],
            [
                'description' => 'Culte tous les dimanches',
                'date_debut' => now()->addDays(7)->setTime(10, 0),
                'date_fin' => now()->addDays(7)->setTime(12, 0),
                'lieu' => 'Assemblée Évangélique de Hogne',
                'est_public' => true,
            ]
        );

        // Créer quelques versets de test
        Verset::firstOrCreate(
            ['jour_index' => 1],
            [
                'reference' => 'Jean 3:16',
                'texte' => 'Car Dieu a tant aimé le monde qu\'il a donné son Fils unique, afin que quiconque croit en lui ne périsse point, mais qu\'il ait la vie éternelle.',
            ]
        );

        $this->command->info('Données initiales créées avec succès !');
    }
}
