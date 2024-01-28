<?php

namespace App\Http\Requests;

use App\DTO\LotteryGameMatch\FinishMatchDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FinishMatchRequest extends FormRequest
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
            'matchId' => [
                'bail',
                'required',
                'integer',
                'exists:lottery_game_matches,id',
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation errors',
            'data' => [
                'errors' => $validator->errors()
            ],
        ]));
    }

    public function toDTO(): FinishMatchDTO
    {
        $data = $this->validated();
        return new FinishMatchDTO(
            matchId: $data['matchId'],
        );
    }
}
