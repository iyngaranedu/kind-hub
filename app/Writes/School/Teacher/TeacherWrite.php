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

use Log;
use App\Exceptions\SaveRecordException;
use App\Models\School\Teacher;
/**
 * The write for teacher object
 *
 * @category Write
 * @package  Teacher_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class TeacherWrite implements TeacherWriteInterface
{
    /**
     * The teacher model
     * 
     * @var Teacher
     */
    private $_teacher;

    /**
     * The function is to bid the data
     *
     * @var array
     */
    private $_requestData;

    /**
     * The function is to bind the data
     *
     * @param Teacher $teacher     The teacher model
     * @param array   $requestData The data to insert
     * 
     * @return TeacherWrite
     */
    public function with(Teacher $teacher, array $requestData): self
    {
        $this->_teacher = $teacher;
        $this->_requestData = $requestData;

        return $this;
    }

    /**
     * Create / update a teacher
     *
     * @return void
     */
    public function setMain(): void
    {
        try {
            $this->_teacher->first_name = isset($this->_requestData['first_name']) ? trim($this->_requestData['first_name']) : null;
            $this->_teacher->last_name = isset($this->_requestData['last_name']) ? trim($this->_requestData['last_name']) : null;
            $this->_teacher->email = isset($this->_requestData['email']) ? trim($this->_requestData['email']) : null;
            $this->_teacher->telephone = isset($this->_requestData['telephone']) ? trim($this->_requestData['telephone']) : null;

            $this->_teacher->save();
        }
        catch (\Exception $e) {
            Log::error($e->getMessage() . " " . get_class($this) . " " . __METHOD__ . " " . __LINE__);

            throw new SaveRecordException('This record cannot be saved! ' . $e->getMessage()); //400
        }
    }



    /**
     * The function to get a teacher object
     *
     * @return Teacher The teacher model
     */
    public function getTeacher(): Teacher
    {
        return $this->_teacher;
    }
}
