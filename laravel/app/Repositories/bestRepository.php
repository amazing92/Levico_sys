<?php

namespace App\Repositories;

use App\Models\best;
use App\Repositories\BaseRepository;

/**
 * Class bestRepository
 * @package App\Repositories
 * @version May 11, 2022, 7:14 pm UTC
*/

class bestRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'best'
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
        return best::class;
    }
}
