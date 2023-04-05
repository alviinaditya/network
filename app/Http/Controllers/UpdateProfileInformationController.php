<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfileInformationController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['string', 'min:3', 'max:191', 'required'],
            'email' => ['email', 'min:3', 'max:191', 'required'],
            'username' => ['required', 'alpha_num', 'unique:users,username,' . Auth::user()->id],
        ]);
        /** @var \App\Models\User $user*/
        $user = Auth::user();
        $user->update($data);

        return redirect()
            ->route('profile', Auth::user()->username)
            ->with('message', 'Your profile has been updated!');
    }
}
