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
            $table->boolean('visible_au_menu')->default(false)->after('contenu_html');
            $table->integer('ordre_menu')->default(0)->after('visible_au_menu');
            $table->unsignedBigInteger('parent_id')->nullable()->after('ordre_menu');
            $table->string('menu_titre')->nullable()->after('parent_id');

            $table->foreign('parent_id')->references('id')->on('pages')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropColumn(['visible_au_menu', 'ordre_menu', 'parent_id', 'menu_titre']);
        });
    }
};
