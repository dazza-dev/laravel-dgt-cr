<?php

namespace DazzaDev\LaravelDgtCr\Facades;

use DazzaDev\DgtCr\Client;
use DazzaDev\DgtCr\Listing;
use Illuminate\Support\Facades\Facade;

class LaravelDgtCr extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-dgt-cr';
    }

    /**
     * Get the client instance.
     */
    public static function getClient(): Client
    {
        return app('laravel-dgt-cr');
    }

    /**
     * Get the listings.
     */
    public static function getListings(): array
    {
        return Listing::getListings();
    }

    /**
     * Get the listing by type.
     */
    public static function getListing(string $type): array
    {
        return Listing::getListing($type);
    }
}
