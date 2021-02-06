<?php


namespace Database\Seeders;


use Database\Seeders\UserTableSeeder;
use Illuminate\Database\Seeder;
use Modules\ContentTypes\Database\Seeders\ContentTypesDatabaseSeeder;
use Nwidart\Modules\Module;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $params = [
            "generate_fake_data" => $this->askGenerateFakes()
        ];

        $this->call(UserTableSeeder::class, null, $params);
        $this->call(ContentTypesDatabaseSeeder::class, null, $params);
        $this->call(SettingsSeeder::class, null, $params);
        $this->command->call('module:migrate');
    }

    public function askGenerateFakes() : bool
    {
        $generateFakes = $this->command->getOutput()->confirm(
            'Would you like to generate dummy users and teams so there is content during development?',
            false
        );

        return $generateFakes;
    }
}
