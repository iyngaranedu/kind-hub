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
use App\Services\School\ClassRoom\ClassRoomService;
use App\Services\School\ClassRoom\ClassRoomServiceInterface;

use App\Writes\School\ClassRoom\ClassRoomWrite;
use App\Repositories\School\ClassRoom\ClassRoomRepository;

/**
 * The service provider class for ClassRoomService
 *
 * @category ServiceProvider
 * @package  Teacher_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class ClassRoomServiceProvider  extends ServiceProvider
{
    /**
     * Register teacher related services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            ClassRoomServiceInterface::class, function ($app) {
                return new ClassRoomService(
                    $app->make(ClassRoomWrite::class),
                    $app->make(ClassRoomRepository::class)
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
