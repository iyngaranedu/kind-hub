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

use App\Models\School\Teacher;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * The service interface class for teacher service
 *
 * @category Service
 * @package  Teacher_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
interface TeacherServiceInterface
{
    /**
     * The function is to create a teacher
     *
     * @param array $requestData The data to insert
     *
     * @return Teacher The teacher model
     */
    public function create(array $requestData): Teacher;

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
    public function update(array $requestData, int $id): Teacher;

    /**
     * The function is to search the teacher
     *
     * @return Collection The collection of teacher
     */
    public function getAll(): Collection;

    /**
     * The function is to get a teacher
     *
     * @param int $id The teacher id
     *
     * @return Teacher The teacher model
     */
    public function findOneById(int $id): Teacher;

    /**
     * The function is to delete a teacher
     *
     * @param int $id The teacher id
     *
     * @return boolean
     */
    public function delete(int $id):bool;
}
