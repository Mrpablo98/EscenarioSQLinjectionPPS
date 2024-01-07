<?php

$servername = "db";
$username = "db_user";
$password = "db_password";
$dbname = "ecommerce_db";

    $message = "<table><thead><tr><th>Product</th><th>Description</th><th>Price</th></tr></thead>";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_term = $_POST['search'];

        
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM products WHERE name = '$search_term'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $message .= "<tr><td>Product found: " . $row["name"] . "</td>" . "<td>" . $row["description"]. "</td>" . " <td>" . $row["price"] . "</td></tr>";
            }
            $message .= "</table>";
        } else {
            $message = "No product found";
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
        Search Product: <input type="text" name="search"><br>
        <input type="submit" value="Search">
    </form>
    
   <?php echo $message; ?>
</body>
</html>
