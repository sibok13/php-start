<?php 
    require_once 'db_config.php';
    $result = mysqli_query($link, 'SELECT * FROM images WHERE id > 0 ORDER BY counter DESC');
    $images = array();
    while($row = mysqli_fetch_assoc($result)){
        $images[] = $row;
    }
    function galery($images){
        foreach($images as $key => $value){
           echo '
            <div style="width: 300px; padding: 5px; height: 220px; overflow: hidden;">
                <a target="_blank" href="/detail.php?id=' . $value['id'] . '">
                    <h2>'. $value['title'] .'</h2>
                    <img style="width: 300px; height: 180px; object-fit: cover;" src="'. $value['url'] . '"><br>
                </a>
            </div>
           ';
        }
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
        <h1>Галерея изображений</h1>
        <div style="display:flex; flex-wrap: wrap; justify-content: center;">
            <?php galery($images) ?>
        </div>
    </div>
</body>
</html>