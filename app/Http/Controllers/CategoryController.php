<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Role;
use Gate;
use App\User;
use App\Post;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        if (Gate::denies('manage-users')) {
            return redirect(URL('/'));
        }
        return view('categories.index')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories=Category::all();
        if (Gate::denies('delete-users')) {
            return view('categories.index')->withCategories($categories);
        }
        $this->validate($request, array(
            'name'=>'required|max:255'
        ));
        $category = new Category;
        $category->name=$request->name;
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(330,186)->save(public_path('img/categories/'. $filename));
        
            $category->avatar = $filename;
        }
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category=Category::find($category->id);
        $posts=Post::all()->where('category_id',$category->id);
        return view('categories.show')->withCategory($category)->withPosts($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (Gate::denies('delete-users')) {
            return redirect(route('categories.index'));
        }
        $category->delete();
        return redirect(route('categories.index'));
    }
}
