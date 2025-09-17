<?php
include 'conn.php';

$search = "";
$sql = "SELECT * FROM products WHERE display = 'Yes'";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = mysqli_real_escape_string($conn, $_POST['search']);
    if ($search != "") {
        $sql .= " AND name LIKE '%$search%'";
    }
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head><title>Display Products</title></head>
<body>

<fieldset style="width: 400px; height: 250px;"><legend style="font-weight:bold;">Product List</legend>
    <table border="1">
        <tr>
            <th>NAME</th>
            <th>PROFIT</th>
            <th>ACTIONS</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $profit = $row['selling_price'] - $row['buying_price'];
                echo "<tr>
                        <td>" . $row['name'] . "</td>
                        <td>" . $profit . "</td>
                        <td>
                            <a href='edit_product.php?id=" . $row['id'] . "'>edit</a> |
                            <a href='delete_product.php?id=" . $row['id'] . "'>delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No products found (or none set to Display 'Yes')</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
    <br>
    <a href="add_product.php">Add New Product</a> 
    <br>
    <a href="search_products.php">Search Products</a>
</body>
</html>