<?php 
    require_once 'db_config.php';
    if($_GET['id'] && is_numeric($_GET['id'])){
        $result = mysqli_query($link, 'SELECT * FROM images WHERE id =' . $_GET['id']);
        mysqli_query($link, 'UPDATE images SET counter=counter+1 WHERE id =' . $_GET['id']);

        $image = array();
        while($row = mysqli_fetch_assoc($result)){
            $image[] = $row;
        }
    }else{
        echo 'Ошибка! Неверные параметры изображения.';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерея</title>
</head>
<body>
    <div style="display: flex; flex-direction: column; align-items: center; margin: 0 auto; padding: 20px 50px;">
        <h1><?php echo $image[0]['title'] ?></h1>
        <div style="display:flex; flex-wrap: wrap; justify-content: center;">
            <img style="width: 100%;" src="<?php echo $image[0]['url'] ?>">
            <p>Количество просмотров: <?php echo $image[0]['counter'] ?></p>
        </div>
    </div>
</body>
</html>