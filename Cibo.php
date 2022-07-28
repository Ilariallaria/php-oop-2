<?php

require_once __DIR__ . '/Products.php';

class Cibo extends Products {

    public $composizione_animale;

    public $ready_to_use;

    public $peso;

    public function __construct($_tipo_animale, $_prezzo, $_nome_prodotto, $_peso) {
        $this->tipo_animale = $_tipo_animale;
        $this->prezzo = $_prezzo;
        $this->nome_prodotto = $_nome_prodotto;
        $this->peso = $_peso;
    }
}

?>
