<?php

class Utente {
    public $nome;
    
    public $cognome;

    public $email;

    public $sconto = 0;

    protected $carrello = [];

    public function __construct($_nome, $_cognome, $_email) {
        $this->nome = $_nome;
        $this->email = $_email;
        $this->cognome = $_cognome;
    }

    public function aggiungiAlCarrello($prodotto){
        $this->carrello[] = $prodotto;
    }
    public function getProdottiNelCarrello() {
        return $this->carrello;
    }

    public function totaleCarrello(){
        $sommaPrezzi = 0;
        foreach ($this->carrello as $prodotto){
            $sommaPrezzi += $prodotto->prezzo;
        }
   
        $sommaPrezzi -= $sommaPrezzi * $this->sconto/100;
        return $sommaPrezzi;
    }
    public function effettuaPagamento($CartaPrepagata){
        $totaleDaPagare = $this->totaleCarrello();
        if($CartaPrepagata->saldo < $totaleDaPagare){
            throw new Exception("Utente: $this->cognome, saldo della carta insufficiente");
        } else {
            return 'Ordine preso in carico';
        }
        
    }
}