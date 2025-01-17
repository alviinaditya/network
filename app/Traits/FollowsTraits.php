<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\DB;

trait FollowsTraits
{
    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withTimestamps();
    }

    public function follow(User $user)
    {
        return $this->follows()->attach($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function hasFollow(User $user)
    {
        // return $this->follows()->where('following_user_id', $user->id)->exists();

        return DB::table('follows')
            ->whereUserId($this->id)
            ->whereFollowingUserId($user->id)
            ->count() > 0;
    }
}
