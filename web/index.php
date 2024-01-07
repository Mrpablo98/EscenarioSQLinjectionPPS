<?php
$servername = "db";
$username = "db_user";
$password = "db_password";
$dbname = "ecommerce_db";

$conn = new mysqli($servername, $username, $password, $dbname);
ini_set('mysqli.multi_query', 1);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Verifica si las credenciales coinciden
    $query = "SELECT * FROM users WHERE username = '$input_username' AND password = '$input_password'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        header('Location: products.php');
        exit;
    } else {
        $error_message = "Credenciales incorrectas. Inténtalo de nuevo.";
    }

    $conn->close();
}

?>

<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <form method="post" action="">
        Nombre de usuario: <input type="text" name="username"><br>
        Contraseña: <input type="text" name="password"><br>
        <input value="Entrar" type="submit" name="submit">
    </form>
    <p><?php         echo $error_message;
?></p>
</body>
</html>

