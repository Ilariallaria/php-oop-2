<?php 
class Products {
    public $nome_prodotto;

    public $tipo_animale;

    public $prezzo;

    public $quantità= 1;

    public function __construct($_tipo_animale, $_prezzo, $_nome_prodotto) {
        $this->tipo_animale = $_tipo_animale;
        $this->prezzo = $_prezzo;
        $this->nome_prodotto = $_nome_prodotto;
    }
}
?>