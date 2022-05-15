<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class best
 * @package App\Models
 * @version May 11, 2022, 7:14 pm UTC
 *
 * @property integer $id
 * @property string $best
 */
class best extends Model
{
    use SoftDeletes;


    public $table = 'best';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'best'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'best' => 'best'
    ];

    
}
