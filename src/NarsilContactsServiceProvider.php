<?php

namespace Narsil\Contacts;

#region USE

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Narsil\Contacts\Models\Address;
use Narsil\Contacts\Models\PhoneNumber;
use Narsil\Contacts\Policies\AddressPolicy;
use Narsil\Contacts\Policies\PhoneNumberPolicy;

#endregion

/**
 * @version 1.0.0
 *
 * @author Jonathan Rigaux
 */
final class NarsilContactsServiceProvider extends ServiceProvider
{
    #region PUBLIC METHODS

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->bootMigrations();
        $this->bootPolicies();
        $this->bootTranslations();
    }

    #endregion

    #region PRIVATE METHODS

    /**
     * @return void
     */
    private function bootMigrations(): void
    {
        $this->loadMigrationsFrom([
            __DIR__ . '/../database/migrations',
        ]);
    }

    /**
     * @return void
     */
    private function bootPolicies(): void
    {
        Gate::policy(Address::class, AddressPolicy::class);
        Gate::policy(PhoneNumber::class, PhoneNumberPolicy::class);
    }

    /**
     * @return void
     */
    private function bootTranslations(): void
    {
        $this->loadJsonTranslationsFrom(__DIR__ . '/../lang', 'contacts');
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'contacts');
    }

    #endregion
}
