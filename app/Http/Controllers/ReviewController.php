<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Review;
use App\Movie;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    public function create($movieId)
    {
        if (Auth::check()) {
        
            return view('review.create', [
                'movie' => Movie::findOrFail($movieId),
            ]);
        }
    }

    public function store($movieId)
    {
        if (Auth::check()) {
            $attributes = request()->validate([
                'body' => 'required',
            ]);
        

            $review = Review::create([
                'user_id' => auth()->user()->id,
                'movie_id' => $movieId,
                'body' => $attributes['body'],
            ]);

            if ($review->movie->is_movie) {
                return Redirect::route('movie', array('id' => $movieId));
            } else {
                return Redirect::route('series', array('id' => $movieId));
            }
        }
    }

    public function edit($id)
    {
        $this->authorize('update',Review::findOrFail($id));
        
        return view('review.update', [
            'review' => Review::findOrfail($id),
        ]);
    }

    public function update($id)
    {
        $this->authorize('update',Review::findOrFail($id));
        
        $attributes = request()->validate([
            'body' => 'required',
        ]);

        $review = Review::findOrFail($id);

        Review::where('id',$id)->update([
            'user_id' => $review->user->id,
            'movie_id' => $review->movie->id,
            'body' => $attributes['body'],
            
        ]);

        if($review->movie->is_movie)
        {
            return Redirect::route('movie', array('id' => $review->movie->id));
        }
        else
        {
            return Redirect::route('series', array('id' => $review->movie->id));
        }
    }
    
    public function destroy($id)
    {
        $this->authorize('delete',Review::findOrFail($id));
        
        $review = Review::findOrFail($id);
        $review->delete(); 

        return back();
    }
}
