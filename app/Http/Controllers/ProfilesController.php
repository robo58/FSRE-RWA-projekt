<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Role;
use Gate;
use App\User;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class ProfilesController extends Controller
{
    use UploadTrait;

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
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profiles.profile')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profiles.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'first_name'=>'required|max:255|string',
            'last_name'=>'required|string|max:255',
            'username'=>'required|string|max:255',
            'email'=>'required|string',
        ));
        
        
        $user = User::find($id);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        
        if ($request->has('avatar')) {
            $image = $request->file('avatar');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = 'public/img/users/';
            $filePath = $folder . $name. '.' . $image->GetClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $user->avatar=$filePath;
        }

        $user->save();

        return redirect()->route('profiles.show', $user)->withUser($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
