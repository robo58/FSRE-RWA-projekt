<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use App\User;
use App\Common;
use Gate;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $this->validate($request, array(
            'title'=>'required|max:255',
            'body'=>'required',
            'category_id'=>'required|numeric'
        ));
        //store in the database
        $post = new Post;
        
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id=$request->category_id;
        $post->user_id=Auth()->id();
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(330,186)->save(public_path('img/posts/'. $filename));
        
            $post->avatar = $filename;
        }
        $post->save();
        $post->tags()->sync($request->tags, false);
        //redirect to page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $user=User::find($post->user_id);
        return view('posts.show')->withPost($post)->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if (Gate::denies('manage-users')) {
            return redirect(route('posts.show', $post->id));
        } elseif ((Auth()->id()!=$post->user_id) && Gate::denies('edit-users')) {
            return redirect(route('posts.show', $post->id));
        } else {
            $categories = Category::all();
            $tags = Tag::all();
            return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'title'=>'required|max:255',
            'body'=>'required',
            'category_id'=>'required|numeric'
        ));
        
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category_id');
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(330,186)->save(public_path('img/posts/'. $filename));
        
            $post->avatar = $filename;
        }
        $post->save();
        $post->tags()->sync($request->tags, false);
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if (Gate::denies('manage-users')) {
            return redirect(route('posts.show', $post->id));
        } elseif ((Auth()->id()  != $post->user_id) && Gate::denies('edit-users')) {
            return redirect(route('posts.show', $post->id));
        } else {
            $post->tags()->detach();
            $post->delete();
            return redirect()->route('posts.index');
        }
    }
}