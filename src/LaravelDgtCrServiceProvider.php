<?php

namespace DazzaDev\LaravelDgtCr;

use DazzaDev\DgtCr\Client;
use DazzaDev\LaravelDgtCr\Commands\DgtCrInstallCommand;
use Illuminate\Support\ServiceProvider;

class LaravelDgtCrServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('laravel-dgt-cr', function ($app) {
            $client = new Client(config('laravel-dgt-cr.test'));

            // Set certificate
            if (config('laravel-dgt-cr.certificate.path')) {
                $client->setCertificate([
                    'path' => config('laravel-dgt-cr.certificate.path'),
                    'password' => config('laravel-dgt-cr.certificate.password'),
                ]);
            }

            // Set credentials
            if (config('laravel-dgt-cr.auth.username') && config('laravel-dgt-cr.auth.password')) {
                $client->setCredentials([
                    'username' => config('laravel-dgt-cr.auth.username'),
                    'password' => config('laravel-dgt-cr.auth.password'),
                ]);
            }

            // Set path
            if (config('laravel-dgt-cr.path')) {
                $client->setFilePath(config('laravel-dgt-cr.path'));
            }

            // Set Callback
            if (config('laravel-dgt-cr.callback_url')) {
                $client->setCallbackUrl(config('laravel-dgt-cr.callback_url'));
            }

            return $client;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/laravel-dgt-cr.php' => config_path('laravel-dgt-cr.php'),
        ], 'laravel-dgt-cr-config');

        // Migrations
        $this->publishes([
            $this->getMigrationFilePath('create_dgt_configs_table.php') => database_path('migrations/'.$this->getMigrationFileName('create_dgt_configs_table.php')),
            $this->getMigrationFilePath('create_dgt_documents_table.php') => database_path('migrations/'.$this->getMigrationFileName('create_dgt_documents_table.php')),
        ], 'laravel-dgt-cr-migrations');

        // Lang
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-dgt-cr');

        // Commands
        $this->commands([
            DgtCrInstallCommand::class,
        ]);
    }

    /**
     * Get the migration file path.
     */
    protected function getMigrationFilePath(string $migrationFileName): string
    {
        return __DIR__.'/../database/migrations/'.$migrationFileName;
    }

    /**
     * Get the migration file name with current timestamp.
     */
    protected function getMigrationFileName(string $migrationFileName): ?string
    {
        return date('Y_m_d_His').'_'.$migrationFileName;
    }
}
