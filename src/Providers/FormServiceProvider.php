<?php

namespace Naitrons\LivewireForms\Providers;

use Illuminate\Support\ServiceProvider;
use Naitrons\LivewireForms\Commands\MakeForm;

class FormServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([MakeForm::class]);
        }

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'livewire-forms');
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        $this->publishes([__DIR__ . '/../../config/livewire-forms.php' => config_path('livewire-forms.php')], 'form-config');
        $this->publishes([__DIR__ . '/../../resources/views' => resource_path('views/vendor/livewire-forms')], 'form-views');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/livewire-forms.php', 'livewire-forms');
    }
}
