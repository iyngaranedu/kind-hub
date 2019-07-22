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
namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
/**
 * The model class for student object
 *
 * @category Model
 * @package  School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class Student extends Model
{

    const RESULTS_PER_PAGE = 20;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_students';

    /**
     * The mass-assignment fields
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'gender',
        'tbl_class_room_id'
    ];

    /**
     * The primary key
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The relationship with class room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classroom()
    {
        return $this->belongsTo('App\Models\School\ClassRoom', 'tbl_class_room_id');
    }
}
