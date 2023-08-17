<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class BackupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'dbdriver' => ['required'],
            'dbhost' => ['required'],
            'dbname' => ['required', 'string'],
            'dbfolder' => ['required', 'string'],
            'dbuser' => ['required', 'string'],
            'dbpass' => ['nullable', 'sometimes', 'string'],
        ];
    }
}
