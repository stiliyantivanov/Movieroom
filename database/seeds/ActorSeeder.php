<?php

use Illuminate\Database\Seeder;

use App\Actor;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Actor::create([
            'name' => 'Emilia Clarke',
            'biography' => 'Emilia Clarke is an English actress. Clarke said she 
                            became interested in acting at the age of three. Her 
                            television debut came with a guest appearance in an 
                            episode of the British medical soap opera Doctors in 
                            2009. The following year, she was named as one of the 
                            "UK Stars of Tomorrow" by Screen International magazine 
                            for her role in the Syfy film Triassic Attack (2010). 
                            Her film roles include Sarah Connor in the science fiction 
                            film Terminator Genisys (2015) and Qi\'ra in the Star Wars 
                            film Solo: A Star Wars Story (2018). Time magazine named 
                            her one of the 100 most influential people in the world 
                            in 2019.',
            'picture' => 'emilia_clarke.jpg',
        ]);

        Actor::create([
            'name' => 'Thandie Newton',
            'biography' => 'Thandie Newton is an English actress. She is the daughter 
                            of a Zimbabwean princess and an Englishman. Newton is known 
                            for her starring roles, such as the title character in Beloved 
                            (1998), Nyah Nordoff-Hall in Mission: Impossible 2 (2000), 
                            Christine in Crash (2004), for which she received a BAFTA Award 
                            for Best Actress in a Supporting Role, Linda in The Pursuit of 
                            Happyness (2006), Stella in RockNRolla (2008), Condoleezza Rice 
                            in W. (2008), Laura Wilson in 2012 (2009), and Val in Solo: 
                            A Star Wars Story (2018). Since 2016, Newton has played the sentient 
                            android, the madam Maeve Millay, in the HBO science fiction-western 
                            series Westworld, for which she earned a Primetime Emmy Award for 
                            Outstanding Supporting Actress in a Drama Series and two Critics 
                            Choice Awards, as well as Golden Globe Award, Saturn Award, and 
                            Screen Actors Guild Award nominations.',
            'picture' => 'thandie_newton.jpg',
        ]);

        Actor::create([
            'name' => 'Kit Harington',
            'biography' => 'Kit Harington is an English actor and producer. Harington studied at 
                            the Royal Central School of Speech & Drama. While still at drama school, 
                            he made his professional acting debut with the lead role of Albert 
                            Narracott in the critically acclaimed West End play War Horse at the 
                            National Theatre. In 2011, Harington rose to prominence for his breakthrough 
                            role as Jon Snow in the HBO fantasy television series Game of Thrones (2011–2019), 
                            which brought him international recognition and several accolades, including 
                            a Golden Globe nomination for Best Actor – Television Series Drama and two 
                            Primetime Emmy Award nominations for Outstanding Supporting Actor in a Drama 
                            Series in 2016 and Outstanding Lead Actor in a Drama Series in 2019. Harington 
                            developed, produced and starred in the BBC drama series Gunpowder (2017). 
                            His film roles include the historical romance film Pompeii (2014) and the 
                            British period drama Testament of Youth (2014). He also provided the voice of 
                            Eret in the How to Train Your Dragon franchise.',
            'picture' => 'kit_harington.jpg',
        ]);

        Actor::create([
            'name' => 'Harrison Ford',
            'biography' => 'Harrison Ford is an American actor.'
        ]);
    }
}
