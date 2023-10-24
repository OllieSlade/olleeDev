<!-- 2205667 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glass Castle - <?=$page_name?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/album1.png">
    <script src="inc/script.js" async defer></script>
</head>

<?php
// setting the name for the cart cookie
$cookie_name = "basket_ident";
?>

<body class="body<?=$identifier?>">
    <!-- The hero class is for the image at the top of the page, the nav class then holds all the navigation at the top
    I then create the burger menu icon, the wordmark, and the menu items -->
    <div class="hero hero<?=$identifier?>">
        <header class="nav">
            <div class="container row row--special">
                <a href="./" class="nav__wordmark">
                    <h1>Glass Castle</h1>
                </a>
                <button class="nav-toggle" id="nav-toggle">
                    <span class="hamburger"></span>
                </button>
                <nav>
                    <ul id="nav__list" class="nav__list nav__list--hidden row">
                        <li><a href="index.php" <?php echo (strpos($_SERVER['PHP_SELF'], 'index.php') ? 'class="youarehere"' : '');?>>home</a></li>
                        <li><a href="about.php" <?php echo (strpos($_SERVER['PHP_SELF'], 'about.php') ? 'class="youarehere"' : '');?>>about</a></li>
                        <li><a href="socials.php" <?php echo (strpos($_SERVER['PHP_SELF'], 'socials.php') ? 'class="youarehere"' : '');?>>socials</a></li>
                        <li><a href="market.php" <?php echo (strpos($_SERVER['PHP_SELF'], 'market.php') ? 'class="youarehere"' : '');?>>market</a></li>
                        <li><a href="cart.php" <?php echo (strpos($_SERVER['PHP_SELF'], 'cart.php') ? 'class="youarehere"' : '');?>>cart</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    <!-- </div> this is now closed in every document-->