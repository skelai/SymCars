<?php

namespace App\Controller;

use App\Repository\DriverRepository;
use App\Repository\RentalRepository;
use App\Repository\VehicleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="public_index")
     */
    public function index(DriverRepository $driverRepository, VehicleRepository $vehicleRepository, RentalRepository $rentalRepository )
    {
        $drivers = $driverRepository->findAll();
        $vehicles = $vehicleRepository->findAll();
        $rentals = $rentalRepository->findAll();

        return $this->render('public/home.html.twig', [
            'drivers' => $drivers,
            'rentals' => $rentals,
            'vehicles' => $vehicles
        ]);
    }
}
