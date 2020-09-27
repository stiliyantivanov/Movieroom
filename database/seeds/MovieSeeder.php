<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use App\Movie;
use App\Actor;
use App\Tag;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = Movie::create([
            'name' => 'Game Of Thrones',
            'year_of_release' => 2011,
            'resume' => 'Game of Thrones is an American fantasy drama television series created by David Benioff and 
                        D. B. Weiss for HBO. It is an adaptation of A Song of Ice and Fire, George R. R. Martin\'s series 
                        of fantasy novels. Set on the fictional continents of Westeros and Essos, Game of Thrones has a 
                        large ensemble cast and follows several story arcs. One arc is about the Iron Throne of the Seven 
                        Kingdoms of Westeros and follows a web of alliances and conflicts among the noble dynasties, either 
                        vying to claim the throne or fighting for independence from it. Another focuses on the last descendant 
                        of the realm\'s deposed ruling dynasty, who has been exiled to Essos and is plotting a return to the 
                        throne. A third story arc follows the Night\'s Watch, a brotherhood defending the realm against the 
                        fierce peoples and legendary creatures of the North.',
            'picture' => 'game_of_thrones.jpg',
            'is_movie' => false,
        ]);

        $actor1 = Actor::where('name','Emilia Clarke')->first();

        DB::table('actor_movie')->insert([
            'actor_id' => $actor1->id,
            'movie_id' => $series->id,
        ]);

        $actor2 = Actor::where('name','Kit Harington')->first();

        DB::table('actor_movie')->insert([
            'actor_id' => $actor2->id,
            'movie_id' => $series->id,
        ]);

        $tag1 = Tag::where('name','Fantasy')->first();

        DB::table('movie_tag')->insert([
            'movie_id' => $series->id,
            'tag_id' => $tag1->id,
        ]);

        $movie = Movie::create([
            'name' => 'Solo: A Star Wars Story',
            'year_of_release' => 2018,
            'resume' => 'Solo: A Star Wars Story is an American space Western film based around the Star Wars character 
                        Han Solo, also featuring his original trilogy co-protagonists Chewbacca and Lando Calrissian. 
                        The film explores the early adventures of Han Solo and Chewbacca, who join a heist within the 
                        criminal underworld ten years prior to the events of Star Wars.',
            'is_movie' => true,
        ]);

        DB::table('actor_movie')->insert([
            'actor_id' => $actor1->id,
            'movie_id' => $movie->id,
        ]);

        $actor3 = Actor::where('name','Thandie Newton')->first();

        DB::table('actor_movie')->insert([
            'actor_id' => $actor3->id,
            'movie_id' => $movie->id,
        ]);

        $tag2 = Tag::where('name','Sci-fi')->first();

        DB::table('movie_tag')->insert([
            'movie_id' => $movie->id,
            'tag_id' => $tag2->id,
        ]);

        $series2 = Movie::create([
            'name' => 'Westworld',
            'year_of_release' => 2016,
            'resume' => 'Westworld is an American sci-fi western TV series, produced by HBO.',
            'is_movie' => false,
        ]);

        DB::table('actor_movie')->insert([
            'actor_id' => $actor3->id,
            'movie_id' => $series2->id,
        ]);

        DB::table('movie_tag')->insert([
            'movie_id' => $series2->id,
            'tag_id' => $tag2->id,
        ]);

        $tag3 = Tag::where('name','Western')->first();

        DB::table('movie_tag')->insert([
            'movie_id' => $series2->id,
            'tag_id' => $tag3->id,
        ]);
    }
}
