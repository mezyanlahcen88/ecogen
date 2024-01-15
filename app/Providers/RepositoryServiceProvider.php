<?php

namespace App\Providers;

use Arr;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;
use App\Repositories\PaymentSettingRepository;
use App\Repositories\TransportCompanyRepository;
use App\InterfaceRepositories\InterfacePaymentSettingRepository;
use App\InterfaceRepositories\InterfaceTransportCompanyRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(InterfacePaymentSettingRepository::class, PaymentSettingRepository::class);
        $this->app->bind(InterfaceTransportCompanyRepository::class, TransportCompanyRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
