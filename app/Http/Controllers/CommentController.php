<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Common;
use Gate;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
  
        $this->validate($request, array(
        'name'=>'required|max:255',
        'email'=>'required|email|max:255',
        'comment'=>'required|min:5|max:2000'
       ));

        $post=Post::find($post_id);
        $comment=new Comment();

        $comment->name=$request->name;
        $comment->email=$request->email;
        $comment->comment=$request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);
        $comment->save();

        return redirect()->route('posts.show', $post)->withPost($post)->withComment($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment=Comment::find($id);
        if(Gate::denies('delete-users')||(Auth()->email()!=$comment->email)){
            return redirect()->route('posts.show', $comment->post_id);
        }
        $post=Post::find($comment->post_id);
        return view('comments.edit')->withComment($comment)->withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment=Comment::find($id);
        $this->validate($request, array('comment'=>'required|max:2000'));
        $comment->comment=$request->comment;
        $comment->save();
        return redirect()->route('comments.edit', $id)->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment=Comment::find($id);
        $post=Post::find($comment->post_id);
        if(Gate::denies('delete-users')||(Auth()->email()!=$comment->email)){
            return redirect()->route('posts.show', $comment->post_id);
        }
        $comment->delete();
        return redirect()->route('posts.show',$post)->withPost($post);
    }
}
