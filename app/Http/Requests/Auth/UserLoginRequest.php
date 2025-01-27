<?php

// declare(strict_types= 1);

namespace App\Http\Requests\Auth;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        Log::info('Authorize method called');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        Log::info('Rules method called');
        return [
            "login" => "bail|required|string|min:6|max:1024",
            "password"=> "bail|required|string|min:6|max:32",
        ];
    }
}
