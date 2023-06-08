<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Images;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ImagesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        // $faker=Factory::create();
        // for($i=1;$i<=100;$i++){
        //     $image=new Images();
        //     $image->setName($faker->image(null,640,480));
        //     $product=$this->getReference('prod-'.rand(1,10));
        //     $image->setProducts($product);
        //     $manager->persist($image);
        // }
        // $manager->flush();
        for($j=1;$j<=18;$j++){
            for($i=1;$i<=3;$i++){
                $image=new Images();
                $product=$this->getReference('prod-'.$j);
                $image->setName($product->getName(). $i . ".jpeg");
                $image->setProducts($product);
                $manager->persist($image);
            }
        }
        $manager->flush();
       
    }
    public function getDependencies():Array{
        return[
            ProductsFixtures::class
        ];
    }
}
