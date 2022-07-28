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
}