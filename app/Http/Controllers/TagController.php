<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request['sort'];
        if($sort=='name') {
            $tags = Tag::all()->sortBy($sort);
        } 
        else {
            $tags = Tag::all()->sortByDesc($sort);
        }
        return view('tag.index', [
            'tags' => $tags,
        ]);
    }

    public function show($id)
    {
        return view('tag.show', [
            'tag' => Tag::findOrFail($id)
        ]);
    }
    
    public function store()
    {
        //$this->authorize('create', App\Tag::class);
        
        $attribute = request()->validate([
            'name' => 'required|max:50',
        ]);

        Tag::create([
            'name' => $attribute['name'],
        ]);

        return back();
    }

    public function destroy($id)
    {
        $this->authorize('delete',Tag::findOrFail($id));

        $tag = Tag::findOrFail($id);
        $tag->delete(); 
        
        return back();
    }
}
