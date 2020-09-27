<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Review;
use App\User;
use App\Movie;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::findOrFail(1);

        $movie = Movie::where('name','Solo: A Star Wars Story')->first();
        
        $review = Review::create([
            'body' => 'The movie was great. We finally got a glimpse at the backstory of Han Solo.',
            'user_id' => $user->id,
            'movie_id' => $movie->id,
        ]); 
    }
}
