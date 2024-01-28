<?php

namespace App\Http\Requests;

use App\DTO\User\UpdateUserDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateUserRequest extends FormRequest
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
            'first_name' => [
                'nullable',
                'string',
            ],
            'last_name' => [
                'nullable',
                'string',
            ],
            'email' => [
                'nullable',
                'string',
                'email',
            ],
            'password' => [
                'nullable',
                'min:4',
                'max:20',
            ],
            'is_admin' => [
                'nullable',
                'bool',
            ]
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }

    public function toDTO(): UpdateUserDTO
    {
        $data = $this->validated();
        return new UpdateUserDTO(
            first_name: isset($data['first_name']) ? $data['first_name'] : null,
            last_name: isset($data['last_name']) ? $data['last_name'] : null,
            email: isset($data['email']) ? $data['email'] : null,
            password: isset($data['password']) ? $data['password'] : null,
            is_admin: isset($data['is_admin']) ? $data['is_admin'] : null,
        );
    }
}
