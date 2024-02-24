<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CrudRepositoryInterface;
use App\Repositories\EloquentCategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CrudRepositoryInterface::class, EloquentCategoryRepository::class);
    }
}

