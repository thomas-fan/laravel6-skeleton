<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'username' => 'required|unique:admins|min:6|max:32',
                    'name' => 'required|min:1|max:32',
                    'password' => 'required|min:6|max:32|confirmed',
                ];
            case 'PATCH':
                return [
                    'name' => 'required|min:1|max:32',
                    'password' => 'required|min:6|max:32|confirmed',
                ];
        }

    }
}
