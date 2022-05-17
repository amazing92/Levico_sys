<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\API\EmployeeRequest;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;
use Response;


class EmployeeController extends AppBaseController
{
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository){
        $this->employeeRepository  = $employeeRepository;
    }

    public function index(){

    }

    public function create(EmployeeRequest $request): JsonResponse
    {
        if($request->validated()){

            $input = $request->all();
            try{
                $employee = $this->employeeRepository->create($input);
                return $this->sendSuccess($employee->toArray(), Lang::get('employee.create.success'));
            }catch (Exception $e){
                return $this->sendError($input, Lang::get('employee.create.fail'));
//                echo $e->errorMessage();
            }

        }else{
            return  $this->sendError($request->failedValidation());
        }

    }

    public function update(EmployeeRequest $request): JsonResponse
    {
        if($request->validated()){

            $input = $request->all();
            try{
                $employee = $this->employeeRepository->upadte($input);
                return $this->sendSuccess($employee->toArray(), Lang::get('employee.update.success'));
            }catch (Exception $e){
                return $this->sendError($input, Lang::get('employee.update.fail'));
//                echo $e->errorMessage();
            }

        }else{
            return  $this->sendError($request->failedValidation());
        }
    }

    public function delete(){

    }

}
