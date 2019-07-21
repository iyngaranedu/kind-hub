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
use App\Services\School\Teacher\TeacherService;
use App\Services\School\Teacher\TeacherServiceInterface;

use App\Writes\School\Teacher\TeacherWrite;
use App\Repositories\School\Teacher\TeacherRepository;

/**
 * The service provider class for TeacherService
 *
 * @category ServiceProvider
 * @package  Teacher_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class TeacherServiceProvider  extends ServiceProvider
{
    /**
     * Register teacher related services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            TeacherServiceInterface::class, function ($app) {
                return new TeacherService(
                    $app->make(TeacherWrite::class),
                    $app->make(TeacherRepository::class)
                );
            }
        );
    }

    /**
     * Bootstrap teacher related services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
