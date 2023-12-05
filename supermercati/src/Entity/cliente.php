<?php

    namespace App\Entity;

    class Cliente
    {
        private $codiceFiscale;
        private $nome;
        private $cognome;
        private $email;

        public function __construct($codiceFiscale, $nome, $cognome, $email)
        {
            $this-> codiceFiscale = $codiceFiscale;
            $this-> nome = $nome;
            $this-> cognome = $cognome;
            $this-> email = $email;
        }

        public function setCodiceFiscale($x)
        {
            $this-> codiceFiscale = $x;
        }
        public function getCodiceFiscale()
        {
            return $this -> codiceFiscale;
        }

        public function setNome($x)
        {
            $this-> nome = $x;
        }
        public function getNome()
        {
            return $this -> nome;
        }

        public function setCognome($x)
        {
            $this-> cognome = $x;
        }
        public function getCognome()
        {
            return $this -> cognome;
        }
        
        public function setEmail($x)
        {
            $this-> email = $x;
        }
        public function getEmail()
        {
            return $this -> email;
        }
    }

?>