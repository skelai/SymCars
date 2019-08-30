<?php

namespace App\Controller;

use App\Entity\Rental;
use App\Form\RentalType;
use App\Repository\RentalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RentalController
 * @package App\Controller
 *
 * @Route("/rental")
 */
class RentalController extends AbstractController
{
    /**
     * @Route("/", name="rental_index")
     */
    public function index(RentalRepository $rentalRepository )
    {
        return $this->render('rental/index.html.twig', [
            'rentals' => $rentalRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="rental_create", methods={"POST", "GET"})
     */
    public function create(Request $request)
    {
        $rental = new Rental();

        $form = $this->createForm(RentalType::class, $rental);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rental);
            $entityManager->flush();

            return $this->redirectToRoute('rental_index');
        }
        return $this->render('rental/create.html.twig', [
            'form' => $form->createView(),
            'rental' => $rental,
        ]);
    }

}
