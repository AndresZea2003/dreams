<?php

namespace App\Http\Controllers;

use App\DTO\UserData;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = UserData::collection(User::paginate(8))->toArray();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(User $user)
    {

    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->redirectToRoute('users.index');
    }
    public function toggle(User $user)
    {
        if (!$user->disabled_at) {
            $user->disabled_at = now();
        } else {
            $user->disabled_at = null;
        }

        $user->save();

        return response()->redirectToRoute('users.index');
    }
}
