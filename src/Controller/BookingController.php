<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    /**
     * @Route("/booking", name="app_booking")
     */
    public function index(Request $request): Response
    {
        $booking = new Booking();
        $form = $this->createForm(BookingType::class, $booking);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($booking);
            $entityManager->flush();

            
            //return new Response ('<h1>reservation avec succés</h1>');
        }

        return $this->render('booking.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}