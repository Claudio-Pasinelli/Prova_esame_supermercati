<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Market;
use App\Service\MarketService;

class MainPageController extends AbstractController
{
    private $mainPageControllerService;

    // Costruttore che accetta un'istanza di BookService come dipendenza
    public function __construct(MarketService $mainPageControllerServiceInput)
    {
        $this->mainPageControllerService = $mainPageControllerServiceInput;
    }

    // Metodo per ottenere e visualizzare tutti i market
    public function getHome()
    {
        // Utilizza il servizio MarketService per ottenere i dati dei market
        $marketsData = $this->mainPageControllerService->getData();

        // Renderizza la vista 'homepage.html.twig' passando i dati ottenuti dal servizio
        return $this->render('homepage.html.twig', $marketsData);
    }
}
?>