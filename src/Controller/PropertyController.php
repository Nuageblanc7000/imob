<?php

namespace App\Controller;

use App\Entity\Property;
use App\Form\PropertyType;
use App\Repository\PropertyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/property')]
class PropertyController extends AbstractController
{

    #[Route(path:'/show/{id}',name:'show_prop')]
    public function all(Property $property){
        return $this->render('/property/show.html.twig',['property' => $property]);
    }

    #[Route(path:"/{id}/edit",name:'edit_prop')]
    public function edit(Property $property, Request $req, EntityManagerInterface $manager)
    {
        $form = $this->createForm(PropertyType::class,$property);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($property);
            $manager->flush();
            return $this->redirectToRoute('show_prop',['id' => $property->getId()]);
        }
        return $this->renderForm('/property/edit.html.twig',['form'=> $form]);
    }
}   