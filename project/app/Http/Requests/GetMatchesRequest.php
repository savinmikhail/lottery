<?php

namespace App\Http\Requests;

use App\DTO\LotteryGame\GetMatchesDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GetMatchesRequest extends FormRequest
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
            'lottery_game_id' => [
                'bail',
                'required',
                'integer',
                'exists:lottery_games,id',
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

    public function toDTO(): GetMatchesDTO
    {
        $data = $this->validated();
        return new GetMatchesDTO(
            lottery_game_id: $data['lottery_game_id'],
        );
    }
}
