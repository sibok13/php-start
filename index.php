<?php
    
    //получение всех фото в галерее (работа с комментариями в файле detail.php)

    require_once 'db_config.php';

    //запуск сессии
    session_start();

    $result = mysqli_query($link, 'SELECT * FROM goods WHERE id > 0 ORDER BY counter DESC');
    $goods = array();
    while($row = mysqli_fetch_assoc($result)){
        $goods[] = $row;
    }
    function catalog(){
        global $goods;
        foreach($goods as $key => $value){
           ?>
            <div class="card">
                <a href="/detail.php?id=<?= $value['id'] ?>">
                    <h2><?= $value['title'] ?></h2>
                    <div class="img-box"><img class="card-img" src="<?= $value['url'] ?>"></div>
                </a>
                <div class="price"><?= $value['price'] ?> &#8381;</div>
                <div class="description"><?= $value['description'] ?></div>
                <div class="btn"><a href="/detail.php?id=<?= $value['id'] ?>">Подробнее ...</a></div>
            </div>
           <?php
        }
    }
    mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог товаров</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Каталог товаров</h1>
        <div class="cards-box">
            <?php catalog() ?>
        </div>
        <h2><a href="login.php">Вход в аккаунт</a></h2>
    </div>
</body>
</html>