<?php
namespace App\Service;

use App\Entity\Prenotazione;
use App\FunzioniDB\FunzioniDB;

class PrenotationService
{
    private $prenotationService;

    // Costruttore che accetta un'istanza di FunzioniDB come dipendenza
    public function __construct(FunzioniDB $funzioniDBService)
    {
        $this->prenotationService = $funzioniDBService;
    }

    // Metodo che ottiene i dati per la visualizzazione dei prenotation
    public function getData()
    {
        // Apre la connessione al database utilizzando il servizio FunzioniDB
        $connection = $this->prenotationService->openConnection("NOMEDB");

        // Esegue la query per selezionare tutte le prenotazioni utilizzando il servizio FunzioniDB
        $arrayPrenotazioni = $this->prenotationService->selectPrenotation($connection, false);
        
        // Parametri da restituire, contenenti l'array di prenotazioni
        $params = [
            'arrayPrenotazioni' => $arrayPrenotazioni,
        ];

        return $params;
    }
}
?>