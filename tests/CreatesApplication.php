<?php

namespace Tests;

use App\Components\Zoho\Market\Requests\ActionRequestDTO;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        $this->registerRequestDTO($app,ActionRequestDTO::class);

        return $app;
    }

    protected function registerRequestDTO($app, string $className)
    {
        $app->bind($className, function() use ($className) {
            return $className::createFromRequest();
        });
    }
}
