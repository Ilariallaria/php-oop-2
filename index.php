<!-- provate ad immaginare quali sono le classi necessarie per creare uno shop online 
con le seguenti caratteristiche:
L'e-commerce vende prodotti per gli animali.
I prodotti saranno oltre al cibo, anche giochi, cucce, etc.
L'utente potrà sia comprare i prodotti senza registrarsi, 
oppure iscriversi e ricevere il 20% di sconto su tutti i prodotti.
BONUS:
Il pagamento avviene con la carta prepagata che deve contenere un saldo
sufficiente all'acquisto.
 -->

<?php 
require_once __DIR__.'/Cibo.php';
require_once __DIR__.'/Accessori.php';
require_once __DIR__.'/Igiene.php';
require_once __DIR__.'/UtenteAnonimo.php';
require_once __DIR__.'/UtenteRegistrato.php';
require_once __DIR__.'/CartaPrepagata.php';

// esemio di prodotto tipologia Cibo
$croccantini = new Cibo('Gatto', 12, 'Croccantini', 400);
$croccantini->composizione_animale = 'si';
$croccantini->ready_to_use = 'No';
var_dump($croccantini);

// esemio di prodotto tipologia Accessori
$spazzola = new Accessori('Cane', 15, 'Spazzola');
var_dump($spazzola);

// esemio di prodotto tipologia Igiene
$salviette = new Igiene ('Coniglio', 3, 'Salviette Detergenti');
// override
$salviette->con_profumo = 'Si';
// override
$salviette->quantità = 1 . ' pacco, 25 pezzi';
var_dump($salviette);

// esempio UtenteOccasionale
$carloBello = new UtenteAnonimo ('Carlo', 'Bello', 'sonobello@gmail.com');
$carloBello->aggiungiAlCarrello($salviette);
$carloBello->totaleCarrello();
// var_dump($carloBello->totaleCarrello());


// esempio UtenteRegistrato
$santaMaria = new UtenteRegistrato ('Santa', 'Maria', 'santamaria@gmail.com');

// chiamo la funzione che aggiunge al carrello i prodotti
// e gli passiamo come argomento (come la funzione stessa si aspetta)
//  il prodotto da aggiungere
$santaMaria->aggiungiAlCarrello($spazzola);

// chiamo la funzione che somma i prezzi degli articoli nel carrello
// e toglie lo sconto (se l'utente ne ha diritto)
$santaMaria->totaleCarrello();
var_dump($santaMaria->totaleCarrello());

// creo la carta dell'utente
$cartaUtente = new CartaPrepagata ('Santa Maria', '123456789', '03/27', '123');
// carico i sodi
$cartaUtente->saldo = 50;
var_dump($cartaUtente);

// chiamo la funzione pagamento, che controlla il saldo dell'utente e
// mi stampa un messaggio (ok, o non ok) a seconda che il saldo sia
// sufficiente o meno per gli acquisti
$santaMaria->effettuaPagamento($cartaUtente);
var_dump($santaMaria->effettuaPagamento($cartaUtente));


?>