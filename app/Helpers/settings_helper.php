<?php

use App\Models\Setting;

if (!function_exists('setting')) {
    /**
     * Récupérer une valeur de paramètre
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, mixed $default = null): mixed
    {
        return Setting::get($key, $default);
    }
}
