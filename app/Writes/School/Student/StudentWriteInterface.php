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

namespace App\Writes\School\Student;

use App\Models\School\Student;
/**
 * The write interface for student write
 *
 * @category Write
 * @package  Student_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
interface StudentWriteInterface
{
    /**
     * The function is to bind the data
     *
     * @param Student $student     The student model
     * @param array   $requestData The data to insert
     *
     * @return StudentWrite
     */
    public function with(Student $student, array $requestData);

    /**
     * Create / update a student
     *
     * @return void
     */
    public function setMain(): void;

    /**
     * The function to get a student object
     *
     * @return Student The student model
     */
    public function getStudent(): Student;
}
