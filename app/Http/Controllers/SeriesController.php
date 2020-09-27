<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Movie;
use App\Actor;
use App\Tag;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Redirect;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Movie::where('is_movie',false)->get();
        $sort = $request['sort'];
        if($sort=='name') {
            $series->sortBy($sort);
        }
        else {
            $series->sortByDesc($sort);
        }
        return view('series.index', [
            'series' => $series,
        ]);
    }

    public function show($id)
    {
        return view('series.show', [
            'series' => Movie::findOrFail($id)
        ]);
    }

    public function create()
    {
        $this->authorize('create');
        
        return view('series.create', [
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

        $series = Movie::create([
            'name' => $attributes['name'],
            'year_of_release' => $attributes['year_of_release'],
            'resume' => $attributes['resume'],
            'is_movie' => false,
        ]);

        if($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(300,300)->save(public_path('/images/series/' . $filename));
            $series->picture = $filename;
        }

        foreach($attributes['actors'] as $actor)
        {
            $series->actors()->toggle($actor);
        }

        foreach($attributes['tags'] as $tag)
        {
            $series->tags()->toggle($tag);
        }

        $series->save();

        return Redirect::route('single_series', array('id' => $series->id));
    }

    public function edit($id)
    {
        $this->authorize('update',Movie::findOrFail($id));
        
        return view('series.update', [
            'series' => Movie::findOrFail($id),
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

        $series = Movie::findOrFail($id);
        $series->name = $attributes['name'];
        $series->year_of_release = $attributes['year_of_release'];
        $series->resume = $attributes['resume'];

        if($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            Image::make($picture)->resize(300,300)->save(public_path('/images/series/' . $filename));
            $series->picture = $filename;
        }

        $series->actors()->detach();
        $series->tags()->detach();

        foreach($attributes['actors'] as $actor)
        {
            $series->actors()->toggle($actor);
        }

        foreach($attributes['tags'] as $tag)
        {
            $series->tags()->toggle($tag);
        }

        $series->save();

        return Redirect::route('single_series', array('id' => $series->id));
    }
    
    public function destroy($id)
    {
        $this->authorize('delete',Movie::findOrFail($id));
        
        $series = Movie::findOrFail($id);
        $series->delete(); 

        return back();
    }
}
