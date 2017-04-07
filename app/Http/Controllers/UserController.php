<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function paginate()
    {
        $users = User::orderBy('name', 'ASC')
            ->paginate(request('limit', 20));

        if (request()->all()) {
            $users->appends(request()->all());
        }

        return response()->json($users);
    }

    public function show($id)
    {
        $user = User::whereId($id)->first();
        if (empty($user)) {
            return response()->json([
                'message' => 'User not found.',
            ], 404);
        }

        return response()->json($user);
    }

    public function count()
    {
        return response()->json([
            'total' => User::count(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required|max:100',
            'email' => 'required|email|unique:users,email',
        ]);

        return response()->json([
            'status' => true,
        ]);
    }
}
