<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssignmentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => [
                'required',
            ],
            'description' => [
                'required',
            ],
            'student' => [
                'required',
            ],
            'course' => [
                'required',
            ],
        ];
    }
}
