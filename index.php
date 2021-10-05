<?php

$title = "Задание 4";
$mainHeader = "Текущая дата";
$date = date("d-m-Y H:i:s");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$title"; ?></title>
</head>
<body>
    <h1><?php echo "$mainHeader"; ?></h1>
    <p style="font-size: 32px;"><?php echo "$date"; ?></p>
</body>
</html>