<?php

$ccgen = new ccgen-w-cvv;

$bin = '542418'; //sample bin
echo $ccgen->generateCreditCardNumber($bin) .'|'. $ccgen->generateCVV();
// 5424180000000000|123 (sample output) this is a sample output, you can use this to test your script.

?>
