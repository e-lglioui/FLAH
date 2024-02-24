<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\EloquentCategoryRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, EloquentCategoryRepository::class);
    }
}

