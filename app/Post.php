<?php

namespace App;

use App\Comment;
use App\User;
use App\Favorite;
use Illuminate\Support\Facades\Auth;
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
    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites', 'post_id', 'user_id')->withTimeStamps();
    }

    public function commentAvatar(Comment $comment)
    {
        $users=User::all();
        foreach ($users as $user) {
            if ($user->email===$comment->email) {
                return $user->avatar;
            } else {
                return 'default.png';
            }
        }
    }
    public function checkFavorite($id){
        $post=Post::find($id);
        $fav=$post->favorites;         
        $i=0;
        for($i=0;$i<count($fav);$i++){
            if($fav[$i]->id===Auth::user()->id){
                return true;
            }
        }
        return false;
    }
}
