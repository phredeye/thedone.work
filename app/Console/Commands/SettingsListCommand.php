<?php

namespace App\Console\Commands;

use App\Contracts\SettingsRepositoryInterface;
use Illuminate\Console\Command;

class SettingsListCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:list';

    /**
     * List site settings
     *
     * @var string
     */
    protected $description = 'List site settings';

    /**
     * @var SettingsRepositoryInterface
     */
    protected SettingsRepositoryInterface $settings;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(SettingsRepositoryInterface $settings)
    {
        parent::__construct();
        $this->settings = $settings;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $allSettings = $this->settings->all();
        $this->getOutput()->writeln('Site Settings:');
        $this->getOutput()->table(['name', 'label', 'value'], $allSettings);
        return 0;
    }
}
