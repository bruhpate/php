<?php
session_start();

if (isset($_SESSION["UTENTE"])) {
    echo '
    <html>
        <head>
           <title>Seleziona</title>
           <link rel="stylesheet" type="text/css" href="style.css">
        </head>
        <body>
            <h1>Seleziona una tabella:</h1>
                <a href="cast.php"><button>Cast</button></a>
                <a href="film.php"><button>Film</button></a>
                <a href="utente.php"><button>Utente</button></a>
                <a href="partecipazione.php"><button>Partecipazione</button></a>
            <h1>Impostazioni:</h1>
                <a href="aggiungi-utente.php"><button>Aggiungi utente</button></a>
                <a href="login.php"><button>Logout</button></a>
        </body>
     </html>';
} else {
    echo "Accesso non consentito";
}