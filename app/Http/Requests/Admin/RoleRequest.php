<?php

namespace App\Http\Requests\Admin;

use App\Enums\GuardTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()) {
            case 'POST':
                return [
                    'name' => 'string|required',
                    'description' => 'string|required',
                    'guard_name' => [
                        'required',
                        'string',
                        Rule::in(GuardTypes::types()),
                    ],
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'string',
                    'description' => 'string|required',
                    'guard_name' => [
                        'string',
                        Rule::in(GuardTypes::types()),
                    ],
                ];
                break;
        }
    }
}
