<?php 

//Используя только две переменные, поменяйте их значение местами. Например, если a = 1, b = 2, 
//надо, чтобы получилось b = 1, a = 2. Дополнительные переменные использовать нельзя.

$a = 1;
$b = 2;

echo "Переменная а = $a, переменная b = $b <br>";

$a = $a - $b;
$b = $b + $a;
$a = ($a - $b)*-1;

echo "Переменная а = $a, переменная b = $b";