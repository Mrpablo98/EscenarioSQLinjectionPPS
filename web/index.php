<?php
$servername = "db";
$username = "db_user";
$password = "db_password";
$dbname = "ecommerce_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = 'usuario'; // Reemplaza esto con tu usuario de ejemplo
    $password = 'contraseña'; // Reemplaza esto con tu contraseña de ejemplo

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
        echo $error_message;
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
        Username: <input type="text" name="username"><br>
        Password: <input type="text" name="password"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>

