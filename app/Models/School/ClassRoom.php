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
 * The model class for class room object
 *
 * @category Model
 * @package  School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class ClassRoom extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_class_rooms';

    /**
     * The mass-assignment fields
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'class_year',
        'tbl_teacher_id'
    ];

    /**
     * The primary key
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The relationship with teacher
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher()
    {
        return $this->belongsTo('App\Models\School\Teacher', 'tbl_teacher_id');
    }
}
