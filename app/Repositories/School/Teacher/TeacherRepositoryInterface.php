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
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\School\Teacher;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * The repository interface class for Teacher
 *
 * @category Repository
 * @package  Teacher_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
interface TeacherRepositoryInterface
{
    /**
     * The function is to join the data and objects
     *
     * @param Teacher $teacher The Teacher model
     *
     * @return TeacherRepository
     */
    public function with(Teacher $teacher);

    /**
     * The function is to get a teacher by id
     *
     * @param int $id The id to query the record
     *
     * @return Teacher|null
     */
    public function findOneById(int $id): ? Teacher;

    /**
     * The function is to get all teacher's records
     *
     * @return Collection Teacher collection
     */
    public function getAll(): Collection;

    /**
     * The function is to delete a teacher by id
     *
     * @return boolean
     */
    public function delete(): bool;
}
