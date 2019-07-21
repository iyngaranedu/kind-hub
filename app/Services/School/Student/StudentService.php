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
declare(strict_types = 1);

namespace App\Services\School\Student;

use App\Exceptions\NotFoundException;
use App\Models\School\Student;
use App\Writes\School\Student\StudentWriteInterface;
use App\Repositories\School\Student\StudentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * The service class for student object
 *
 * @category Service
 * @package  Student_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class StudentService implements StudentServiceInterface
{
    /**
     * The writer interface
     *
     * @var StudentWriteInterface
     */
    private $_student;

    /**
     * The repository interface
     *
     * @var StudentRepositoryInterface
     */
    private $_studentRepository;

    /**
     * StudentService constructor.
     *
     * @param StudentWriteInterface      $student           The student writer interface
     * @param StudentRepositoryInterface $studentRepository The student repository interface
     */
    public function __construct(StudentWriteInterface $student, StudentRepositoryInterface $studentRepository)
    {
        $this->_student = $student;
        $this->_studentRepository = $studentRepository;
    }

    /**
     * The function is to create a student
     *
     * @param array $requestData The data to insert
     *
     * @return Student The student model
     */
    public function create(array $requestData): Student
    {
        $create = $this->_student->with(new Student, $requestData);
        $create->setMain();

        return $create->getStudent();
    }

    /**
     * The function is to update a student details
     *
     * @param array $requestData The data to update
     * @param int   $id          The record id
     *
     * @return Student The student model
     * 
     * @throws NotFoundException The exception object
     */
    public function update(array $requestData, int $id): Student
    {
        $student = $this->_studentRepository->with(new Student)->findOneById($id);

        if ($student) {
            $update = $this->_student->with($student, $requestData);
            $update->setMain();

            return $update->getStudent();
        }

        throw new NotFoundException('Student Not Found!');
    }

    /**
     * The function is to search the student
     *
     * @return Collection The collection of student
     */
    public function getAll(): Collection
    {
        return $this->_studentRepository->with(new Student)->getAll();
    }

    /**
     * The function is to get a student
     *
     * @param int $id The student id
     *
     * @return Student The student model
     *
     * @throws NotFoundException The exception object
     */
    public function findOneById(int $id): Student
    {
        $student = $this->_studentRepository->with(new Student)->findOneById($id);
        if($student) {
            return $student;
        }
        throw new NotFoundException('This student could not be found');
    }

    /**
     * The function is to delete a student
     *
     * @param int $id The student id
     *
     * @return boolean
     *
     * @throws NotFoundException The exception object
     */
    public function delete(int $id): bool
    {
        $student = $this->_studentRepository->with(new Student)->findOneById($id);
        if($student) {
            return $this->_studentRepository->with($student)->delete();
        }
        throw new NotFoundException('This student could not be found');
    }
}
