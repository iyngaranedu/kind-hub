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
use App\Models\School\ClassRoom;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * The repository interface class for class room
 *
 * @category Repository
 * @package  School_ClassRoom
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
interface ClassRoomRepositoryInterface
{
    /**
     * The function is to join the data and objects
     *
     * @param ClassRoom $classRoom The ClassRoom model
     *
     * @return ClassRoomRepository
     */
    public function with(ClassRoom $classRoom);

    /**
     * The function is to get a class room by id
     *
     * @param int $id The id to query the record
     *
     * @return ClassRoom|null
     */
    public function findOneById(int $id): ? ClassRoom;

    /**
     * The function is to get all classroom's records
     *
     * @return Collection ClassRoom collection
     */
    public function getAll(): Collection;

    /**
     * The function is to delete a classroom by id
     *
     * @return boolean
     */
    public function delete(): bool;
}
