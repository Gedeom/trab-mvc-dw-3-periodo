<?php

namespace App\Providers;

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
        //vinculo o repositorio com a interface categoria
        $this->app->bind('App\Interfaces\CategoriaRepositoryInterface', 'App\Repositories\CategoriaRepository');

        //vinculo o repositorio com a interface produto
        $this->app->bind('App\Interfaces\ProdutoRepositoryInterface', 'App\Repositories\ProdutoRepository');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
