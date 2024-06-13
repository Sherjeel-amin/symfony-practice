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
      $movie->setTitle('The Shawshank Redemption');
      $movie->setReleaseYear(2008);
      $movie->setDescription("Hello Hello");

      $movie->addActor($this->getReference('actor1'));
      $movie->addActor($this->getReference('actor2'));
    
      $manager->persist($movie);

      $movie2 = new Movie();
      $movie2->setTitle('The Averngers Endgame');
      $movie2->setReleaseYear(2008);
      $movie2->setDescription("Hello Hello Thanos");

      $movie2->addActor($this->getReference('actor3'));
      $movie2->addActor($this->getReference('actor4'));

      $manager->persist($movie2);

      $manager->flush();
      
    }
}
