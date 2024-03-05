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
            $sql = "INSERT INTO cast (nome) VALUES ('$_POST[nome]')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Refresh:0");
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }

        //MODIFICA
        if($_POST["tipo"] == "Modifica"){
            $sql = "UPDATE cast SET nome='$_POST[nome]' WHERE Id=$_POST[id]";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Refresh:0");
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }

        //ELIMINA
        if($_POST["tipo"] == "Elimina"){
            $sql = "DELETE FROM cast WHERE Id=$_POST[id]";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Refresh:0");
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
        }
    }

    // Query per selezionare i dati dal database utilizzando i filtri
    $query = "SELECT * FROM cast";
    $result = mysqli_query($conn, $query);
    
    // Controllo se ci sono risultati
    if (mysqli_num_rows($result) > 0) {
        // Visualizzazione dei dati
        echo "<p>Cast</p>";
        echo "<br><table style='border:1px solid'><t><th>Id</th><th>Cast</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nome"] . "</td>";
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
    <title>Cast</title>
</head>
<body>
    <h1>Aggiungi:</h1>
    <form action="cast.php" method="post">
        <p>Nome: <input type="text" name="nome" required>
        <input type="submit" value="Aggiungi"></p>
        <input type="hidden" name="tipo" value="Aggiungi">
    </form>
    <h1>Modifica:</h1>
    <form action="cast.php" method="post">
        <p>Seleziona per Id: <input type="text" name="id" required>
        <p>Modifica per Nome: <input type="text" name="nome" required>
        <input type="submit" value="Modifica"></p>
        <input type="hidden" name="tipo" value="Modifica">
    </form>
    <h1>Elimina:</h1>
    <form action="cast.php" method="post">
        <p>Id: <input type="text" name="id" required>
        <input type="submit" value="Elimina"></p>
        <input type="hidden" name="tipo" value="Elimina">
    </form>
</body>
</html>