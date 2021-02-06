<?php

namespace Tests\Feature\Integration\Support;

use App\Support\DbSettingsRepository;
use Database\Seeders\SettingsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DbSettingsRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected $settings;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(SettingsSeeder::class);
        $this->settings = new DbSettingsRepository();

    }

    public function test_load_all() : void {
        $this->settings->fill(config('settings.defaults'));
        $this->assertTrue($this->settings->has('site.title'));
        $this->assertTrue($this->settings->has('site.tagline'));
        $this->assertTrue($this->settings->has('site.meta.description'));
        $this->assertTrue($this->settings->has('site.meta.tags'));
    }

    public function test_all() : void {
        $this->settings->fill(config('settings.defaults'));
        $all = $this->settings->all();
        $this->assertIsArray($all);
        $this->assertArrayHasKey('site.title', $all);
    }

    public function test_set() {
        $this->settings->set('test.setting', 'Test Label', 'test value');
        $setting = $this->settings->get('test.setting');
        $this->assertEquals('test.setting', $setting['name']);
        $this->assertEquals('Test Label', $setting['label']);
        $this->assertEquals('test value', $setting['value']);
    }

    public function test_value() {
        $this->settings->set('test.setting', 'Test Label', 'test value');
        $value = $this->settings->value('test.setting');
        $this->assertEquals('test value', $value);
    }

}
