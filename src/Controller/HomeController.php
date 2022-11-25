<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use DateTime;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(PropertyRepository $propertyRepository): Response
    {
        $date = date('Y-m-d');
        $timestamp = strtotime($date. "-2 days");
        $date = $date = date('Y-m-d',$timestamp);
        $dat = new DateTime($date);
   

        // dd($dat->format('Y-m-d'));
    
        return $this->render('home/home.html.twig', [
            'properties' => $propertyRepository->findByCreateAt($dat->format('Y-m-d')),
        ]);
    }
}
