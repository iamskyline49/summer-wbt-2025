<?php
$array = [5, 12, 8, 15, 3, 20];
$search = 15;

foreach ($array as $index => $value) {
    if ($value == $search) {
        echo "Element $search found at index $index";
        break;
    }
}

?>
