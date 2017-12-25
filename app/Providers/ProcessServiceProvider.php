<?php

namespace webhook\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use webhook\Services\Scripts\Parser;
use webhook\Services\Scripts\Runner;
use Symfony\Component\Process\Process;

/**
 * Provides Symfony process runner.
 */
class ProcessServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind(Parser::class, function (Application $app) {
            return new Parser($app->make('files'));
        });

        $this->app->bind(Runner::class, function (Application $app) {
            $process = new Process('');
            $process->setTimeout(null);

            $logger = $app->make('log');
            $parser = $app->make(Parser::class);

            return new Runner($parser, $process, $logger);
        });
    }
}
