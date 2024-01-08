<?php
$servername = "db";
$username = "db_user";
$password = "db_password";
$dbname = "ecommerce_db";

$message = "<table><thead><tr><th>Product</th><th>Description</th><th>Price</th></tr></thead>";

$search_term = $_POST['search'] ?? '';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "SELECT * FROM products WHERE name = '$search_term'";
    $conn->multi_query($sql);

    do {
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_assoc()) {
                $message .= "<tr><td>Product found: " . $row["name"] . "</td>" . "<td>" . $row["description"] . "</td>" . " <td>" . $row["price"] . "</td></tr>";
            }
        }
    } while ($conn->next_result());

    // Si no se encontraron productos
    if ($message === "<table><thead><tr><th>Product</th><th>Description</th><th>Price</th></tr></thead>") {
        $message = "Error: No products found.";
    }
}

$conn->close();
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post" action="">
        <h2>Buscar producto:</h2> <input type="text" name="search" class="productsSearch"><br>
        <input type="submit" value="Buscar">
    </form>
    
    <?php echo $message; ?>
</body>
</html>
