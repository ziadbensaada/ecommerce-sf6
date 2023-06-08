<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoriesFixtures extends Fixture
{
    private $counter=1;
    public function load(ObjectManager $manager): void
    {
        $parent=$this->createCategories('Informatique',null,$manager);
        $this->createCategories('Hardware',$parent,$manager);
        $this->createCategories('Software',$parent,$manager);
        $this->createCategories('Networks and Telecommunications',$parent,$manager);
        $this->createCategories('Cybersecurity',$parent,$manager);
        $this->createCategories('Web Development',$parent,$manager);
        $this->createCategories('Artificial Intelligence and Machine Learning',$parent,$manager);
        $parent=$this->createCategories('Gender',null,$manager);
        $this->createCategories('Male',$parent,$manager);
        $this->createCategories('Female',$parent,$manager);
        $this->createCategories('Child',$parent,$manager);
        $manager->flush();
    }
    public function createCategories(string $name,Categories $parent=null,ObjectManager $manager){
        $category=new Categories();
        $category->setName($name);
        $category->setSlug($category->getName());
        $category->setParent($parent);
        $category->setCategoriesorder($this->counter);
        $this->addReference('cat-'.$this->counter,$category);
        $this->counter++;
        $manager->persist($category);
        return $category;
    }
}
