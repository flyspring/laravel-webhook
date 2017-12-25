<?php

namespace webhook\Providers;

use Illuminate\Support\ServiceProvider;
use webhook\Services\Webhooks\WebhookInterface;
use webhook\Services\Webhooks\Gitos;
use webhook\Services\Webhooks\Github;
use webhook\Services\Webhooks\webhook\Services\Webhooks;

class WebhookServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind(WebhookInterface::class, function($app){
                $config = $app['config']->get('hooks');
                $default = $config['default'];
                if ($default == 'gitos') {
                    return new Gitos($config['hooks'][$default], $config['projects']);
                } elseif ($default == 'github') {
                    return new Github($config['hooks'][$default], $config['projects']);
                } else {
                    return new Gitos($config['hooks']['gitos'], $config['projects']);
                }
            });
    }
}
