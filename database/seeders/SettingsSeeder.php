<?php

namespace Database\Seeders;

use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $defaults = config('settings.defaults');

        foreach ($defaults as $data) {
            Settings::create($data);
        }
    }
}
