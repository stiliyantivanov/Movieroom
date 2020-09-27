<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;
use App\Actor;
use App\Tag;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $movies = Movie::where('is_movie',true)->get();
        $sort = $request['sort'];
        if($sort=='name') {
            $movies->sortBy($sort);
        }
        else {
            $movies->sortByDesc($sort);
        }
        return view('movie.index', [
            'movies' => $movies,
        ]);
    }

    public function show($id)
    {
        return view('movie.show', [
            'movie' => Movie::findOrFail($id)
        ]);
    }

    public function create()
    {
        $this->authorize('create');
        
        return view('movie.create', [
            'actors' => Actor::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function store(Request $request)
    {
        $this->authorize('create');
        
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'year_of_release' => 'required|int',
            'picture' => 'file|nullable',
            'resume' => 'nullable',
            'actors' => 'nullable',
            'tags' => 'nullable',
        ]);

        $movie = Movie::create([
            'name' => $attributes['name'],
            'year_of_release' => $attributes['year_of_release'],
            'resume' => $attributes['resume'],
            'is_movie' => true,
        ]);

        if($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(300,300)->save(public_path('/images/movies/' . $filename));
            $movie->picture = $filename;
        }

        foreach($attributes['actors'] as $actor)
        {
            $movie->actors()->toggle($actor);
        }

        foreach($attributes['tags'] as $tag)
        {
            $movie->tags()->toggle($tag);
        }

        $movie->save();

        return Redirect::route('movie', array('id' => $movie->id));
    }

    public function edit($id)
    {
        $this->authorize('update',Movie::findOrFail($id));
        
        return view('movie.update', [
            'movie' => Movie::findOrFail($id),
            'actors' => Actor::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function update($id, Request $request)
    {
        $this->authorize('update',Movie::findOrFail($id));
        
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'year_of_release' => 'required|int',
            'picture' => 'file|nullable',
            'resume' => 'nullable',
            'actors' => 'nullable',
            'tags' => 'nullable',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->name = $attributes['name'];
        $movie->year_of_release = $attributes['year_of_release'];
        $movie->resume = $attributes['resume'];

        if($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(300,300)->save(public_path('/images/movies/' . $filename));
            $movie->picture = $filename;
        }

        $movie->actors()->detach();
        $movie->tags()->detach();

        foreach($attributes['actors'] as $actor)
        {
            $movie->actors()->toggle($actor);
        }

        foreach($attributes['tags'] as $tag)
        {
            $movie->tags()->toggle($tag);
        }

        $movie->save();

        return Redirect::route('movie', array('id' => $movie->id));
    }
    
    public function destroy($id)
    {
        $this->authorize('delete',Movie::findOrFail($id));
        
        $movie = Movie::findOrFail($id);
        $movie->delete(); 

        return back();
    }
}
