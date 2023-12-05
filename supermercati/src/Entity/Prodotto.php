<?php
namespace App\Entity;

class Prodotto {
    private $codice;
    private $descrizione;
    private $prezzo;

	public function getCodice() {
		return $this->codice;
	}

	public function setCodice($codice): self {
		$this->codice = $codice;
		return $this;
	}
	
	
	public function getDescrizione() {
		return $this->descrizione;
	}
	public function setDescrizione($descrizione): self {
		$this->descrizione = $descrizione;
		return $this;
	}
	
	public function getPrezzo() {
		return $this->prezzo;
	}
	public function setPrezzo($prezzo): self {
		$this->prezzo = $prezzo;
		return $this;
	}
}
?>