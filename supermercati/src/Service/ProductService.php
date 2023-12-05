<?php
namespace App\Service;

use App\Entity\Product;
use App\FunzioniDB\FunzioniDB;

class ProductService
{
    private $productService;

    // Costruttore che accetta un'istanza di FunzioniDB come dipendenza
    public function __construct(FunzioniDB $funzioniDBService)
    {
        $this->productService = $funzioniDBService;
    }

    // Metodo che ottiene i dati per la visualizzazione dei prodotti
    public function getData()
    {
        // Apre la connessione al database utilizzando il servizio FunzioniDB
        $connection = $this->productService->openConnection("supermercati");

        // Esegue la query per selezionare tutti i prodotti utilizzando il servizio FunzioniDB
        $arrayProducts = $this->productService->selectProduct($connection, false);
        
        // Parametri da restituire, contenenti l'array di prodotti
        $params = [
            'arrayProducts' => $arrayProducts,
        ];

        return $params;
    }
}
?>