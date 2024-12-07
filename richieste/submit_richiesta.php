<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Imposta il codice di risposta HTTP
    echo "Metodo non consentito. Usa il metodo POST.";
    exit;
}

// Raccogli i dati dal modulo
$nome = $_POST['nome'] ?? '';
$nome_sito = $_POST['nome_sito'] ?? '';
$sviluppatore = $_POST['sviluppatore'] ?? '';
$hosting = $_POST['hosting'] ?? '';
$descrizione = $_POST['descrizione'] ?? '';

// Verifica che i dati siano completi
if (empty($nome) || empty($nome_sito) || empty($sviluppatore) || empty($hosting) || empty($descrizione)) {
    echo "Tutti i campi sono obbligatori!";
    exit;
}

// Costruisci l'email
$to = "vre2407@gmail.com"; // Destinatario dell'email
$subject = "Nuova richiesta per la creazione di un sito web";
$message = "
    Hai ricevuto una nuova richiesta di creazione sito web:\n\n
    Nome e Cognome: $nome\n
    Nome del sito: $nome_sito\n
    Sviluppatore scelto: $sviluppatore\n
    Hosting richiesto: $hosting\n
    Descrizione dettagliata:\n$descrizione\n
";
$headers = "From: no-reply@tuodominio.com\r\n" .
           "Reply-To: no-reply@tuodominio.com\r\n" .
           "X-Mailer: PHP/" . phpversion();

// Invia l'email
if (mail($to, $subject, $message, $headers)) {
    echo "La richiesta è stata inviata con successo! Ti contatteremo al più presto.";
} else {
    echo "Errore nell'invio dell'email. Riprova più tardi.";
}
?>
