<?php
namespace App\Controller;

use App\Service\ProductService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MarketController extends AbstractController
{

    private $productService;

    public function __contruct(ProductService $productServiceInput)
    {
        $this->productService = $productServiceInput;
    }

    public function getMarket()
    {
        return $this->render('market.html.twig', $this->productService->getData());
    }

}

?>