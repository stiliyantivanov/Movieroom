<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;

class ActorController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request['sort'];
        if($sort=='name') {
            $actors = Actor::all()->sortBy($sort);
        }
        else {
            $actors = Actor::all()->sortByDesc($sort);
        }
        return view('actor.index', [
            'actors' => $actors,
        ]);
    }

    public function show($id)
    {
        return view('actor.show', [
            'actor' => Actor::findOrFail($id)
        ]);
    }

    public function create()
    {
        $this->authorize('create');

        return view('actor.create');
    }
    
    public function store(Request $request)
    {
        $this->authorize('create');

        $attribute = request()->validate([
            'name' => 'string|required|max:100',
            'biography' => 'nullable',
            'picture' => 'file|nullable',
        ]);

        $actor = Actor::create([
            'name' => $attribute['name'],
            'biography' => $attribute['biography'],
        ]);

        if($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(300,300)->save(public_path('/images/actors/' . $filename));
            $actor->picture = $filename;
        }

        $actor->save();

        return Redirect::route('actor', array('id' => $actor->id));
    }

    public function edit($id)
    {
        $this->authorize('update',Actor::findOrFail($id));
        
        return view('actor.update', [
            'actor' => Actor::findOrFail($id)
        ]);
    }

    public function update($id, Request $request)
    {
        $this->authorize('update',Actor::findOrFail($id));
        
        $attribute = request()->validate([
            'name' => 'string|required|max:100',
            'biography' => 'nullable',
            'picture' => 'file|nullable',
        ]);

        $actor = Actor::findOrFail($id);
        $actor->name = $attribute['name'];
        $actor->biography = $attribute['biography'];

        if($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(300,300)->save(public_path('/images/actors/' . $filename));
            $actor->picture = $filename;
        }

        $actor->save();

        return Redirect::route('actor', array('id' => $actor->id));
    }

    public function destroy($id)
    {
        $this->authorize('delete',Actor::findOrFail($id));
        
        $actor = Actor::findOrFail($id);
        $actor->delete(); 

        return back();
    }
}
