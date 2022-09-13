<?php

namespace App\Providers;

use App\Http\Requests\InstructorRegisterRequest;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CourseRepositoryInterface;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\CourseRepository;
use App\Repositories\Eloquent\InstructorRepository;
use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\InstructorRepositoryInterface;
use App\Services\AuthService;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Auth\EloquentUserProvider;
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
        $this->app->bind(InstructorRepositoryInterface::class, InstructorRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);
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
