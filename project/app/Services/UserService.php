<?php

namespace App\Services;

use App\DTO\User\RegisterDTO;
use App\DTO\User\UpdateUserDTO;
use App\Http\Resources\User\UnauthorizedResource;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserDeleteResource;
use App\Http\Resources\User\UserRegisterResource;
use App\Http\Resources\User\UserUpdateResource;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

final readonly class UserService
{
    public function register(RegisterDTO $dto): UserRegisterResource
    {
        $user = User::query()->create([
            'email' => $dto->email,
            'password' => bcrypt($dto->password)
        ]);

        return new UserRegisterResource($user);
    }

    public function update(UpdateUserDTO $dto, int $id): UserUpdateResource|UnauthorizedResource
    {
        $user = auth()->user();

        if (!Gate::allows('update', $id)) {
            return new UnauthorizedResource([]);
        }

        $user->update([
            'first_name' => $dto->first_name ?? $user->first_name,
            'last_name' => $dto->last_name ?? $user->last_name,
            'email' => $dto->email ?? $user->email,
            'is_admin' => $dto->is_admin ?? $user->is_admin,
            'password' => $dto->password ? bcrypt($dto->password) : $user->password,
        ]);

        return new UserUpdateResource($user);
    }

    public function delete(int $id): UserDeleteResource|UnauthorizedResource
    {
        if (!Gate::allows('delete', $id)) {
            return new UnauthorizedResource([]);
        }
        User::query()->where('id', $id)->delete();

        return new UserDeleteResource(['userId' => $id]);
    }

    public function getUsers()/*: UserCollection*/
    {
        $users = User::with('lotteryGameMatch')->get();
        return new UserCollection($users);
    }
}