<?php

namespace App\Models;

use App\Events\BeforeLotteryGameUserSaved;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LotteryGameMatchUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'lottery_game_match_id',
    ];

    protected $dispatchesEvents = [
        'saving' => BeforeLotteryGameUserSaved::class,
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function lotteryGameMatch(): HasMany
    {
        return $this->hasMany(LotteryGameMatch::class, 'lottery_game_match_id');
    }
}
