<?php
$amount=1000;
$vat= 15;
$vat=$amount*($vat/100);
$totalamount=$amount+$vat;
echo "Total Amount = $amount <br>";
echo "VAT = 15% <br>";
echo "Total amount after imposing VAT = $totalamount";
?>