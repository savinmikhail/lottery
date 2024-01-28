<?php

namespace App\Models;

use App\Events\AfterUpdatedLotteryGameMatch;
use App\Events\BeforeUpdateLotteryGameMatch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class LotteryGameMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'start_date',
        'start_time',
        'winner_id',
        'is_finished'
    ];

    protected $dispatchesEvents = [
        'updating' => BeforeUpdateLotteryGameMatch::class,
        'updated' => AfterUpdatedLotteryGameMatch::class
    ];

    public function lotteryGame(): belongsTo
    {
        return $this->belongsTo(LotteryGame::class);
    }

    public function user(): hasMany
    {
        return $this->hasMany(User::class);
    }
}
