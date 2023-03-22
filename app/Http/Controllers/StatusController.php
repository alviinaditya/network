<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use Illuminate\Support\Facades\Auth;


class StatusController extends Controller
{
    public function store(StatusRequest $request)
    {
        $request->make($request->body);
        return redirect()->back();
    }
}
