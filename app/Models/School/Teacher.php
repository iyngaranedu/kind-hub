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
 * The model class for teacher object
 *
 * @category Model
 * @package  School
 * @author   Iyathurai Iyngaran <dev@iyngaran.info>
 * @link     https://github.com/iyngaran/kindhub
 */
class Teacher extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_teachers';

    /**
     * The mass-assignment fields
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'telephone'
    ];

    /**
     * The primary key
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
