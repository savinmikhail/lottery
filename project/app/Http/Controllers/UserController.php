<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function __construct(private readonly UserService $userService)
    {
    }

    public function register(StoreUserRequest $request): JsonResponse
    {
        return $this->userService->register($request->toDTO())->response();
    }

    public function getUsers(): JsonResponse
    {
        return $this->userService->getUsers()->response();
    }

    public function update(UpdateUserRequest $request, int $id): JsonResponse
    {
        return $this->userService->update($request->toDTO(), $id)->response();
    }

    public function delete(int $id): JsonResponse
    {
        return $this->userService->delete($id)->response();
    }
}
