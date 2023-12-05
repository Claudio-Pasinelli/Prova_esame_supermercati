<?php
namespace App\Controller;

use App\Service\PrenotationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MarketController extends AbstractController
{
    private $prenotationService;

    public function __contruct(PrenotationService $prenotationServiceInput)
    {
        $this->prenotationService = $prenotationServiceInput;
    }

    public function getPrenotation()
    {
        return $this->render('market.html.twig', $this->prenotationService->getData());
    }

}

?>