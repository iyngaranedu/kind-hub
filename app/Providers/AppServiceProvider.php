<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\School\TeacherServiceProvider;
use App\Providers\School\ClassRoomServiceProvider;
use App\Providers\School\StudentServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(TeacherServiceProvider::class);
        $this->app->register(ClassRoomServiceProvider::class);
        $this->app->register(StudentServiceProvider::class);
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
