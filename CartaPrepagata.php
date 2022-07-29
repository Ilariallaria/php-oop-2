<?php

class CartaPrepagata {
    public $nomeTitolare;
    public $numero;
    public $scadenza;
    public $cvv;
    public $saldo=0;

    public function __construct($_nomeTitolare, $_numero, $_scadenza, $_cvv){
        $this->nomeTitolare= $_nomeTitolare;
        $this->numero= $_numero;
        $this->scadenza= $_scadenza;
        $this->cvv= $_cvv;
    }
}
?>