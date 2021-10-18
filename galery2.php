<!-- Задание 2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто передавая в функцию построения адрес папки 
с изображениями. Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней. -->

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

    function galery($img_dir){
        $dir = $img_dir;
        if($handle = opendir($dir)){

            while(false !== ($file = readdir($handle))) {
                if($file != "." && $file != ".."){
                    $name = preg_replace('(\.[a-z]*)', '', $file);
                    echo '
                    <div style="width: 300px; padding: 5px;">
                        <a target="_blank" href="' .$img_dir . '/' . $file . '">
                            <h2>'. $name .'</h2>
                            <img style="width: 300px;" src="' .$img_dir . '/' . $file . '"><br>
                        </a>
                    </div>
                    ';
                }
            }
        }
    }
   
    ?>
    <div style="display: flex; flex-direction: column; align-items: center; margin: 0 auto; padding: 20px 50px;">
        <h1>Галерея изображений</h1>
        <div style="display:flex; flex-wrap: wrap; justify-content: center;">
            <?php galery('images') ?>
        </div>
    </div>
</body>
</html>