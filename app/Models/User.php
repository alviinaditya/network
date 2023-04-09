<?php

namespace App\Models;

use App\Traits\FollowsTraits;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, FollowsTraits;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function gravatar($size = 100)
    {
        // return "https://api.dicebear.com/5.x/initials/svg?seed=" . $this->name . "&fontWeight=600&fontSize=40";
        // return "https://api.dicebear.com/5.x/identicon/svg?seed=" . md5(strtolower(trim($this->email))) . "&backgroundType=gradientLinear&backgroundColor=b6e3f4,d1d4f9,ffd5dc,ffdfbf,c0aede";
        $default = "wavatar";
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=" . urlencode($default) . "&s=" . $size . "&r=g";
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function makeStatus($string)
    {
        $this->statuses()->create([
            'body' => $string,
            'identifier' => Str::slug($this->id . Str::random(31)),
        ]);
    }

    public function timeline()
    {
        $following = $this->follows->pluck('id');
        return Status::whereIn('user_id', $following)
            ->orWhere('user_id', $this->id)
            ->latest()
            ->simplePaginate(10);
    }
}
