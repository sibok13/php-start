<?php

// Задание 1.

$a = 2;
$b = 5;

if($a >=0 && $b >= 0){
    echo ($a - $b . ' - Действие 1');
}elseif($a < 0 && $b < 0){
    echo ($a * $b . ' - Действие 2');
}else {
    echo ($a + $b . ' - Действие 3');
}

echo '<br>';

switch($a && $b){
    case $a >=0 && $b >= 0:
        echo ($a - $b . ' - Действие 1');
        break;
    case $a < 0 && $b < 0:
        echo ($a * $b . ' - Действие 2');
        break;
    default:
        echo ($a + $b . ' - Действие 3');
}

echo '<br>';

// Задание 2.
// Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора
// switch организовать вывод чисел от $a до 15.

$a = 7;

switch($a){
    case 0:
        echo ($a++ . '<br>');
    case 1:
        echo ($a++ . '<br>');
    case 2:
        echo ($a++ . '<br>');
    case 3:
        echo ($a++ . '<br>');
    case 4:
        echo ($a++ . '<br>');
    case 5:
        echo ($a++ . '<br>');
    case 6:
        echo ($a++ . '<br>');
    case 7:
        echo ($a++ . '<br>');
    case 8:
        echo ($a++ . '<br>');
    case 9:
        echo ($a++ . '<br>');
    case 10:
        echo ($a++ . '<br>');
    case 11:
        echo ($a++ . '<br>');
    case 12:
        echo ($a++ . '<br>');
    case 13:
        echo ($a++ . '<br>');
    case 14:
        echo ($a++ . '<br>');
    case 15:
        echo ($a++ . '<br>');
}

echo '<br>';

// Задание 3. 
// Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. 
// Обязательно использовать оператор return.

function sum($x, $y){
    return $x + $y;
}

echo sum(2, 5) . '<br>';

function mult($x, $y){
    return $x * $y;
}

echo mult(2, 5) . '<br>';

function diff($x, $y){
    return $x - $y;
}

echo diff(2, 5) . '<br>';

function div($x, $y){
    return $x / $y;
}

echo div(2, 5) . '<br>';

// Задание 4.
// Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), 
// где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. 
// В зависимости от переданного значения операции выполнить одну из арифметических операций 
// (использовать функции из пункта 3) и вернуть полученное значение (использовать switch). 
 
function mathOperation($arg1, $arg2, $operation){
    $arg1 = $arg1;
    $arg2 = $arg2;

    switch($operation){
        case $operation == 'sum':
            echo sum($arg1, $arg2);
            break;
        case $operation == 'diff':
            echo diff($arg1, $arg2);
            break;
        case $operation == 'mult':
            echo mult($arg1, $arg2);
            break;
        case $operation == 'div':
            echo div($arg1, $arg2);
            break;
        }
}

echo mathOperation(4, 2, 'sum');

?>

<!-- Задание 5.
 Посмотреть на встроенные функции PHP. 
 Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи встроенных функций PHP. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>Меню<br></header>
    <main>Контент<br></main>
    <footer>Футер:<br><?php echo date('Y-m-d') ?></footer>
</body>
</html>

<?php

// Задание 6. *С помощью рекурсии организовать функцию возведения числа в степень. 
// Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

function power($val, $pow){
    if($pow > 0){
        return $val * power($val, $pow - 1);
    }
    return true;
}

echo power(2, 3) . '<br>';

// Задание 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
// 22 часа 15 минут
// 21 час 43 минуты

function my_date(){
    $my_time_h = date('H');
    $my_time_m = date('i');

    if($my_time_h % 10 == 1){
       echo $my_time_h . ' час '; 
    }elseif($my_time_h < 5 || $my_time_h > 20 and $my_time_h % 10 == 2 || $my_time_h % 10 == 3 || $my_time_h % 10 == 4){
        echo $my_time_h . '  часа ';
    }else{
        echo $my_time_h . ' часов ';
    }

    if($my_time_m % 10 == 1){
        echo $my_time_m . ' минута'; 
     }elseif($my_time_m % 10 == 2 || $my_time_m % 10 == 3 || $my_time_m % 10 == 4){
         echo $my_time_m . '  минуты';
     }else{
         echo $my_time_m . ' минут';
     }

}

my_date();