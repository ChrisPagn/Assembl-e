<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class StyleController extends Controller
{
    public function customCss(): Response
    {
        $css = Cache::remember('custom_css', 3600, function () {
            $settings = Setting::all();

            $cssContent = ":root {\n";

            foreach ($settings as $setting) {
                $varName = '--' . str_replace('_', '-', $setting->key);
                $cssContent .= "    {$varName}: {$setting->value};\n";
            }

            $cssContent .= "}\n\n";

            // === BODY & BACKGROUND ===
            $cssContent .= "body {\n";
            $cssContent .= "    background-color: var(--color-body-bg, #faf8f2) !important;\n";
            $cssContent .= "    color: var(--color-text-primary, #333333) !important;\n";
            $cssContent .= "    font-family: var(--font-primary, Cambria, 'Times New Roman', serif) !important;\n";
            $cssContent .= "}\n\n";

            // === POLICES ===
            $cssContent .= "h1, h2, h3, h4, h5, h6 {\n";
            $cssContent .= "    font-family: var(--font-heading, var(--font-primary, Cambria, 'Times New Roman', serif)) !important;\n";
            $cssContent .= "    color: var(--color-text-primary, #333333) !important;\n";
            $cssContent .= "}\n\n";

            // === NAVBAR ===
            $cssContent .= ".navbar {\n";
            $cssContent .= "    background-color: var(--color-navbar-bg, #212529) !important;\n";
            $cssContent .= "    border-bottom-color: var(--color-accent-gold, #dac27a) !important;\n";
            $cssContent .= "}\n\n";

            $cssContent .= ".navbar .nav-link, .navbar-brand {\n";
            $cssContent .= "    color: var(--color-text-navbar, #ffffff) !important;\n";
            $cssContent .= "}\n\n";

            $cssContent .= ".custom-nav-link {\n";
            $cssContent .= "    border-bottom-color: var(--color-text-navbar, #ffffff) !important;\n";
            $cssContent .= "}\n\n";

            $cssContent .= ".custom-nav-link::after {\n";
            $cssContent .= "    background-color: var(--color-accent-gold, #dac27a) !important;\n";
            $cssContent .= "}\n\n";

            $cssContent .= ".custom-toggler .toggler-icon {\n";
            $cssContent .= "    background-color: var(--color-text-navbar, #ffffff) !important;\n";
            $cssContent .= "}\n\n";

            // === CARTES ===
            $cssContent .= ".card, .verse-card, .home-events .card, .welcome-section .card, .event-mini-card {\n";
            $cssContent .= "    background-color: var(--color-card-bg, #fff7e6) !important;\n";
            $cssContent .= "}\n\n";

            $cssContent .= ".event-date-mini {\n";
            $cssContent .= "    background-color: var(--color-card-bg, #fff7e0) !important;\n";
            $cssContent .= "}\n\n";

            // === FOOTER ===
            $cssContent .= ".footer-links {\n";
            $cssContent .= "    background-color: var(--color-footer-bg, #f4f5f7) !important;\n";
            $cssContent .= "    border-top-color: var(--color-accent-gold, #dac27a) !important;\n";
            $cssContent .= "}\n\n";

            $cssContent .= ".footer-title {\n";
            $cssContent .= "    color: var(--color-text-primary, #333) !important;\n";
            $cssContent .= "}\n\n";

            $cssContent .= ".footer-description, .footer-copy {\n";
            $cssContent .= "    color: var(--color-text-secondary, #666) !important;\n";
            $cssContent .= "}\n\n";

            $cssContent .= ".footer-inline a {\n";
            $cssContent .= "    color: var(--color-link, #666) !important;\n";
            $cssContent .= "}\n\n";

            $cssContent .= ".footer-inline a:hover {\n";
            $cssContent .= "    color: var(--color-link-hover, #dac27a) !important;\n";
            $cssContent .= "}\n\n";

            // === LIENS ===
            $cssContent .= "a {\n";
            $cssContent .= "    color: var(--color-link, #666) !important;\n";
            $cssContent .= "}\n\n";

            $cssContent .= "a:hover {\n";
            $cssContent .= "    color: var(--color-link-hover, #dac27a) !important;\n";
            $cssContent .= "}\n\n";

            // === BOUTONS ===
            $cssContent .= ".btn-primary {\n";
            $cssContent .= "    background-color: var(--color-button-primary, #dac27a) !important;\n";
            $cssContent .= "    border-color: var(--color-button-primary, #dac27a) !important;\n";
            $cssContent .= "    color: var(--color-button-text, #333333) !important;\n";
            $cssContent .= "}\n\n";

            $cssContent .= ".btn-primary:hover {\n";
            $cssContent .= "    background-color: var(--color-button-primary, #dac27a) !important;\n";
            $cssContent .= "    border-color: var(--color-button-primary, #dac27a) !important;\n";
            $cssContent .= "    filter: brightness(0.9);\n";
            $cssContent .= "}\n\n";

            $cssContent .= ".btn-secondary {\n";
            $cssContent .= "    background-color: var(--color-button-secondary, #8B7355) !important;\n";
            $cssContent .= "    border-color: var(--color-button-secondary, #8B7355) !important;\n";
            $cssContent .= "    color: #ffffff !important;\n";
            $cssContent .= "}\n\n";

            $cssContent .= ".btn-secondary:hover {\n";
            $cssContent .= "    background-color: var(--color-button-secondary, #8B7355) !important;\n";
            $cssContent .= "    border-color: var(--color-button-secondary, #8B7355) !important;\n";
            $cssContent .= "    filter: brightness(0.9);\n";
            $cssContent .= "}\n\n";

            // === HERO ===
            $cssContent .= ".hero-title, .hero-subtitle {\n";
            $cssContent .= "    color: var(--color-text-primary, #333) !important;\n";
            $cssContent .= "}\n\n";

            // === PAGE TRANSITION ===
            $cssContent .= ".page-transition {\n";
            $cssContent .= "    background-color: var(--color-body-bg, rgba(255, 248, 242, 0.95)) !important;\n";
            $cssContent .= "}\n\n";

            // === TEXTE SECONDAIRE ===
            $cssContent .= ".text-muted, .small, .event-month-mini {\n";
            $cssContent .= "    color: var(--color-text-secondary, #777) !important;\n";
            $cssContent .= "}\n";

            return $cssContent;
        });

        return response($css, 200)
            ->header('Content-Type', 'text/css')
            ->header('Cache-Control', 'public, max-age=3600');
    }
}
