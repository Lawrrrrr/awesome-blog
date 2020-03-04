<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'first_name', 'last_name', 'avatar', 'email', 'password',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function followers()
    {
        // Getting all followers of this user
        return $this->belongsToMany('App\User', 'relationships',
        'followed_id', 'follower_id')->withTimestamps();
    }

    public function followedUsers()
    {
        // Getting all the users followed by this current user
        return $this->belongsToMany('App\User', 'relationships',
        'follower_id', 'followed_id')->withTimestamps();
    }

    public function isFollowing($followed_id)
    {
        return $this->followedUsers()->where('followed_id', $followed_id)->exists();
    }

}
