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

namespace App\Repositories\School\ClassRoom;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\School\ClassRoom\ClassRoomRepositoryInterface;
use App\Models\School\ClassRoom;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * The repository class for ClassRoom
 *
 * @category Repository
 * @package  School_ClassRoom
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class ClassRoomRepository implements ClassRoomRepositoryInterface
{
    /**
     * The model object
     *
     * @var ClassRoom
     */
    private $_model;

    /**
     * The function is to join the data and objects
     * 
     * @param ClassRoom $classRoom The ClassRoom model
     * 
     * @return ClassRoomRepository
     */
    public function with(ClassRoom $classRoom): self
    {
        $this->_model = $classRoom;

        return $this;
    }

    /**
     * The function is to get a class room by id
     * 
     * @param int $id The id to query the record
     *
     * @return ClassRoom|null
     */
    public function findOneById(int $id): ? ClassRoom
    {
        return $this->_model
            ->where('id', $id)
            ->first();
    }

    /**
     * The function is to get all classroom's records
     *
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->_model
            ->orderBy('name', 'asc')
            ->get();
    }

    /**
     * The function is to delete a class room by id
     *
     * @param int $id The id to delete the record
     *
     * @return boolean
     */
    public function delete():bool
    {
        return $this->_model->delete();
    }

}
