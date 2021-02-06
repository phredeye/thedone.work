<?php


namespace App\Settings;


use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public string $title;
    public string $tagline;

    public static function group(): string
    {
        return "site";
    }
}
