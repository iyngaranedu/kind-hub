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
use App\Services\School\Teacher\TeacherServiceInterface;
use App\Requests\School\TeacherValidation;
/**
 * The controller class for teacher
 *
 * @category Controller
 * @package  Teacher_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class TeacherController extends Controller
{
    /**
     * The teacher service interface
     *
     * @var App\Services\School\Teacher\TeacherServiceInterfacee
     */
    private $_teacher;

    /**
     * TeacherController constructor.
     *
     * @param TeacherServiceInterface $teacher The teacher service interface
     */
    public function __construct(TeacherServiceInterface $teacher)
    {
        $this->_teacher = $teacher;
    }

    /**
     * Get all teachers
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(
            [
                'teachers' => $this->_teacher->getAll(),
            ], 200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id The teacher id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        return response()->json([
            'teacher' => $this->_teacher->findOneById((int)$id),
        ], 200);
    }


    /**
     * Create a new Teacher
     *
     * @param TeacherValidation $request The teacher validation object
     *
     * @group Teacher
     *
     * @bodyParam first_name string required first_name of the new teacher
     * @bodyParam last_name string required the last_name of the teacher
     * @bodyParam email string required the email of the teacher
     * @bodyParam telephone string the telephone of the teacher
     *
     * @return JsonResponse
     */
    public function store(TeacherValidation $request): JsonResponse
    {
        return response()->json(
            [
            'teacher' => $this->_teacher->create($request->all()),
            ], 200
        );
    }

    /**
     * Update a Teacher
     *
     * @param TeacherValidation $request The teacher validation object
     *
     * @group Teacher
     *
     * @bodyParam first_name string required first_name of the new teacher
     * @bodyParam last_name string required the last_name of the teacher
     * @bodyParam email string required the email of the teacher
     * @bodyParam telephone string the telephone of the teacher
     *
     * @return JsonResponse
     */
    public function update(TeacherValidation $request, $id): JsonResponse
    {
        return response()->json(
            [
                'teacher' => $this->_teacher->update($request->all(), (int)$id),
            ], 200
        );
    }


    /**
     * delete the specified resource.
     *
     * @param  int $id The teacher id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        return response()->json([
            'is_deleted' => $this->_teacher->delete((int)$id),
        ], 200);
    }
}
