<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use App\Entity\Image;
use App\Entity\Category;
use App\Entity\Property;

use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private $peb = ['a','b','c','d','e','f','g'];
    private $kitchen = ['équipée','semi-équipée','non-équipée'];
    private $roles = ['agency'];
    private $states = ['louer','vendre'];

    public function __construct(private UserPasswordHasherInterface $hasher)
    {
        
    }
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $categories = [];
        $users = [];
        $admin = new User();
        $admin->setEmail("wetterene.remy@gmail.com")
             ->setRoles(["admin"])
             ->setPassword($this->hasher->hashPassword($admin,"admin"));
             $manager->persist($admin);
        for ($u = 0; $u <= 10; $u++)
        {
            $user = new User();
            $user->setEmail($faker->email())
            ->setPassword($this->hasher->hashPassword($user,'password'))
            ->setRoles($this->roles ?? $u % 2 );
            $manager->persist($user);
            $users[] = $user;
        }
        for($c = 0; $c <= 10; $c++ ) 
        {
            $category = new Category();
            $category->setDescription($faker->text(rand(40,200)))
                     ->setTitle($faker->text(rand(10,25)));
                     $manager->persist($category);
            $categories[] = $category;
        }
        for ($i=0; $i <= 10; $i++)
        {
            $property = new Property();
            $property->setBathroom(rand(1,3))
                     ->setTitle($faker->text(rand(10,15)))
                     ->setBedroom(rand(1,3))
                     ->setBuildingCondition($faker->text(rand(5,10)))
                     ->setCategory($faker->randomElement($categories))
                     ->setDescription($faker->text(rand(80,100)))
                     ->setEnergyClass($this->peb[rand(0,count($this->peb) - 1)])
                     ->setFloor(rand(0,4))
                     ->setKitchenType($this->kitchen[rand(0,count($this->kitchen) -1 )])
                     ->setLivingArea(rand(0,2))
                     ->setState($faker->randomElement($this->states))
                     ->setNumberClass(md5(uniqid()))
                     ->setAdress($faker->streetAddress())
                     ->setZipCode($faker->postcode())
                     ->setCity($faker->city())
                     ->setUser($faker->randomElement($users))
                     ->setPrice($this->decimalRand());
                     $manager->persist($property);
            for ($m = 0; $m <= rand(1,4);$m++)
            {
                $image = new Image();
                $image->setPath($faker->imageUrl());
                $image->setProperty($property);
                $manager->persist($image);
            }
                    }
                    $manager->flush();
                }
                private function decimalRand() : string
                {
                   $number = floatval(rand(800,1000000));
                   
                    return $number;
                }
}
