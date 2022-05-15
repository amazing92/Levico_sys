<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class lab
 * @package App\Models
 * @version May 11, 2022, 6:50 pm UTC
 *
 * @property integer $id
 * @property string $lab
 */
class lab extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'lab';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'lab'
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
        
    ];

    
}
