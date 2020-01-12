<?php

namespace App;
use App\Comment;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function commentAvatar(Comment $comment)
    {
        $users=User::all();
        foreach ($users as $user) {
            if ($user->email===$comment->email) {
                return $user->avatar;
            }else{
                return 'default.png';
            }
        }
    }
}
