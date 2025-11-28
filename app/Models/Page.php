<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'titre',
        'contenu_html',
        'hero_subtitle',
        'info_culte',
        'info_adresse',
        'info_message',
        'visible_au_menu',
        'ordre_menu',
        'parent_id',
        'menu_titre',
    ];

    protected $casts = [
        'visible_au_menu' => 'boolean',
    ];

    // Relation parent-enfant pour les menus
    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id')->orderBy('ordre_menu');
    }

    // Scope pour récupérer les pages du menu
    public function scopeMenuItems($query)
    {
        return $query->where('visible_au_menu', true)
                     ->whereNull('parent_id')
                     ->orderBy('ordre_menu')
                     ->with('children');
    }
}
