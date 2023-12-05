<?php

    namespace App\FunzioniDB;

    class FunzioniDB
    {
        //funzione che apre la connessione col database
        public function openConnection($dbName = "supermercati")
        {
            $host = "127.0.0.1";
            $username = "root";
            $password = "G1gant3Bu3n0.";            
            $connessione = mysqli_connect($host, $username, $password, $dbName);
            
            if(false === $connessione)
            {    
                exit("Errore: impossibile stabilire una connessione" . mysqli_connect_error());
            }

            else
            {
                return $connessione;
            }
        }

        //FUNZIONI DI INSERIMENTO ENTITA' NEL DB--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

        public function inserisciCliente($connessione, $entity, $close = true)
        {
            $codiceFiscale = $entity->getCodiceFiscale();
            $nome = $entity->getNome();
            $cognome = $entity->getCognome();
            $email = $entity->getEmail();

            $sql = "INSERT INTO supermercati.clienti (codiceFiscale, nome, cognome, email) VALUES ('$codiceFiscale','$nome', '$cognome', '$email');";
            return FunzioniDB::eseguiSql($connessione, $sql, $close);
        }

        public function inserisciPrenotazione($connessione, $entity, $close = true)
        {
            $codice = $entity->getCodice();
            $costo = $entity->getCosto();
            $annullata = $entity->getAnnullata();
            $idProdotto = $entity->getIdProdotto();
            $idSupermercato = $entity->getIdSupermercato();

            $sql = "INSERT INTO supermercati.prenotazioni (codice, costo, annullata, idProdotto, idSupermercato) VALUES ('$codice','$costo', '$annullata', '$idProdotto', '$idSupermercato');";
            return FunzioniDB::eseguiSql($connessione, $sql, $close);
        }

        public function inserisciProdotto($connessione, $entity, $close = true)
        {
            $codice = $entity->getCodice();
            $descrizione = $entity->getDescrizione();
            $prezzo = $entity->getPrezzo();

            $sql = "INSERT INTO supermercati.prodotti (codice, descrizione, prezzo) VALUES ('$codice','$descrizione', '$prezzo');";
            return FunzioniDB::eseguiSql($connessione, $sql, $close);
        }

        public function inserisciMarket($connessione, $entity, $close = true)
        {
            $id = $entity->getId();
            $denominazione = $entity->getDenominazione();
            $indirizzo = $entity->getIdirizzo();
            $tipologia = $entity->getTipologia();

            $sql = "INSERT INTO supermercati.supermercati (id, denominazione, indirizzo, tipologia) VALUES ('$id','$denominazione', '$indirizzo', '$tipologia');";
            return FunzioniDB::eseguiSql($connessione, $sql, $close);
        }

        

        //FUNZIONI DI SELECT---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        

        //ritorna la lista di TUTTI i supermercati
        public function selectMarkets($connessione, $close = true)
        {
            $sql = "SELECT id, denominazione, indirizzo, tipologia
            FROM supermercati";

            return FunzioniDB::selectQuery($connessione, $sql, $close);

        }
        //ritorna UN supermercato specifico per ID
        public function selectMarket($connessione, $close = true, $id)
        {
            $sql = "SELECT id, denominazione, indirizzo, tipologia
            FROM supermercati
            WHERE id = '$id'";

            return FunzioniDB::selectQuery($connessione, $sql, $close);

        }
        
        //funzione che esegue una query, di dafault chiude la connessione e restituisce un booleano in base al risultato
        public function eseguiSql($connessione, $sql, $close = true)
        {
            $risultato = true;

            if(false === mysqli_query($connessione, $sql)) 
            {
                echo "Errore: impossibile eseguire la query." . mysqli_error($connessione);
                $risultato=false;
            }

            if($close)
            {
                echo "Query eseguita correttamente.";
                mysqli_close($connessione);
            }

            return $risultato;
        }

        //funzione che ritorna il risultato della select
        public function selectQuery($connessione, $sql, $close)
        {
            $result = mysqli_query($connessione, $sql);

            if($result === false)
            {
                exit ("Errore: impossibile eseguire la query." . mysqli_error($connessione));
            }
            
            $rows  = array();
            while($row = mysqli_fetch_array($result))
            {
                $rows[] = $row;
            }
            
            mysqli_free_result($result);
            
            if($close)
            {
                mysqli_close($connessione);
            }

            return $rows;
        }

        //funzione che esegue l'sql per l'update
        public function updateQuery($connessione, $sql, $close)
        {
            if(false === mysqli_query($connessione, $sql)) 
            {
                echo "Errore: impossibile eseguire la query." . mysqli_error($connessione);
                return false;
            }

            else
            {
                echo "Query eseguita correttamente.";
                if($close)
                {
                    mysqli_close($connessione);
                }

                //ritorna il numero di record modificati sulla connessione
                return mysqli_affected_rows($connessione);
            }
        }

        //funziona che crea la query per l'UPDATE di una specifica babysitter
        public function updatePrenotazione($connessione, $entity, $close = true)
        {
            $nome = $entity->getNome();
            $cognome = $entity->getCognome();
            $num_telefono = $entity->getNumTelefono();
            $orario = $entity->getOrario();
            $id = $entity->getId();

            $sql = "UPDATE prenotazione SET nome = '$nome', cognome = '$cognome', num_telefono = $num_telefono, orario = '$orario'
            WHERE id_prenotazione = $id";
            return FunzioniDb::updateQuery($connessione, $sql, $close);
        }

        //funzione che esegue l'sql per il DELETE
        public function deleteQuery($connessione, $sql, $close)
        {
            $risultato = true;

            if(false === mysqli_query($connessione, $sql)) 
            {
                echo "Errore: impossibile eseguire la query." . mysqli_error($connessione);
                return $risultato = false;
            }

            else
            {
                echo "Query eseguita correttamente.";
                if($close)
                {
                    mysqli_close($connessione);
                }

                //ritorna il numero di record modificati sulla connessione
                return mysqli_affected_rows($connessione);
            }
        }

        //funziona che crea la query per il DELETE di una determinata babysitter
        public function deleteBook($connessione, $id, $close = true)
        {
            $sql = "DELETE FROM prenotazione WHERE id_prenotazione = $id";

            return FunzioniDb::deleteQuery($connessione, $sql, $close);
        }

        //ritorna tutte le babysitter con l'id passato per parametro
        public function selectPrenotazioneById($connessione, $id, $close = true)
        {
            // $sql = "SELECT nome, cognome, dataDiNascita, provincia, citta FROM pers"one WHERE nome = '$nome'";
            $sql = "SELECT id_prenotazione, nome, cognome, num_telefono, orario
            FROM prenotazione
            WHERE id_prenotazione = $id";

            return FunzioniDb::selectQuery($connessione, $sql, $close);
        }
    }
    
?>