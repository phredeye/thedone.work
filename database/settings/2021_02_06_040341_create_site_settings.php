<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateSiteSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('site.title', 'ACME Web Development');
        $this->migrator->add('site.tagline', 'Where the rubber meets the road...');
    }
}
