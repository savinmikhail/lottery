<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LotteryGameController;
use App\Http\Controllers\LotteryGameMatchController;
use App\Http\Controllers\LotteryGameMatchUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Получение списка всех лотерейных игр
Route::get('/lottery_games', [LotteryGameController::class, 'showAll']);
//Получение списка всех матчей по id лотерейной игры
Route::get('/lottery_game_matches', [LotteryGameController::class, 'showById']);

Route::group(
    [
        'middleware' => 'guest',
    ],
    function () {
        //Создание пользователя
        Route::post('/users/register', [UserController::class, 'register']);
        //Авторизация. Получение jwt-токена авторизации
        Route::post('login', [AuthController::class, 'login']);
    }
);

Route::group(
    [
        'middleware' => 'jwt.auth',
    ],
    function () {
        //Редактирование пользователя
        Route::put('/users/{id}', [UserController::class, 'update']);
        //Удаление пользователя
        Route::delete('/users/{id}', [UserController::class, 'delete']);
        //Запись игрока на лотерейную игру
        Route::post('/lottery_game_match_users', [LotteryGameMatchUserController::class, 'signUpForAMatch']);

        Route::group(
            [
                'middleware' => 'isAdmin',
            ],
            function () {
                //Получение списка всех пользователей
                Route::get('/users', [UserController::class, 'getUsers']);
                //Создание матча лотерейной игры
                Route::post('/lottery_game_matches', [LotteryGameMatchController::class, 'createMatch']);
                //Завершение матча лотерейной игры
                Route::put('/lottery_game_matches', [LotteryGameMatchController::class, 'setAsFinished']);
            }
        );
    }
);

