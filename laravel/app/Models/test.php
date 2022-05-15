<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class test
 * @package App\Models
 * @version May 11, 2022, 6:42 pm UTC
 *
 * @property integer $id
 * @property integer $test
 */
class test extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'test';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'test'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'test' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
