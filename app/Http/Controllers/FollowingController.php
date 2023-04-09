<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function index(User $user, $follows)
    {
        if ($follows !== "following" && $follows !== "followers") {
            return redirect(route('profile', $user->username));
        }

        return view('users.follows', [
            'user' => $user,
            'follows' => $follows == "following" ? $user->follows : $user->followers,
        ]);
    }

    public function store(Request $request, User $user)
    {
        /** @var \App\Models\User $authUser*/
        $authUser = Auth::user();

        if ($authUser->hasFollow($user)) {
            $authUser->unfollow($user);
            $message = "You are successfully unfollow this user";
        } else {
            $authUser->follow($user);
            $message = "You are successfully follow this user";
        }
        return back()->with('message', $message);
    }
}
