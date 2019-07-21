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

use Log;
use App\Exceptions\SaveRecordException;
use App\Writes\School\ClassRoom\ClassRoomWriteInterface;
use App\Models\School\ClassRoom;
/**
 * The write for class object
 *
 * @category Write
 * @package  School_ClassRoom
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class ClassRoomWrite implements ClassRoomWriteInterface
{
    /**
     * The class room model
     * 
     * @var ClassRoom
     */
    private $_classRoom;

    /**
     * The function is to bid the data
     *
     * @var array
     */
    private $_requestData;

    /**
     * The function is to bind the data
     *
     * @param ClassRoom $classRoom   The class room model
     * @param array     $requestData The data to insert
     * 
     * @return ClassRoomWrite
     */
    public function with(ClassRoom $classRoom, array $requestData): self
    {
        $this->_classRoom = $classRoom;
        $this->_requestData = $requestData;

        return $this;
    }

    /**
     * Create / update a class room
     *
     * @return void
     */
    public function setMain(): void
    {
        try {
            $this->_classRoom->name = isset($this->_requestData['name']) ? trim($this->_requestData['name']) : null;

            $this->_classRoom->class_year = isset($this->_requestData['class_year']) ? trim($this->_requestData['class_year']) : null;

            $this->_classRoom->tbl_teacher_id = isset($this->_requestData['teacher_id']) ? trim($this->_requestData['teacher_id']) : null;


            $this->_classRoom->save();
        }
        catch (\Exception $e) {
            Log::error($e->getMessage() . " " . get_class($this) . " " . __METHOD__ . " " . __LINE__);

            throw new SaveRecordException('This record cannot be saved! ' . $e->getMessage()); //400
        }
    }



    /**
     * The function to get a class room object
     *
     * @return ClassRoom The class room model
     */
    public function getClassRoom(): ClassRoom
    {
        return $this->_classRoom;
    }
}
