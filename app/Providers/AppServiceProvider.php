<?php

namespace App\Providers;

use App\Http\Requests\InstructorRegisterRequest;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CourseRepositoryInterface;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Eloquent\CourseRepository;
use App\Repositories\Eloquent\InstructorRepository;
use App\Repositories\Eloquent\LessonRepository as EloquentLessonRepository;
use App\Repositories\Eloquent\MediaRepository as EloquentMediaRepository;
use App\Repositories\Eloquent\NoteRepository;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Eloquent\SectionRepository;
use App\Repositories\Eloquent\StudentRepository;
use App\Repositories\EloquentRepositoryInterface;
use App\Repositories\InstructorRepositoryInterface;
use App\Repositories\LessonRepository;
use App\Repositories\LessonRepositoryInterface;
use App\Repositories\MediaRepository;
use App\Repositories\MediaRepositoryInterface;
use App\Repositories\NoteRepositoryInterface;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\SectionRepositoryInterface;
use App\Repositories\StudentRepositoryInterface;
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
        $this->app->bind(NoteRepositoryInterface::class, NoteRepository::class);
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(LessonRepositoryInterface::class, EloquentLessonRepository::class);
        $this->app->bind(MediaRepositoryInterface::class, EloquentMediaRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
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
