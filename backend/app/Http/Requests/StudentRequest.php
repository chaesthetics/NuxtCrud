<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class StudentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|min:3",
            "course" => "required",
            "email" => "required|email",
            "phone" => "required|min:11|max:11",
        ];
    }

    public function messages()
    {
        return[
            "name.required" => "Fullname is required",
            "name.min" => "Please use your fullname",
            "course.required" => "Please fill up the course field",
            "email.required" => "Your email is required",
            "email.email" => "Please use a valid email",
            "phone.required" => "Please enter you phone number",
            "phone.min" => "Please use valid phone number",
            "phone.max" => "Please use valid phone number",
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ], 422)); // Use st
    }
}
