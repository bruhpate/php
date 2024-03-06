<!DOCTYPE html>
<html>
<head>  
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Login Page</title>
</head>
<body>

<?php
// Connessione al database

session_start();

$servername = "";
$username = "";
$password = "";
$dbname = "";

require "credenziali.php";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione al database fallita: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["UTENTE"] = $_REQUEST["nome"];
    $username = $_POST['nome'];
    $password = hash('sha256', $_POST['password']);

    // Query per verificare il nome utente e la password user:pietro pw:matteo
    $sql = "SELECT * FROM dbmsutenti WHERE nome='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        header("Location: pagina1.php");
        exit();
    } else {
        unset($_SESSION["UTENTE"]);
        echo "Nome utente o password errati!";
    }
}
?>

<h2>Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Nome utente (pietro):</label>
    <input type="text" name="nome" required><br><br>
    <label>Password: (matteo)</label>
    <input type="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>

</body>
</html>