<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\CategorieRepositoryInterface;
use App\Repositories\Implementation\CategorieRepository;

use App\Repositories\ProduitRepositoryInterface;
use App\Repositories\Implementation\ProduitRepository;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\Implementation\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CategorieRepositoryInterface::class,CategorieRepository::class);
        $this->app->bind(ProduitRepositoryInterface::class,ProduitRepository::class);
        $this->app->bind(UserRepositoryInterface::class,UserRepository::class);
    }
}

