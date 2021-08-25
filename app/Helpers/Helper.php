<?php

if (!function_exists('moneyFormat')) {
    function moneyFormat($digits): ?string
    {
        if (is_numeric($digits)) {
            return config('settings.currency_symbol') . number_format($digits);
        } else {
            return null;
        }
    }
}

if (!function_exists('getSiteImageLink')) {
    function getSiteImageLink(?string $configName): ?string
    {
        return collect(json_decode(config("settings.{$configName}"))?->link)->first();
    }
}
