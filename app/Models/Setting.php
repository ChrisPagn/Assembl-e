<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'value',
        'type',
        'label',
        'description',
    ];

    /**
     * Récupérer une valeur de paramètre par sa clé
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return Cache::remember("setting_{$key}", 3600, function () use ($key, $default) {
            $setting = self::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Définir ou mettre à jour un paramètre
     */
    public static function set(string $key, mixed $value): void
    {
        self::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
        Cache::forget("setting_{$key}");
    }

    /**
     * Effacer le cache après modification
     */
    protected static function booted(): void
    {
        static::saved(function ($setting) {
            Cache::forget("setting_{$setting->key}");
        });
    }
}
