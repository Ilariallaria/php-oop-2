<?php

require_once __DIR__ . '/Utenti.php';

class UtenteRegistrato extends Utente {
    // override
    public $sconto = 20;
}

?>