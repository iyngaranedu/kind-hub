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

use App\Models\School\ClassRoom;
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * The service interface class for class room service
 *
 * @category Service
 * @package  School_ClassRoom
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
interface ClassRoomServiceInterface
{
    /**
     * The function is to create a class room
     *
     * @param array $requestData The data to insert
     *
     * @return ClassRoom The teacher model
     */
    public function create(array $requestData): ClassRoom;

    /**
     * The function is to update a class room details
     *
     * @param array $requestData The data to update
     * @param int   $id          The record id
     *
     * @return ClassRoom The class room model
     *
     * @throws NotFoundException The exception object
     */
    public function update(array $requestData, int $id): ClassRoom;

    /**
     * The function is to get all the class rooms
     *
     * @return Collection The collection of class rooms
     */
    public function getAll(): Collection;

    /**
     * The function is to get a class room
     *
     * @param int $id The class room id
     *
     * @return ClassRoom The class room model
     */
    public function findOneById(int $id): ClassRoom;

    /**
     * The function is to delete a class room
     *
     * @param int $id The class room id
     *
     * @return boolean
     */
    public function delete(int $id):bool;
}
