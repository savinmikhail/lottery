<?php

namespace App\Http\Requests;

use App\DTO\LotteryGameMatch\CreateMatchDTO;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreLotteryGameMatchRequest extends FormRequest
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
            'gameId' => [
                'required',
                'int',
                'exists:lottery_games,id'
            ],
            'startDate' => [
                'required',
                'date',
                'date_format:Y-m-d',
                'after_or_equal:' . Carbon::now()->format('Y-m-d'),
            ],
            'startTime' => [
                'required',
                'date_format:H:i:s',
            ],
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()
            ->json(
                [
                    'message' => 'Validation errors',
                    'data' => [
                        'errors' => $validator->errors()
                    ],
                ]
            )
        );
    }

    public function messages(): array
    {
        return [
            'game_id.required' => 'GameId is required',
            'date.required' => 'Date is required',
            'time.required' => 'Time is required',
        ];
    }

    public function toDTO(): CreateMatchDTO
    {
        return new CreateMatchDTO(
            gameId: $this->gameId,
            startTime: $this->startTime,
            startDate: $this->startDate,
        );
    }
}
