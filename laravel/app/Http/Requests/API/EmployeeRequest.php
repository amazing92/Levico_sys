<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Lang as Lang;
use Illuminate\Contracts\Validation\Validator;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE': {
                return [];
            }
            case 'POST': {
                return [
                    'name' => 'required|min:6',
                    'em_code' => 'required|min:6',
                ];
            }
            case 'PUT': {
                return [
                    'id'=>'require',
                    'name' => 'required|min:6',
                    'em_code' => 'required|min:6',
                ];
            };
            case 'PATCH':
            default:
                break;
        }

    }

    public function messages(){
        return [
            'name.required' => Lang::get('employee.validate.username_require'),
            'name.min' => Lang::get('employee.validate.username_min'),
            'em_code.required' => Lang::get('employee.validate.em_code_require'),
            'em_code.min' => Lang::get('employee.validate.em_code_min'),
            'id.require' => Lang::get('employee.validate.id'),
        ];
    }

    public function attributes()
    {

        return [
            'name' => trans('employee.validate.username'),
            'em_code' => trans('employee.validate.em_code'),
        ];
    }

    protected function failedValidation(Validator $validator) {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
