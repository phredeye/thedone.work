<?php

namespace App\Console\Commands;

use App\Contracts\SettingsRepositoryInterface;
use Illuminate\Console\Command;

/**
 * Class SettingsEditCommand
 * @package App\Console\Commands
 */
class SettingsSaveCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'settings:save {name} {--value=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'creates a setting if it doesnt exist, updates if it does';

    /**
     * @var SettingsRepositoryInterface
     */
    protected SettingsRepositoryInterface $settingsRepository;

    /**
     * Create a new command instance.
     *
     * @param SettingsRepositoryInterface $settingsRepository
     */
    public function __construct(SettingsRepositoryInterface $settingsRepository)
    {
        parent::__construct();
        $this->settingsRepository = $settingsRepository;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $value = $this->option('value');
        if(empty($value)) {
            $value = $this->getOutput()->ask('Enter a setting value: ');
        }


        $label = null;
        if($this->settingsRepository->has($name)) {
            $setting = $this->settingsRepository->get($name);
            $setting['name'] = $name;
            $setting['value'] = $value;
        } else {
            $this->output->writeln('This setting doesnt exist.  You will be creating a new setting.');
            $label = $this->getOutput()->ask('Enter a label for this setting: ');
            if (empty($label)) {
                $this->output->error('Label cant be empty.  Exiting.');
                return 1;
            }

            $setting = [
                'name' => $name ,
                'label' => $label,
                'value' => $value
            ];
        }
        $this->getOutput()->writeln('New Setting:');
        $this->getOutput()->writeln(print_r($setting, true));

        $shouldSave = $this->getOutput()->confirm('Save setting?', 'no');

        if($shouldSave) {
            $this->settingsRepository->set($name, $label, $value);
            $this->settingsRepository->persist();
        }

        $this->getOutput()->success('Setting saved');

        return 0;
    }
}
