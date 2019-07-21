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

namespace App\Writes\School\Teacher;

use App\Models\School\Teacher;
/**
 * The write interface for teacher write
 *
 * @category Write
 * @package  Teacher_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
interface TeacherWriteInterface
{
    /**
     * The function is to bind the data
     *
     * @param Teacher $teacher     The teacher model
     * @param array   $requestData The data to insert
     *
     * @return TeacherWrite
     */
    public function with(Teacher $teacher, array $requestData);

    /**
     * Create / update a teacher
     *
     * @return void
     */
    public function setMain(): void;

    /**
     * The function to get a teacher object
     *
     * @return Teacher The teacher model
     */
    public function getTeacher(): Teacher;
}
