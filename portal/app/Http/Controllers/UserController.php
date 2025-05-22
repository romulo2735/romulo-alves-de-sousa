<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function __construct(public User $user)
    {
    }

    public function index(User $model)
    {
        return $model::query()->paginate();
    }

    public function store(UserRequest $request, User $model)
    {

    }

    public function update()
    {

    }
}
