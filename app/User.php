<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $appends = ['profileLink',"fans"];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //发布的文章
    public function posts()
    {
        return $this->hasMany(Post::class,'user_id', 'id');
    }
    //关注者
    public function following()
    {
        return $this->belongsToMany(User::class,"followers","user_id","follower_id")->withTimestamps();
    }

    // 验证是不是自己
    public function isNot($user)
    {
        return $this->id !== $user->id;
    }
    // 是否已经关注某用户
    public function isFollowing($user)
    {
        return (bool) $this->following->where('id', $user->id)->count();
    }

    public function canFollow($user)
    {
        if(!$this->isNot($user))
        {
            return false;
        }
        return !$this->isFollowing($user);
    }

    public function canUnFollow($user)
    {
        return $this->isFollowing($user);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function getProfileLinkAttribute()
    {
        return route('user.show', $this);
    }

    public function getFansAttribute()
    {
        return $this->following()->count();
    }
}
