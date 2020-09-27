<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request['sort'];
        if($sort=='name') {
            $users = User::all()->sortBy($sort);
        }
        else {
            $users = User::all()->sortByDesc($sort);
        }
        return view('user.index', [
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        return view('user.show', [
            'user' => User::findOrFail($id)
        ]);
    }  

    public function edit($id)
    {
        $this->authorize('update',User::findOrFail($id));
        
        return view('user.update', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update($id, Request $request)
    {
        $this->authorize('update',User::findOrFail($id));
        
        $attribute = request()->validate([
            'name' => 'string|required|max:100',
            'avatar' => 'file|nullable',
        ]);
        
        $user = User::findOrFail($id);
        $user->name = $attribute['name'];

        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/images/avatars/' . $filename));
            $user->avatar = $filename;
        }

        $user->save();

        return Redirect::route('user', array('id' => $user->id));
    }

}
