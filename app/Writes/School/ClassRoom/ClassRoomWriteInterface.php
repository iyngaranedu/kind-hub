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

namespace App\Writes\School\ClassRoom;

use App\Models\School\ClassRoom;
/**
 * The write interface for class room write
 *
 * @category Write
 * @package  School_ClassRoom
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
interface ClassRoomWriteInterface
{
    /**
     * The function is to bind the data
     *
     * @param ClassRoom $classRoom   The class room model
     * @param array     $requestData The data to insert
     *
     * @return ClassRoomWrite
     */
    public function with(ClassRoom $classRoom, array $requestData);

    /**
     * Create / update a class room
     *
     * @return void
     */
    public function setMain(): void;

    /**
     * The function to get a class room object
     *
     * @return ClassRoom The class room model
     */
    public function getClassRoom(): ClassRoom;
}
