<?php

// 1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение, деление. 
// Не забыть обработать деление на ноль! Выбор операции можно осуществлять с помощью тега <select>.

$math = $_GET;

function calc($math){
    if($math["num_1"] == null || $math["num_2"] == null) {
        echo "Укажите число 1 и число 2!";
    } else {
        switch ($math["math"]) {
            case "plus":
                $result = $math["num_1"] + $math["num_2"];
                echo $result;
                break;
            case "minus":
                $result = $math["num_1"] - $math["num_2"];
                echo $result;
                break;
            case "multiply":
                $result = $math["num_1"] * $math["num_2"];
                echo $result;
                break;
            case "divide":
                if($math["num_2"] == 0){
                    echo "деление на ноль недопустимо!";
                } else {
                    $result = $math["num_1"] / $math["num_2"];
                    echo $result;
                }
                break;
        }
    }
}

?>

<form action="">
    <input name="num_1" type="text" placeholder="Число 1">
    <select name="math" >
        <option selected disabled>Выберите действие</option>
        <option value="plus">+</option>
        <option value="minus">-</option>
        <option value="multiply">x</option>
        <option value="divide">/</option>
    </select>
    <input name="num_2" type="text" placeholder="Число 2">
    <input type="submit" value="Рассчитать">
</form>

<h2><?php calc($math); ?></h2>