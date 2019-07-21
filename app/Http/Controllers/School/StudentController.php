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
use App\Services\School\Student\StudentServiceInterface;
use App\Requests\School\StudentValidation;
/**
 * The controller class for student
 *
 * @category Controller
 * @package  Student_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class StudentController extends Controller
{
    /**
     * The student service interface
     *
     * @var App\Services\School\Student\StudentServiceInterfacee
     */
    private $_student;

    /**
     * StudentController constructor.
     *
     * @param StudentServiceInterface $student The student service interface
     */
    public function __construct(StudentServiceInterface $student)
    {
        $this->_student = $student;
    }

    /**
     * Get all students
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(
            [
                'students' => $this->_student->getAll(),
            ], 200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id The student id
     * @return \Illuminate\Http\Response
     */
    public function show($id): JsonResponse
    {
        return response()->json([
            'student' => $this->_student->findOneById((int)$id),
        ], 200);
    }


    /**
     * Create a new Student
     *
     * @param StudentValidation $request The student validation object
     *
     * @group Student
     *
     * @bodyParam first_name string required first_name of the new student
     * @bodyParam last_name string required the last_name of the student
     * @bodyParam email string required the email of the student
     * @bodyParam telephone string the telephone of the student
     *
     * @return JsonResponse
     */
    public function store(StudentValidation $request): JsonResponse
    {
        return response()->json(
            [
            'student' => $this->_student->create($request->all()),
            ], 200
        );
    }

    /**
     * Update a Student
     *
     * @param StudentValidation $request The student validation object
     *
     * @group Student
     *
     * @bodyParam first_name string required first_name of the new student
     * @bodyParam last_name string required the last_name of the student
     * @bodyParam email string required the email of the student
     * @bodyParam telephone string the telephone of the student
     *
     * @return JsonResponse
     */
    public function update(StudentValidation $request, $id): JsonResponse
    {
        return response()->json(
            [
                'student' => $this->_student->update($request->all(), (int)$id),
            ], 200
        );
    }


    /**
     * delete the specified resource.
     *
     * @param  int $id The student id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): JsonResponse
    {
        return response()->json([
            'is_deleted' => $this->_student->delete((int)$id),
        ], 200);
    }
}
