<?php


namespace App\Models;


use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class bds
 * @package App\Models
 * @version May 11, 2022, 7:25 pm UTC
 *
 * @property integer $id
 */
class Employee extends Model
{
    use SoftDeletes;


    public $table = 'employee';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'em_code',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];



}

