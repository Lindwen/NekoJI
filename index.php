<!DOCTYPE html>
<html>
<head>
    <title>Kemonomimi Emojis</title>
    <meta charset="utf-8">
    <link href ="css/main.css" rel ="stylesheet">
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="css/purecookie.css"/>
    <script src="js/purecookie.js"></script>
    <script src="js/lazyloading.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" rel="stylesheet"/>
</head>
<body>
<div class="header">
    <h1>Kemonomimi Emojis</h1>
</div>
<div class="separator">
    <?php
    $dir = opendir("img/emojis/");
    $nbimages = 15;
    $images_sur_le_serveur = glob("img/emojis/*.{jpg,png,gif}", GLOB_BRACE);
    $combien_d_images_sur_le_serveur = count($images_sur_le_serveur);  
    echo "<p>Il y a <span class='blue'>$combien_d_images_sur_le_serveur</span> émojis sur le site.</p>";
    ?>
    <p>Pour <span class="green">download</span> un émoji cliquez dessus !</p>
</div>
<div class="main">
<?php
    $dir = opendir("img/emojis/");
    $nbimages = 15;
    $images_sur_le_serveur = glob("img/emojis/*.{jpg,png,gif}", GLOB_BRACE);
    $combien_d_images_sur_le_serveur = count($images_sur_le_serveur) + 2;  
    echo '<ul class="flex-container">';
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    if ($_GET['page'] == "") { $_GET['page'] = 1; }
    $debut = ($_GET['page'] - 1)  * $nbimages + 2;
    $i = $debut;
    $j = 1;
    while ($Fichier = readdir($dir))
    {
        $files[] = $Fichier;
    }
    while ($i >= $debut and $j <= $nbimages)
    {
    if ( $files[$i] != ".." && $files[$i] != "." && $files[$i] != "" && preg_match('/\.(jpg|png|gif)$/',$files[$i]) )
    {
    echo "<a href='img/emojis/$files[$i]' download><li class='flex-item'><img class='lazyload' data-src='img/emojis/$files[$i]' border=\"0\"></li></a>";
    }
    $i++;
    $j++;
    }
    echo "</ul>";
    echo '<div class="bottom">';
    $derniere_page = ceil($combien_d_images_sur_le_serveur / $nbimages);
    if ($page > 1) {
    echo '<a href="'.$_SERVER['PHP_SELF'].'" >Début</a>&nbsp;|&nbsp;<a href="'.$_SERVER['PHP_SELF'].'?page=' . ($page - 1) . '" >Précédent</a>';
    }
            define('MAX_NB_PAGES', 10);   
            for ($i = max(1, min(max($page - MAX_NB_PAGES / 2, 1), $derniere_page - MAX_NB_PAGES)), $j = 0; $j <= MAX_NB_PAGES && $i <= $derniere_page; $i++, $j++) {
            if ($i == $page) {
                if ($page > 1) {echo '&nbsp;|&nbsp;'; }
                    echo '' . $i . '';
                } else {
                    echo '&nbsp;|&nbsp;<a href="'.$_SERVER['PHP_SELF'].'?page=' . $i . '" >' . $i . '</a>';
                }
            }
            if ($page < $derniere_page) {
                echo '&nbsp;|&nbsp;<a href="'.$_SERVER['PHP_SELF'].'?page=' . ($page + 1) . '" >Suivant</a>&nbsp;|&nbsp;<a href="'.$_SERVER['PHP_SELF'].'?page=' . ($derniere_page) . '" >Fin</a>';
            }
            echo '</div>';
            closedir($dir);
        ?>
</div>
<div class="separator">
    <center>
    <p style="display: inline;">Create with <div class="popup" onclick="myFunction()">❤️<span class="popuptext" id="myPopup">Coucou toi :3</span></div><span style="color: #fff"> by </span> <a href="https://github.com/Lindwen" style="text-decoration: none; color: tomato;">Lindwen</a><span style="color: #fff">.</span></p>
</center>
</div>
</body>
</html>
<script>
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>