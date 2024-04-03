<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectionAccessModelRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'collection_id' => ['required'],
            'model_type' => ['required'],
            'model_id' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
