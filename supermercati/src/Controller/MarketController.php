<?php
namespace App\Controller;
use App\Service\MarketService;

class MarketController{

private $marketService;

public function __contruct(MarketService $marketServiceInput){
    $this->marketService = $marketServiceInput;
}

public function getMarket()

}

?>