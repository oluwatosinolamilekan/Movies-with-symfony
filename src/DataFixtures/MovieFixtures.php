<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Dark Title');
        $movie->setRealeaseYear(2008);
        $movie->setDescription('This is is dark knight');
        $movie->setImagePath('https://www.google.com/imgres?imgurl=https%3A%2F%2Fwallpaperaccess.com%2=4QMygDegUIARDoAQ');

        #Add data to pivot table...
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));

        $manager->persist($movie);

        $movieTwo = new Movie();
        $movieTwo->setTitle('Iron Man');
        $movieTwo->setRealeaseYear(2019);
        $movieTwo->setDescription('This is is dark knight');
        $movieTwo->setImagePath('https://www.google.com/imgres?imgurl=https%3A%2F%2Fstatic.wikia.nocookie.net%2Fmarvelcinematicuniverse%2Fimages%2F3%2F35%2FIronMan-EndgameProfile.jpg%2Frevision%2Flatest%3Fcb%3D20190423175213&imgrefurl=https%3A%2F%2');
        $manager->persist($movieTwo);

        $movieTwo->addActor($this->getReference('actor_3'));
        $movieTwo->addActor($this->getReference('actor_4'));

        $manager->flush();
    }
}