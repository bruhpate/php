<?php
session_start();

if (isset($_SESSION["UTENTE"])) {
    echo '<a href="pagina1.php"><button>Home</button></a><br>';
    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";
    
    require "credenziali.php";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Verifica connessione
    if (!$conn) {
        die("Connessione al database fallita: " . mysqli_connect_error());
    }
    
    if (count($_POST)>0){
        //AGGIUNGI
        if($_POST["tipo"] == "Aggiungi"){
            $sql = "INSERT INTO partecipazione (codice, film, attore) VALUES (NULL, '$_POST[film]','$_POST[attore]')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Refresh:0");
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }

        //MODIFICA
        if($_POST["tipo"] == "Modifica1"){
            $sql = "UPDATE partecipazione SET film='$_POST[film]' WHERE codice=$_POST[codice]";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Refresh:0");
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }
        if($_POST["tipo"] == "Modifica2"){
            $sql = "UPDATE partecipazione SET attore='$_POST[attore]' WHERE codice=$_POST[codice]";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Refresh:0");
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }

        //ELIMINA
        if($_POST["tipo"] == "Elimina"){
            $sql = "DELETE FROM partecipazione WHERE codice=$_POST[codice]";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Refresh:0");
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }
    }

    // Query per selezionare i dati dal database utilizzando i filtri
    $query = "SELECT * FROM partecipazione";
    $result = mysqli_query($conn, $query);
    
    // Controllo se ci sono risultati
    if (mysqli_num_rows($result) > 0) {
        // Visualizzazione dei dati
        echo "<p>Partecipazione</p>";
        echo "<br><table style='border:1px solid'><t><th>Codice</th><th>Film</th><th>Attore</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["codice"] . "</td>";
            echo "<td>" . $row["film"] . "</td>";
            echo "<td>" . $row["attore"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nessun risultato trovato.";
    }
    mysqli_close($conn);
} else {
    echo "Accesso non consentito";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Partecipazione</title>
</head>
<body>
    <h1>Aggiungi:</h1>
    <form action="partecipazione.php" method="post">
        <p>Film: <input type="text" name="film" required>
        <p>Attore: <input type="text" name="attore" required>
        <input type="submit" value="Aggiungi"></p>
        <input type="hidden" name="tipo" value="Aggiungi">
    </form>
    <h1>Modifica:</h1>
    <form action="partecipazione.php" method="post">
        <p>Seleziona per Id: <input type="text" name="codice" required>
        <p>Modifica per Film: <input type="text" name="film" required>
        <input type="submit" value="Modifica"></p>
        <input type="hidden" name="tipo" value="Modifica1">
    </form>
    <p>---------------------------------------------------------------------</p>
    <form action="partecipazione.php" method="post">
        <p>Seleziona per Id: <input type="text" name="codice" required>
        <p>Modifica per Attore: <input type="text" name="attore" required>
        <input type="submit" value="Modifica"></p>
        <input type="hidden" name="tipo" value="Modifica2">
    </form>
    <h1>Elimina:</h1>
    <form action="partecipazione.php" method="post">
        <p>Id: <input type="text" name="codice" required>
        <input type="submit" value="Elimina"></p>
        <input type="hidden" name="tipo" value="Elimina">
    </form>
</body>
</html>
