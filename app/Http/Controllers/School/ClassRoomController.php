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
namespace App\Http\Controllers\School;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\School\ClassRoom\ClassRoomServiceInterface;
use App\Requests\School\TeacherValidation;
/**
 * The controller class for class room
 *
 * @category Controller
 * @package  School_ClassRoom
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class ClassRoomController extends Controller
{
    /**
     * The class room service interface
     *
     * @var App\Services\School\ClassRoom\ClassRoomServiceInterface
     */
    private $_classRoom;

    /**
     * ClassRoomController constructor.
     *
     * @param ClassRoomServiceInterface $classRoom The class room service interface
     */
    public function __construct(ClassRoomServiceInterface $classRoom)
    {
        $this->_classRoom = $classRoom;
    }

    /**
     * Get all class rooms
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(
            [
                'classrooms' => $this->_classRoom->getAll(),
            ], 200
        );
    }


}
