<?php

namespace App\Providers;

// use App\Service\TodoListService;
// use App\Service\impl\TodoListServiceImpl;
// use Illuminate\Support\ServiceProvider;
// use Illuminate\Contracts\Support\DeferrableProvider;

use App\Services\Impl\TodolistServiceImpl;
use App\Services\TodolistService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TodoListServiceProvider extends ServiceProvider implements DeferrableProvider
{

    // public array $singletons = [
    //     TodoListService::class => TodoListServiceImpl::class
    // ];

    // public function provides(): array
    // {
    //     return [TodoListService::class];
    // }

    public array $singletons = [
        TodolistService::class => TodolistServiceImpl::class
    ];

    public function provides(): array
    {
        return [TodolistService::class];
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
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