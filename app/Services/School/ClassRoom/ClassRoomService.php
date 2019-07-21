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

namespace App\Services\School\ClassRoom;

use App\Exceptions\NotFoundException;
use App\Models\School\ClassRoom;
use App\Writes\School\ClassRoom\ClassRoomWriteInterface;
use App\Repositories\School\ClassRoom\ClassRoomRepositoryInterface;
use App\Services\School\ClassRoom\ClassRoomServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * The service class for class room object
 *
 * @category Service
 * @package  School_ClassRoom
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class ClassRoomService implements ClassRoomServiceInterface
{
    /**
     * The writer interface
     *
     * @var ClassRoomWriteInterface
     */
    private $_classRoom;

    /**
     * The repository interface
     *
     * @var ClassRoomRepositoryInterface
     */
    private $_classRoomRepository;

    /**
     * ClassRoomService constructor.
     *
     * @param ClassRoomWriteInterface      $classRoom           The class room writer interface
     * @param ClassRoomRepositoryInterface $classRoomRepository The class room repository interface
     */
    public function __construct(ClassRoomWriteInterface $classRoom, ClassRoomRepositoryInterface $classRoomRepository)
    {
        $this->_classRoom = $classRoom;
        $this->_classRoomRepository = $classRoomRepository;
    }

    /**
     * The function is to create a class room
     *
     * @param array $requestData The data to insert
     *
     * @return ClassRoom The classRoom model
     */
    public function create(array $requestData): ClassRoom
    {
        $create = $this->_classRoom->with(new ClassRoom, $requestData);
        $create->setMain();

        return $create->getClassRoom();
    }

    /**
     * The function is to update a class room details
     *
     * @param array $requestData The data to update
     * @param int   $id          The record id
     *
     * @return ClassRoom The classRoom model
     * 
     * @throws NotFoundException The exception object
     */
    public function update(array $requestData, int $id): ClassRoom
    {
        $classRoom = $this->_classRoomRepository->with(new ClassRoom)->findOneById($id);

        if ($classRoom) {
            $update = $this->_classRoom->with($classRoom, $requestData);
            $update->setMain();

            return $update->getClassRoom();
        }

        throw new NotFoundException('ClassRoom Not Found!');
    }

    /**
     * The function is to aet all the class rooms
     *
     * @return Collection The collection of class rooms
     */
    public function getAll(): Collection
    {
        return $this->_classRoomRepository->with(new ClassRoom)->getAll();
    }

    /**
     * The function is to get a class room
     *
     * @param int $id The class room id
     *
     * @return ClassRoom The ClassRoom model
     *
     * @throws NotFoundException The exception object
     */
    public function findOneById(int $id): ClassRoom
    {
        $classRoom = $this->_classRoomRepository->with(new ClassRoom)->findOneById($id);
        if ($classRoom) {
            return $classRoom;
        }
        throw new NotFoundException('This class room could not be found');
    }

    /**
     * The function is to delete a class room
     *
     * @param int $id The class room id
     *
     * @return boolean
     *
     * @throws NotFoundException The exception object
     */
    public function delete(int $id): bool
    {
        $classRoom = $this->_classRoomRepository->with(new ClassRoom)->findOneById($id);
        if ($classRoom) {
            return $this->_classRoomRepository->with($classRoom)->delete();
        }
        throw new NotFoundException('This class room could not be found');
    }
}
