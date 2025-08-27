<?php
for ($row = 5; $row >= 1; $row--) {
    for ($col =1; $col <=$row ; $col++) {
        echo " * ";
    }
    echo "<br>";
}
echo "<br>";
$num = 1;
for ($row = 1; $row <= 4; $row++) {
    for ($col = 1; $col <= $row; $col++) {
        echo "  $num  ";
       $num++; 
    }
    $num=1;
    echo "<br>";
}
echo "<br>";
$char = 'A';
for ($row = 1; $row <= 4; $row++) {
    for ($col = 1; $col <= $row; $col++) {
        echo "  $char  " ;
    }
$char++;
    echo "<br>";
}
?>
