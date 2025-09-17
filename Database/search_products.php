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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Products</title>
</head>
<body>
    <fieldset style="width: 400px; height: 300px;"><legend style="font-weight: bold;">Search Product</legend>
    <form method="post">
        <input type="text" name="search" value="<?php echo $search; ?>" placeholder="Search by Name">
        <input type="submit" value="Search By Name"> 
    
    </form>
    <br>
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
    </fieldset>
</body>
</html>