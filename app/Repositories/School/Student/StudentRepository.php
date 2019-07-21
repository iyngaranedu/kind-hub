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

namespace App\Repositories\School\Student;

use Illuminate\Database\Eloquent\Collection;
use App\Models\School\Student;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * The repository class for Student
 *
 * @category Repository
 * @package  Student_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class StudentRepository implements StudentRepositoryInterface
{
    /**
     * The model object
     *
     * @var Student
     */
    private $_model;

    /**
     * The function is to join the data and objects
     * 
     * @param Student $student The Student model
     * 
     * @return StudentRepository
     */
    public function with(Student $student): self
    {
        $this->_model = $student;

        return $this;
    }

    /**
     * The function is to get a student by id
     * 
     * @param int $id The id to query the record
     *
     * @return Student|null
     */
    public function findOneById(int $id): ? Student
    {
        return $this->_model
            ->where('id', $id)
            ->first();
    }

    /**
     * The function is to get all student's records
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->_model
            ->orderBy('first_name', 'asc')
            ->get();
    }


    /**
     * The function is to delete a student by id
     *
     * @param int $id The id to delete the record
     *
     * @return boolean
     */
    public function delete():bool
    {
        return $this->_model->delete();
    }

}
