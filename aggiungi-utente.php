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
    
        if(count($_POST)>0){
            $sql = "INSERT INTO dbmsutenti (nome, password) VALUES ('$_POST[nome]',hash('sha256', $_POST[password])";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                header("Refresh:0");
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
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
    <title>Aggiungi utente</title>
</head>
<body>
    <h1>Aggiungi utente:</h1>
    <form action="aggiungi-utente.php" method="post">
        <p>Nome: <input type="text" name="nome" required>
        <p>Password: <input type="password" name="pw" required>
        <input type="submit" value="Aggiungi"></p>
        <input type="hidden" name="tipo" value="Aggiungi">
    </form>
</body>
</html>
