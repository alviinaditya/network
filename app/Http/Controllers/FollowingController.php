<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowingController extends Controller
{
    public function __invoke(User $user, $follows){
        if($follows !== "following" && $follows !== "followers") {
            return redirect(route('profile', $user->username));
        }

        return view('users.follows', [
            'user' => $user,
            'follows' => $follows == "following" ? $user->follows : $user->followers,
        ]);

    }
}
