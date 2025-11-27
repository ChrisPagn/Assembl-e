<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->text('hero_subtitle')->nullable()->after('contenu_html');
            $table->text('info_culte')->nullable()->after('hero_subtitle');
            $table->text('info_adresse')->nullable()->after('info_culte');
            $table->text('info_message')->nullable()->after('info_adresse');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['hero_subtitle', 'info_culte', 'info_adresse', 'info_message']);
        });
    }
};
