<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Employee;

class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'em_code',
        'name'
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

    public function test($input){

        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    }


    /**
     * Configure the Model
     **/
    public function model()
    {
        return Employee::class;
    }
}
