<?php


namespace App\Support;

use App\Contracts\SettingsRepositoryInterface;
use App\Models\Settings as SettingsModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * Class DbSettingStore
 * @package App\Support
 */
class DbSettingsRepository implements SettingsRepositoryInterface
{
    /**
     * @var Collection
     */
    protected Collection $entries;


    /**
     * DbSettingStore constructor.
     */
    public function __construct()
    {
        $this->entries = new Collection();
    }

    /**
     * Load settings from database
     */
    public function loadAll()
    {
        $settings = Cache::get('site.settings', function () {
            return SettingsModel::all()->toArray();
        });

        $defaults = config('settings.defaults');
        $settings = array_merge($defaults, $settings);

        foreach ($settings as $setting) {
            $this->set($setting['name'], $setting);
        }

    }

    /**
     * @param string $name
     * @return bool
     */
    public function has($name) : bool
    {
       return $this->entries->has($name);
    }

    /**
     * @param string $name
     * @return array
     */
    public function get($name) : array
    {
        return $this->entries->get($name);
    }

    /**
     * @param $name
     * @param null $default
     * @return mixed
     */
    public function value($name, $default = null)  {
        $setting = $this->entries->get($name);
        return $setting["value"];
    }

    /**
     * @param string $name
     * @param string $label
     * @param null $value
     * @return SettingsRepositoryInterface
     */
    public function set($name, $label, $value = null) : SettingsRepositoryInterface
    {
        $this->entries->put($name, [
            "name" => $name,
            "label" => $label,
            "value" => $value
        ]);

        return $this;
    }

    /**
     * @return array
     */
    public function all(): array
    {
        return $this->entries->toArray();
    }

    /**
     * Save all settings
     */
    public function persist() : void {
       $this->entries->each(function($data, $name) {
           var_dump($data);
           $setting = new SettingsModel();
           $query = (new SettingsModel())->newModelQuery()->where('name', $name);
           if($query->exists()) {
               $setting = $query->first();
           }

           $setting->forceFill($data);
           $setting->save();
       });
    }

    /**
     * @param array $settings
     * @return mixed|void
     */
    public function fill(array $settings = [])
    {
        foreach($settings as $setting) {
            $this->entries->put($setting['name'], $setting);
        }
    }
}
