<?php


namespace App\Support;

use App\Contracts\SettingsInterface;
use App\Models\Settings as SettingsModel;
use Illuminate\Config\Repository;
use Illuminate\Support\Facades\Cache;

/**
 * Class Settings
 * @package App\Support
 */
class Settings extends Repository implements SettingsInterface
{
    /**
     * @var string[]
     */
    protected static $defaults = [
        'site.name' => 'Web Agency Website',
        'site.tagline' => 'One more time',
        "site.meta.description" => "this will end up in your meta description",
        "site.meta.tags" => "freelancer programmer stuff things junk",
    ];

    /**
     * Settings constructor.
     */
    public function __construct()
    {

    }

    /**
     * Load settings from database
     */
    public function loadAll()
    {
        $settings = Cache::get('site.settings', function () {
            return SettingsModel::all()->toArray();
        });

        $settings = array_merge(static::$defaults, $settings);

//        foreach ($settings as $setting) {
//            $this->set($setting["name"], $setting["value"]);
//        }

    }
}
