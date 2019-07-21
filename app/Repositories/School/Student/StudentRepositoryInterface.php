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
 * The repository interface class for Student
 *
 * @category Repository
 * @package  School_Student
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
interface StudentRepositoryInterface
{
    /**
     * The function is to join the data and objects
     *
     * @param Student $student The Student model
     *
     * @return StudentRepository
     */
    public function with(Student $student);

    /**
     * The function is to get a student by id
     *
     * @param int $id The id to query the record
     *
     * @return Student|null
     */
    public function findOneById(int $id): ? Student;

    /**
     * The function is to get all student's records
     *
     * @return Collection Student collection
     */
    public function getAll(): Collection;

    /**
     * The function is to delete a student by id
     *
     * @return boolean
     */
    public function delete(): bool;
}
