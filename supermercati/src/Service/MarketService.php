<?php
namespace App\Service;

use App\Entity\Market;
use App\FunzioniDB\FunzioniDB;

class MarketService
{
    private $marketService;

    // Costruttore che accetta un'istanza di FunzioniDB come dipendenza
    public function __construct(FunzioniDB $funzioniDBService)
    {
        $this->marketService = $funzioniDBService;
    }

    // Metodo che ottiene i dati per la visualizzazione dei market
    public function getData()
    {
        // Apre la connessione al database utilizzando il servizio FunzioniDB
        $connection = $this->marketService->openConnection("NOMEDB");

        // Esegue la query per selezionare tutti i market utilizzando il servizio FunzioniDB
        $arrayMarkets = $this->marketService->selectMarket($connection, false);
        
        // Parametri da restituire, contenenti l'array di market
        $params = [
            'arrayMarkets' => $arrayMarkets,
        ];

        return $params;
    }
}
?>
