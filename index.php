<!-- Задание 1. Создать галерею фотографий. Она должна состоять из одной страницы, на которой пользователь видит все картинки в 
уменьшенном виде. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать 
с помощью свойства width. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея</title>
</head>
<body>
    <?php

    $img = [
        ['Image 1', '/images/001.jpg'],
        ['Image 2', '/images/002.jpg'],
        ['Image 3', '/images/003.jpg'],
        ['Image 4', '/images/004.jpg'],
        ['Image 5', '/images/005.jpg'],
        ['Image 6', '/images/006.jpg']
    ];
    
    function galery($images){
        foreach($images as $image){
           echo '
            <div style="width: 300px; padding: 5px;">
                <a target="_blank" href="' . $image[1] . '">
                    <h2>'. $image[0] .'</h2>
                    <img style="width: 300px;" src="'. $image[1] .'"><br>
                </a>
            </div>
           ';
        }
    }
    
    ?>
    <div style="display: flex; flex-direction: column; align-items: center; margin: 0 auto; padding: 20px 50px;">
        <h1>Галерея изображений</h1>
        <div style="display:flex; flex-wrap: wrap; justify-content: center;">
            <?php galery($img) ?>
        </div>
    </div>
</body>
</html>
