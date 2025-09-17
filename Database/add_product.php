<?php
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $buying_price = $_POST['buying_price'];
    $selling_price = $_POST['selling_price'];
    $display = isset($_POST['display']) ? 'Yes' : 'No';

    $sql = "INSERT INTO products (name, buying_price, selling_price, display) 
            VALUES ('$name', $buying_price, $selling_price, '$display')";

    if (mysqli_query($conn, $sql)) {
        echo "New product added successfully! <a href='display_products.php'>View Products</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Add Product</title></head>
<body>
    <fieldset style="width: 400px; height: 300px;"><legend style="font-weight: bold;">Add Product</legend>
    <form method="post">
        <label for="Name:">Name</label><br>
        <input type="text" name="name" required><br><br>
        <label for="Buying Price">Buying Price</label><br>
        <input type="number" name="buying_price" required><br><br>
        <label for="Selling Price">Selling Price</label><br>
        <input type="number" name="selling_price" required><br><br>
        <hr>
        <input type="checkbox" name="display" checked>Display <br><br>
        <hr>
        <input type="submit" value="SAVE">
    </form>
    </fieldset>
</body>
</html>