<!-- Задание 3. *[ для тех, кто изучал JS-1 ] При клике по миниатюре нужно показывать полноразмерное изображение в модальном окне 
(материал в помощь: https://www.internet-technologies.ru/articles/sozdaem-prostoe-modalnoe-okno-s-pomoschyu-jquery.html) -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <title>Галерея</title>
    <style>
        .popup-fade {
            display: none;
        }
        .popup-fade:before {
            content: '';
            background: #000;
            position: fixed; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%;
            opacity: 0.7;
            z-index: 9999;
        }
        .popup {
            position: fixed;
            top: 10%;
            left: 40%;
            padding: 0px;
            width: 60%;
            margin-left: -20%;	
            background: #fff;
            border: 1px solid orange;
            border-radius: 4px; 
            z-index: 99999;
            opacity: 1;	
        }
        .popup-close {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
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
                        <a href="#" class="popup-open" name="' . $name . '">
                            <h2>'. $name .'</h2>
                            <img style="width: 300px;" src="' .$img_dir . '/' . $file . '"><br>
                            
                            <div class="popup-fade" id="' . $name . '">
                                <div class="popup">
                                    <a class="popup-close" href="#">Закрыть</a>
                                    <img style="width: 100%;" src="' .$img_dir . '/' . $file . '">
                                </div>	
                            </div>
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

    <script>
        $(document).ready(function($) {
            $('.popup-open').click(function() {
                var name = this.name;
                $('#'+name).fadeIn();
                    return false;
            });	
            
            $('.popup-close').click(function() {
                $(this).parents('.popup-fade').fadeOut();
                return false;
            });		
        
            $(document).keydown(function(e) {
                if (e.keyCode === 27) {
                    e.stopPropagation();
                    $('.popup-fade').fadeOut();
                }
            });
            
            $('.popup-fade').click(function(e) {
                if ($(e.target).closest('.popup').length == 0) {
                    $(this).fadeOut();					
                }
            });
        });
    </script>

</body>
</html>