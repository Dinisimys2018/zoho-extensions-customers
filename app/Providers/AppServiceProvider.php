<?php

namespace App\Providers;

use App\Components\RestApi\Requests\Validation\ValidationErrorsContainer;
use App\Components\Zoho\Market\Requests\ActionRequestDTO;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ValidationErrorsContainer::class);

        $this->registerRequestDTO(ActionRequestDTO::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    protected function registerRequestDTO(string $className)
    {
        $this->app->bind($className, function() use ($className) {
            if (!$this->app->runningInConsole()) {
                return $className::createFromRequest();
            }
            return $className::create();
        });
    }
}
