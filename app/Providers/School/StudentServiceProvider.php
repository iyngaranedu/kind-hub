<?php
/**
 * The student record system for KindHub Elementry School.
 *
 * PHP version 7.1
 *
 * @category PHP/Laravel
 * @package  School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
namespace App\Providers\School;

use Illuminate\Support\ServiceProvider;
use App\Services\School\Student\StudentService;
use App\Services\School\Student\StudentServiceInterface;

use App\Writes\School\Student\StudentWrite;
use App\Repositories\School\Student\StudentRepository;

/**
 * The service provider class for StudentService
 *
 * @category ServiceProvider
 * @package  Student_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class StudentServiceProvider  extends ServiceProvider
{
    /**
     * Register student related services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            StudentServiceInterface::class, function ($app) {
                return new StudentService(
                    $app->make(StudentWrite::class),
                    $app->make(StudentRepository::class)
                );
            }
        );
    }

    /**
     * Bootstrap student related services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
