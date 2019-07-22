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

use App\Models\School\Student;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * The service interface class for student service
 *
 * @category Service
 * @package  Student_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
interface StudentServiceInterface
{
    /**
     * The function is to create a student
     *
     * @param array $requestData The data to insert
     *
     * @return Student The student model
     */
    public function create(array $requestData): Student;

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
    public function update(array $requestData, int $id): Student;

    /**
     * The function is to search the student
     *
     * @return Collection The collection of student
     */
    public function getAll(int $page = 1): LengthAwarePaginator;

    /**
     * The function is to get a student
     *
     * @param int $id The student id
     *
     * @return Student The student model
     */
    public function findOneById(int $id): Student;

    /**
     * The function is to delete a student
     *
     * @param int $id The student id
     *
     * @return boolean
     */
    public function delete(int $id):bool;
}
