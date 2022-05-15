<?php

namespace App\Repositories;

use App\Models\bds;
use App\Repositories\BaseRepository;

/**
 * Class bdsRepository
 * @package App\Repositories
 * @version May 11, 2022, 7:25 pm UTC
*/

class bdsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'bds'
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
        return bds::class;
    }
}
