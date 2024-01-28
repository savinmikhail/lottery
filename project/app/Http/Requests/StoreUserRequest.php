<?php

namespace App\Http\Requests;

use App\DTO\User\RegisterDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'unique:users',
            ],
            'password' => [
                'required',
                'min:4',
                'max:20',
            ]
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()
                ->json(
                    [
                        'message' => 'Validation errors',
                        'data' => [
                            'errors' => $validator->errors()
                        ]
                    ],
                    Response::HTTP_UNPROCESSABLE_ENTITY
                )
        );
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'email.unique' => 'The user with the specified email address is already registered'
        ];
    }

    public function toDTO(): RegisterDTO
    {
        $data = $this->validated();
        return new RegisterDTO(
            email: $data['email'],
            password: $data['password'],
        );
    }
}
