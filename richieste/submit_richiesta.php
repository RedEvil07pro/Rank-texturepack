<?php
// Verifica se il modulo è stato inviato
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Raccogli i dati inviati dal modulo
    $nome = $_POST['nome'];
    $nome_sito = $_POST['nome_sito'];
    $sviluppatore = $_POST['sviluppatore'];
    $hosting = $_POST['hosting'];
    $descrizione = $_POST['descrizione'];

    // Esegui una validazione dei dati (opzionale)
    if (empty($nome) || empty($nome_sito) || empty($sviluppatore) || empty($hosting) || empty($descrizione)) {
        echo "Tutti i campi sono obbligatori!";
        exit;
    }

    // Qui potresti aggiungere il codice per inviare una email, o salvare i dati in un database
    // Per esempio, per inviare una email (assicurati che il server di hosting supporti l'invio di email)
    $to = "vre2407@gmail.com"; // Modifica con il tuo indirizzo email
    $subject = "Nuova richiesta per la creazione di un sito web";
    $message = "
    Nome e Cognome: $nome\n
    Nome del sito: $nome_sito\n
    Sviluppatore scelto: $sviluppatore\n
    Hosting richiesto: $hosting\n
    Descrizione: $descrizione\n
    ";

    // Imposta gli header per l'email
    $headers = "From: no-reply@tuosito.com" . "\r\n" .
               "Reply-To: no-reply@tuosito.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Invia l'email
    if (mail($to, $subject, $message, $headers)) {
        echo "La tua richiesta è stata inviata con successo!";
    } else {
        echo "C'è stato un errore nell'invio della richiesta. Riprova più tardi.";
    }
} else {
    echo "Metodo di invio non valido!";
}
?>
