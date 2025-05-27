<?php

namespace App\Http\Controllers;

use App\Enums\UserType;
use App\Filters\UserFilter;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class   UserController extends Controller
{
    public function __construct(public User $user)
    {
    }

    /**
     * @param User $model
     * @return LengthAwarePaginator
     */
    public function index(User $model, Request $request): LengthAwarePaginator
    {
        $filter = new USerFilter(
            name: $request->input('name'),
            type: $request->filled('type') ? UserType::from($request->input('type')) : null,
        );

        return $model::query()->filter($filter)->paginate(20);
    }


    /**
     * @param $id
     * @param User $model
     * @return UserResource
     */
    public function show($id, User $model): UserResource
    {
        return new UserResource(
            $model::query()->findOrFail($id)
        );
    }

    /**
     * @param StoreUserRequest $request
     * @param User $model
     * @return JsonResponse
     */
    public function store(StoreUserRequest $request, User $model): JsonResponse
    {
        $model->query()->create($request->validated());

        return response()->json([
            'message' => 'User created successfully'
        ], 200);
    }

    /**
     * @param User $model
     * @param UpdateUserRequest $request
     * @return JsonResponse
     */
    public function update(User $model, UpdateUserRequest $request): JsonResponse
    {
        $model->update($request->validated());

        return response()->json([], 204);
    }

    /**
     * @param User $model
     * @return JsonResponse
     */
    public function destroy(User $model): JsonResponse
    {
        $model->query()->delete();

        return response()->json(['message' => 'user has been deleted.'], 204);
    }
}
