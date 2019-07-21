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

namespace App\Repositories\School\Teacher;

use Illuminate\Database\Eloquent\Collection;
use App\Models\School\Teacher;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * The repository class for Teacher
 *
 * @category Repository
 * @package  Teacher_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class TeacherRepository implements TeacherRepositoryInterface
{
    /**
     * The model object
     *
     * @var Teacher
     */
    private $_model;

    /**
     * The function is to join the data and objects
     * 
     * @param Teacher $teacher The Teacher model
     * 
     * @return TeacherRepository
     */
    public function with(Teacher $teacher): self
    {
        $this->_model = $teacher;

        return $this;
    }

    /**
     * The function is to get a teacher by id
     * 
     * @param int $id The id to query the record
     *
     * @return Teacher|null
     */
    public function findOneById(int $id): ? Teacher
    {
        return $this->_model
            ->where('id', $id)
            ->first();
    }

    /**
     * The function is to get all teacher's records
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
     * The function is to delete a teacher by id
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
