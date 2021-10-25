<?php 
    require_once 'db_config.php';

    // сохранение комментария (отзыва) к фото (ЗАДАНИЕ №3)

    if($_POST["user_name"]){
      $user_name = $_POST["user_name"];
      $comment = $_POST["comment"];
      $id = $_GET["id"];

      mysqli_query($link, 'INSERT INTO comments (user_name, comment, id_img) VALUES ("' . $user_name . '", "' . $comment . '", ' . $id . ')');
      }

    // получение полного фото и увеличение счетчика просмотров

    if($_GET['id'] && is_numeric($_GET['id'])){
        $result = mysqli_query($link, 'SELECT * FROM images WHERE id =' . $_GET['id']);
        $result_comments = mysqli_query($link, 'SELECT * FROM comments WHERE id_img =' . $_GET['id']);
        mysqli_query($link, 'UPDATE images SET counter=counter+1 WHERE id =' . $_GET['id']); // увеличиваем счетчик просмотров

        $image = array();
        while($row = mysqli_fetch_assoc($result)){
            $image[] = $row;
        }

        // получение комментариев (отзывов) к фото (ЗАДАНИЕ №3)

        $comments = array();
        while($row = mysqli_fetch_assoc($result_comments)){
            $comments[] = $row;
        }
        
        mysqli_close($link);
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
        <div style="display: flex; flex-wrap: wrap; flex-direction: column; width: 100%; align-items: center;">
            <img style="width: 70%;" src="<?php echo $image[0]['url'] ?>">
            <div>Количество просмотров: <?php echo $image[0]['counter'] ?></div>
            <div style="width: 50%; height: 2px; background-color: #cccccc; margin: 5px;"></div>

            <?php 
              foreach($comments as $key => $value) {
                echo 'Имя пользователя: ' . $value['user_name'] . '<br>';
                echo 'Сообщение: ' . $value['comment'] . '<br><div style="width: 50%; height: 2px; background-color: #cccccc; margin: 5px;"></div>';
              }
            ?>
            <b>Оставьте комментарий:</b>
            <form method="POST" action="">
              <input name="user_name" type="text" placeholder="Никнейм"><br>
              <input name="comment" type="text" placeholder="Сообщение"><br>

              <input type="submit" value="Отправить">
            </form>
            <br>
            <div><a href="../">ОБРАТНО</a></div>
        </div>
    </div>
</body>
</html>