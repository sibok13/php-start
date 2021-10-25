<?php

// 2. Создать калькулятор, который будет определять тип выбранной пользователем операции, 
// ориентируясь на нажатую кнопку.

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
    <input name="num_1" type="text" placeholder="Число 1" style="margin:5px; font-size:22px;"><br>
    <input name="num_2" type="text" placeholder="Число 2" style="margin:5px; font-size:22px;"><br>
    <button name="math" value="plus" style="width:40px; height:40px; margin:5px; font-size:30px;">+</button>
    <button name="math" value="minus" style="width:40px; height:40px; margin:5px; font-size:30px;">-</button>
    <button name="math" value="multiply" style="width:40px; height:40px; margin:5px; font-size:30px;">X</button>
    <button name="math" value="divide" style="width:40px; height:40px; margin:5px; font-size:30px;">/</button><br>
</form>

<h2><?php calc($math); ?></h2>