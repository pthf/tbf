<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/landing_responsive.css">
    <link rel="stylesheet" type="text/css" href="styles/landing.css">
    <link rel="shortcut icon"  type="image/png" href="images/icono.png">
    <title>Bienvenido a The Beer Fans</title>
</head>
<body>



    <div class="img_certificado">

        <?php
            if($_GET['user_language'] == "ES"){
                echo '<img src="php/unnamed.png">';
            }else{
                echo '<img src="php/unnamed_eng.png">';
            }
        ?>


        <span>
            <?php
                echo $_GET['first_name']." ".$_GET['last_name'];
            ?>
        </span>
    </div>
</body>
</html>
