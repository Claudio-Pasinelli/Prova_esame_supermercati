<?php 

namespace App\Entity;

class Market{
    private $id;
    private $denominazione;
    private $indirizzo;
    private $tipologia;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getDenominazione()
    {
        return $this->denominazione;
    }

    public function setDenominazione($denominazione)
    {
        $this->denominazione = $denominazione;
    }
    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;
    }
    public function getTipologia()
    {
        return $this->tipologia;
    }

    public function setTipologia($tipologia)
    {
        $this->tipologia = $tipologia;
    }

}