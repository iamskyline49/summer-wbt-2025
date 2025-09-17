<?php
include 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    if (isset($_POST['confirm'])) {
        $sql = "DELETE FROM products WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            echo "Product deleted successfully! <a href='display_products.php'>View Products</a>";
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
<head><title>Delete Product</title></head>
<body>
    <fieldset style="width: 400px; height: 300px;"><legend style="font-weight: bold;">Delete Product</legend>
    <form method="post">
        Name: <input type="text" value="<?php echo $row['name']; ?>" ><br><br>
        Buying Price: <input type="number" value="<?php echo $row['buying_price']; ?>" ><br><br>
        Selling Price: <input type="number" value="<?php echo $row['selling_price']; ?>" ><br><br>
        Display: <input type="text" value="<?php echo $row['display']; ?>" ><br><br>
        <input type="submit" name="confirm" value="Delete">
    </form>
    </fieldset>
</body>
</html>