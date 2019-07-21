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

use Log;
use App\Exceptions\SaveRecordException;
use App\Models\School\Student;
/**
 * The write for student object
 *
 * @category Write
 * @package  Student_School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class StudentWrite implements StudentWriteInterface
{
    /**
     * The student model
     * 
     * @var Student
     */
    private $_student;

    /**
     * The function is to bid the data
     *
     * @var array
     */
    private $_requestData;

    /**
     * The function is to bind the data
     *
     * @param Student $student     The student model
     * @param array   $requestData The data to insert
     * 
     * @return StudentWrite
     */
    public function with(Student $student, array $requestData): self
    {
        $this->_student = $student;
        $this->_requestData = $requestData;

        return $this;
    }

    /**
     * Create / update a student
     *
     * @return void
     */
    public function setMain(): void
    {
        try {
            $this->_student->first_name = isset($this->_requestData['first_name']) ? trim($this->_requestData['first_name']) : null;
            $this->_student->last_name = isset($this->_requestData['last_name']) ? trim($this->_requestData['last_name']) : null;
            $this->_student->gender = isset($this->_requestData['gender']) ? trim($this->_requestData['gender']) : null;
            $this->_student->tbl_class_room_id = isset($this->_requestData['class_room_id']) ? trim($this->_requestData['class_room_id']) : null;

            $this->_student->save();
        }
        catch (\Exception $e) {
            Log::error($e->getMessage() . " " . get_class($this) . " " . __METHOD__ . " " . __LINE__);

            throw new SaveRecordException('This record cannot be saved! ' . $e->getMessage()); //400
        }
    }



    /**
     * The function to get a student object
     *
     * @return Student The student model
     */
    public function getStudent(): Student
    {
        return $this->_student;
    }
}
