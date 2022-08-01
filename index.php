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
$croccantini->raccoltaCarta = 'Confezione esterna';
$croccantini->raccoltaMultimateriale = 'Confezione salvafreschezza';


var_dump($croccantini);

// esemio di prodotto tipologia Accessori
$spazzola = new Accessori('Cane', 15, 'Spazzola');
$spazzola->raccoltaMultimateriale = 'Spazzola';
var_dump($spazzola);

// esemio di prodotto tipologia Igiene
$salviette = new Igiene ('Coniglio', 3, 'Salviette Detergenti');
// override
$salviette->con_profumo = 'Si';
// override
$salviette->quantità = 1 . ' pacco, 25 pezzi';
$salviette->raccoltaOrganico = 'Salviette';
$salviette->raccoltaMultimateriale = 'Involucro';

var_dump($salviette);

// esempio UtenteOccasionale
$carloBello = new UtenteAnonimo ('Carlo', 'Bello', 'sonobello@gmail.com');
$carloBello->aggiungiAlCarrello($salviette);
$carloBello->totaleCarrello();
// var_dump($carloBello->totaleCarrello());
// $prepagataCarlo = new CartaPrepagata ('Carlo Bello', '1243949489', '01/01', '456');
// $prepagataCarlo->saldo = 2;
// $carloBello->effettuaPagamento($prepagataCarlo);
// var_dump($carloBello->effettuaPagamento($prepagataCarlo));


// esempio UtenteRegistrato
$santaMaria = new UtenteRegistrato ('Santa', 'Maria', 'santamaria@gmail.com');

// chiamo la funzione che aggiunge al carrello i prodotti
// e gli passiamo come argomento (come la funzione stessa si aspetta)
//  il prodotto da aggiungere
$santaMaria->aggiungiAlCarrello($spazzola);
$santaMaria->aggiungiAlCarrello($salviette);
$santaMaria->aggiungiAlCarrello($croccantini);

// chiamo la funzione che somma i prezzi degli articoli nel carrello
// e toglie lo sconto (se l'utente ne ha diritto)
$santaMaria->totaleCarrello();
var_dump($santaMaria->totaleCarrello());

// creo la carta dell'utente
$prepagataSanta = new CartaPrepagata ('Santa Maria', '123456789', '03/27', '123');
// carico i sodi
$prepagataSanta->saldo = 10;
var_dump($prepagataSanta);

// chiamo la funzione pagamento, che controlla il saldo dell'utente e
// mi stampa un messaggio a seconda che il saldo sia
// sufficiente o meno per gli acquisti
$santaMaria->effettuaPagamento($prepagataSanta);
var_dump($santaMaria->effettuaPagamento($prepagataSanta));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php try {?>
        <?php if($santaMaria->effettuaPagamento($prepagataSanta)==='Ordine preso in carico'){?>
            <div>
                Ciao <?php echo $santaMaria->nome .' '. $santaMaria->cognome ?>, il tuo ordine è stato preso in carico correttamente. <br> Ecco cosa hai acquistato: 
            </div>
            <ul>
                <?php foreach($santaMaria->getProdottiNelCarrello() as $item){?>
                <li><?php echo ($item->nome_prodotto) ?></li>
                <?php } ?>
            </ul>
        <?php } ?>
    <?php } catch(Exception $e) { 
       echo "Controlla il saldo della carta e riprova";
    // COME MAI, SE SCATENO L'ERRORE, MI RIPORTA IL MESSAGIO NEL LOG MA NON IN PAGINA?
    // (COME GLI DICO DI FARE NEL CATCH)
    // HO LASCIATO IL SALDO INSUFFICIENTE APPOSITAMENTE PER FARTI VEDERE COSA MI DICE! 
    }?>
</body>
</html>