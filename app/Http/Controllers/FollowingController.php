<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowingController extends Controller
{
    public function following(User $user) {
        return view('users.following', [
            'following' => $user->follows,
            'user' => $user,
        ]);
    }

    public function follower() {

    }
}
