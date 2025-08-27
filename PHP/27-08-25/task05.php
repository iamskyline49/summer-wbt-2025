<?php
$start = 1;
$end = 50;
$primes = [];
for ($num = $start; $num <= $end; $num++) {
    $is_prime = true;
    
    if ($num < 2) {
        $is_prime = false;
    } else {
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                $is_prime = false;
                break;
            }
        }
    }
    if ($is_prime) {
        $primes[] = $num;
    }
}
echo "Prime numbers between $start and $end: " . implode(", ", $primes) . "\n";
?>