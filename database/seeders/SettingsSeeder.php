<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // Couleurs principales
            [
                'key' => 'color_accent_gold',
                'value' => '#dac27a',
                'type' => 'color',
                'label' => 'Couleur Accent (Doré)',
                'description' => 'Couleur dorée utilisée pour les accents (bordures navbar, footer, liens hover)',
            ],
            [
                'key' => 'color_body_bg',
                'value' => '#faf8f2',
                'type' => 'color',
                'label' => 'Fond de la Page',
                'description' => 'Couleur de fond principal du site (body)',
            ],
            [
                'key' => 'color_card_bg',
                'value' => '#fff7e6',
                'type' => 'color',
                'label' => 'Fond des Cartes',
                'description' => 'Couleur de fond des cartes de contenu',
            ],
            [
                'key' => 'color_navbar_bg',
                'value' => '#212529',
                'type' => 'color',
                'label' => 'Fond de la Navigation',
                'description' => 'Couleur de fond de la barre de navigation',
            ],
            [
                'key' => 'color_footer_bg',
                'value' => '#f4f5f7',
                'type' => 'color',
                'label' => 'Fond du Footer',
                'description' => 'Couleur de fond du pied de page',
            ],

            // Couleurs de texte
            [
                'key' => 'color_text_primary',
                'value' => '#333333',
                'type' => 'color',
                'label' => 'Texte Principal',
                'description' => 'Couleur du texte principal',
            ],
            [
                'key' => 'color_text_secondary',
                'value' => '#666666',
                'type' => 'color',
                'label' => 'Texte Secondaire',
                'description' => 'Couleur du texte secondaire (descriptions, labels)',
            ],
            [
                'key' => 'color_text_navbar',
                'value' => '#ffffff',
                'type' => 'color',
                'label' => 'Texte Navigation',
                'description' => 'Couleur du texte dans la barre de navigation',
            ],

            // Couleurs interactives
            [
                'key' => 'color_link',
                'value' => '#666666',
                'type' => 'color',
                'label' => 'Couleur des Liens',
                'description' => 'Couleur des liens normaux',
            ],
            [
                'key' => 'color_link_hover',
                'value' => '#dac27a',
                'type' => 'color',
                'label' => 'Liens au Survol',
                'description' => 'Couleur des liens au survol',
            ],
            [
                'key' => 'color_button_primary',
                'value' => '#dac27a',
                'type' => 'color',
                'label' => 'Boutons Principaux',
                'description' => 'Couleur de fond des boutons principaux',
            ],
            [
                'key' => 'color_button_text',
                'value' => '#333333',
                'type' => 'color',
                'label' => 'Texte des Boutons',
                'description' => 'Couleur du texte des boutons',
            ],
            [
                'key' => 'color_button_secondary',
                'value' => '#8B7355',
                'type' => 'color',
                'label' => 'Boutons Secondaires',
                'description' => 'Couleur de fond des boutons secondaires (marron doux)',
            ],

            // Polices
            [
                'key' => 'font_primary',
                'value' => 'Cambria, "Times New Roman", serif',
                'type' => 'font',
                'label' => 'Police Principale',
                'description' => 'Police utilisée pour tout le texte du site',
            ],
            [
                'key' => 'font_heading',
                'value' => 'Cambria, "Times New Roman", serif',
                'type' => 'font',
                'label' => 'Police des Titres',
                'description' => 'Police utilisée pour les titres (H1, H2, etc.)',
            ],

            // Contenus - Page Accueil
            [
                'key' => 'home_hero_subtitle',
                'value' => 'Un lieu de prière, d\'enseignement et de communion fraternelle.',
                'type' => 'text',
                'label' => 'Sous-titre Hero (Accueil)',
                'description' => 'Sous-titre affiché dans la bannière de la page d\'accueil',
            ],
            [
                'key' => 'home_info_culte',
                'value' => '10h30 – temps de louange, prière et prédication.',
                'type' => 'text',
                'label' => 'Info Culte (Accueil)',
                'description' => 'Informations sur le culte du dimanche',
            ],
            [
                'key' => 'home_info_adresse',
                'value' => 'Rue Exemple 12<br>5000 Namur',
                'type' => 'textarea',
                'label' => 'Adresse (Accueil)',
                'description' => 'Adresse de l\'assemblée (HTML autorisé)',
            ],
            [
                'key' => 'home_info_message',
                'value' => 'Vous êtes les bienvenus, que vous soyez habitué ou simplement en recherche.',
                'type' => 'text',
                'label' => 'Message d\'accueil',
                'description' => 'Message d\'accueil dans les infos pratiques',
            ],

            // Contenus - Footer
            [
                'key' => 'footer_title',
                'value' => 'Assemblée évangélique',
                'type' => 'text',
                'label' => 'Titre Footer',
                'description' => 'Titre principal du footer',
            ],
            [
                'key' => 'footer_description',
                'value' => 'Nous vous acceuillons pour le culte le dimanche à 10h30.',
                'type' => 'text',
                'label' => 'Description Footer',
                'description' => 'Description dans le footer',
            ],
            [
                'key' => 'footer_email',
                'value' => 'info@assemblee.be',
                'type' => 'text',
                'label' => 'Email Footer',
                'description' => 'Adresse email de contact',
            ],
            [
                'key' => 'footer_adresse',
                'value' => 'Rue Exemple 12, 5000 Namur',
                'type' => 'text',
                'label' => 'Adresse Footer',
                'description' => 'Adresse complète dans le footer',
            ],
            [
                'key' => 'footer_copyright',
                'value' => 'Assemblée évangélique',
                'type' => 'text',
                'label' => 'Copyright Footer',
                'description' => 'Texte du copyright',
            ],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}
