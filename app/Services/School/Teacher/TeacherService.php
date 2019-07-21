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

namespace App\Services\School\Teacher;

use App\Exceptions\NotFoundException;
use App\Models\School\Teacher;
use App\Writes\School\Teacher\TeacherWriteInterface;
use App\Repositories\School\Teacher\TeacherRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * The service class for teacher object
 *
 * @category Service
 * @package  Teacher_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class TeacherService implements TeacherServiceInterface
{
    /**
     * The writer interface
     *
     * @var TeacherWriteInterface
     */
    private $_teacher;

    /**
     * The repository interface
     *
     * @var TeacherRepositoryInterface
     */
    private $_teacherRepository;

    /**
     * TeacherService constructor.
     *
     * @param TeacherWriteInterface      $teacher           The teacher writer interface
     * @param TeacherRepositoryInterface $teacherRepository The teacher repository interface
     */
    public function __construct(TeacherWriteInterface $teacher, TeacherRepositoryInterface $teacherRepository)
    {
        $this->_teacher = $teacher;
        $this->_teacherRepository = $teacherRepository;
    }

    /**
     * The function is to create a teacher
     *
     * @param array $requestData The data to insert
     *
     * @return Teacher The teacher model
     */
    public function create(array $requestData): Teacher
    {
        $create = $this->_teacher->with(new Teacher, $requestData);
        $create->setMain();

        return $create->getTeacher();
    }

    /**
     * The function is to update a teacher details
     *
     * @param array $requestData The data to update
     * @param int   $id          The record id
     *
     * @return Teacher The teacher model
     * 
     * @throws NotFoundException The exception object
     */
    public function update(array $requestData, int $id): Teacher
    {
        $teacher = $this->_teacherRepository->with(new Teacher)->findOneById($id);

        if ($teacher) {
            $update = $this->_teacher->with($teacher, $requestData);
            $update->setMain();

            return $update->getTeacher();
        }

        throw new NotFoundException('Teacher Not Found!');
    }

    /**
     * The function is to search the teacher
     *
     * @return Collection The collection of teacher
     */
    public function getAll(): Collection
    {
        return $this->_teacherRepository->with(new Teacher)->getAll();
    }

    /**
     * The function is to get a teacher
     *
     * @param int $id The teacher id
     *
     * @return Teacher The teacher model
     *
     * @throws NotFoundException The exception object
     */
    public function findOneById(int $id): Teacher
    {
        $teacher = $this->_teacherRepository->with(new Teacher)->findOneById($id);
        if($teacher) {
            return $teacher;
        }
        throw new NotFoundException('This teacher could not be found');
    }

    /**
     * The function is to delete a teacher
     *
     * @param int $id The teacher id
     *
     * @return boolean
     *
     * @throws NotFoundException The exception object
     */
    public function delete(int $id): bool
    {
        $teacher = $this->_teacherRepository->with(new Teacher)->findOneById($id);
        if($teacher) {
            return $this->_teacherRepository->with($teacher)->delete();
        }
        throw new NotFoundException('This teacher could not be found');
    }
}
