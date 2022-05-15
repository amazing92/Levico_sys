<?php

namespace App\Repositories;

use App\Models\lab;
use App\Repositories\BaseRepository;

/**
 * Class labRepository
 * @package App\Repositories
 * @version May 11, 2022, 6:50 pm UTC
*/

class labRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'lab'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return lab::class;
    }
}
