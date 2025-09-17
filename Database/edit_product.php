<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $buying_price = $_POST['buying_price'];
        $selling_price = $_POST['selling_price'];
        $display = isset($_POST['display']) ? 'Yes' : 'No';

        $sql = "UPDATE products SET 
                name = '$name', 
                buying_price = $buying_price, 
                selling_price = $selling_price, 
                display = '$display' 
                WHERE id = $id";

        if (mysqli_query($conn, $sql)) {
            echo "Product updated successfully! <a href='display_products.php'>View Products</a>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    echo "No product ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit Product</title></head>
<body>
    <fieldset style="width: 400px; height: 300px;"><legend style="font-weight: bold;">Edit Product</legend>
    <form method="post">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        Buying Price: <input type="number" name="buying_price" value="<?php echo $row['buying_price']; ?>" required><br><br>
        Selling Price: <input type="number" name="selling_price" value="<?php echo $row['selling_price']; ?>" required><br><br>
        Display: <input type="checkbox" name="display" <?php if ($row['display'] == 'Yes') echo 'checked'; ?>><br><br>
        <input type="submit" value="SAVE">
    </form>
    </fieldset>
</body>
</html>