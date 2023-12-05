<?php
namespace App\Controller;

use App\Service\MarketService;
use App\Service\ProductService;

class MarketController
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