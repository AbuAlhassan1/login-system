<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo "GamingBuddy | " . $info["title"]; ?> </title>
    <link rel="icon" href="<?php echo ASSETS . "img/favicon.ico" ?>" type="image/icon type">
    <link rel="stylesheet" href="<?php echo ASSETS . "css/bootstrap.min.css" ?>">
    <link rel="stylesheet" href="<?php echo ASSETS . "css/bootstrap.min.css.map" ?>">
    <!-- google font ( Open Sans Condensed [css : font-family: 'Open Sans Condensed', sans-serif;] ) !-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:ital,wght@0,300;0,700;1,300&display=swap" rel="stylesheet">
    <!-- google font ( Architects Daughter [css : font-family: 'Architects Daughter', cursive;] ) !-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Architects+Daughter&display=swap" rel="stylesheet">
    <!-- google font ( Amatic SC [css : font-family: 'Amatic SC', cursive;] ) !-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <!-- google font ( Cairo [css : font-family: 'Cairo', sans-serif;] ) !-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">
    <!-- my style page !-->
    <link rel="stylesheet" href= "<?php echo ASSETS . "css/style.css" ?>" >
</head>
<body key='dir'>
    <div class="container-fluid H">
        <div class="row head">
            <div class="a">
                <div class="header-btns">
                    <ul>
                        <li>
                            <a href="<?php echo ROOT . "home" ?>" class="tr" key="home">Home</a>
                        </li>
                        <li>
                            <a href="<?php echo ROOT . "login" ?>" class="tr" key="register">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="lang-selector">
                <button class="lang-btn" id="ar"> Arabic </button>
                <button class="lang-btn" id="en"> English </button>
            </div>
            <!-- <div id="google_translate_element"></div> -->
        </div>
    </div>
