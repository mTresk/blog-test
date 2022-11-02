<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    public function authorize(): bool
    {
        return auth()->check();
    }


    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:256'],
            'file' => ['required', 'image'],
            'content' => ['required', 'string'],
            'category_id' => ['required', 'integer'],
        ];
    }
}
