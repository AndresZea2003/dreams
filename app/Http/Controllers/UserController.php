<?php

namespace App\Http\Controllers;

use App\DTO\UserData;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = UserData::collection(User::paginate(7))->toArray();
        $links = User::paginate(7)->links();

        return view('users.index', compact('users', 'links'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return response()->redirectToRoute('users.index');
    }
    public function toggle(User $user): RedirectResponse
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
