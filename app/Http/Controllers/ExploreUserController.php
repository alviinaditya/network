<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreUserController extends Controller
{
    public function __invoke()
    {
        return view('users.index', [
            'users' => User::with('follows')
                ->where('id', '!=', Auth::user()->id)
                ->simplePaginate(30),
        ]);
    }
}
