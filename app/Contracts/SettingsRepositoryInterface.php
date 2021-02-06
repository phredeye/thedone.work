<?php

namespace App\Contracts;



/**
 * SettingsRepositoryInterface
 *
 * Interface for any classes that want to abstract storage for site settings.
 *
 * @package App\Support
 */
interface SettingsRepositoryInterface
{
    /**
     * @param array $settings
     * @return mixed
     */
    public function fill(array $settings = []);

    /**
     * Determine if the given configuration value exists.
     *
     * @param string $name
     * @return bool
     */
    public function has($name) : bool;

    /**
     * Get the specified configuration value.
     *
     * @param string $name
     * @return array setting as associative array / key/value pairs
     */
    public function get($name) : array;

    /**
     * @param $name
     * @param string|mixed|null $default
     * @return string|mixed  setting value
     */
    public function value($name, $default = null);

    /**
     * Set a given configuration value.
     *
     * @param string $name
     * @param string $label
     * @param mixed $value
     * @return SettingsRepositoryInterface
     */
    public function set($name, $label, $value = null) : SettingsRepositoryInterface;

    /**
     * Get all of the configuration items for the application.
     *
     * @return array
     */
    public function all() : array;

    /**
     * Save settings to storage
     */
    public function persist() : void;

}
