<?php

    namespace App\Entity;

    class Prenotazione
    {
        private $codice;
        private $costo;
        private $annullata;
        private $idProdotto;
        private $idSupermercato;

        public function __construct($codice, $costo, $annullata, $idProdotto, $idSupermercato)
        {
            $this-> codice = $codice;
            $this-> costo = $costo;
            $this-> annullata = $annullata;
            $this-> idProdotto = $idProdotto;
            $this-> idSupermercato = $idSupermercato;
        }

        public function setCodice($x)
        {
            $this-> codice = $x;
        }
        public function getCodice()
        {
            return $this -> codice;
        }

        public function setCosto($x)
        {
            $this-> costo = $x;
        }
        public function getCosto()
        {
            return $this -> costo;
        }

        public function setAnnullata($x)
        {
            $this-> annullata = $x;
        }
        public function getAnnullata()
        {
            return $this -> annullata;
        }

        public function setIdProdotto($x)
        {
            $this-> idProdotto = $x;
        }
        public function getIdProdotto()
        {
            return $this -> idProdotto;
        }

        public function setIdSupermercato($x)
        {
            $this-> idSupermercato = $x;
        }
        public function getIdSupermercato()
        {
            return $this -> idSupermercato;
        }
    }

?>