<!-- provate ad immaginare quali sono le classi necessarie per creare uno shop online 
con le seguenti caratteristiche:
L'e-commerce vende prodotti per gli animali.
I prodotti saranno oltre al cibo, anche giochi, cucce, etc.
L'utente potrà sia comprare i prodotti senza registrarsi, 
oppure iscriversi e ricevere il 20% di sconto su tutti i prodotti.
BONUS:
Il pagamento avviene con la carta prepagata che deve contenere un saldo sufficiente all'acquisto.
 -->

<?php 
 require_once __DIR__.'/Cibo.php';
 require_once __DIR__.'/Accessori.php';
 require_once __DIR__.'/Igiene.php';

$croccantini = new Cibo('Gatto', 12, 'Croccantini', 400);
$croccantini->composizione_animale = 'si';
$croccantini->ready_to_use = 'No';
var_dump($croccantini);

$spazzola = new Accessori('Cane', 15, 'Spazzola');
var_dump($spazzola);

$salviette = new Igiene ('Coniglio', 3, 'Salviette Profumate');
// override
$salviette->con_profumo = 'Si';
// override
$salviette->quantità = 1 . ' pacco, 25 pezzi';
var_dump($salviette);
?>