<meta property="og:description" content="SGB Code Membership Adalah Project yang baru dibuat pada tanggal 19 Agustus Project ini hanya berlaku buat Member SGB Team Reborn. Dimana SGB Code Membership ini untuk membuktikan kalau kamu member asli di SGB Team"/>
<meta property="og:image" content="https://member.sgb.or.id/img/membership.png"/>
<meta property="og:image:alt" content="https://member.sgb.or.id/img/membership.png"/>
<link rel="shortcut icon" href="https://sharinggilsblog.org/member/favicon.ico">
<link href="https://cdn.sgb.or.id/sgb_img/favicon.ico" rel="icon" type="image/x-icon"/>
<?php

error_reporting(E_ALL ^ E_NOTICE);
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

require dirname(__FILE__)."/config.php";

session_name($_CONFIG['session_name']);
session_start();

if (isset($_GET['reset'])) {
    unset($_SESSION['logo']);
}

global $_ERROR;

if (isset($_SESSION['error'])) {
    $_ERROR = $_SESSION['error'];
    unset($_SESSION['error']);
}

require dirname(__FILE__)."/include/functions.php";

$browserDetect = array_key_exists('detect_browser_lang', $_CONFIG) ? $_CONFIG['detect_browser_lang'] : false;
$defaultlang = array_key_exists('lang', $_CONFIG) ? $_CONFIG['lang'] : 'en';
$color_primary = array_key_exists('color_primary', $_CONFIG) ? $_CONFIG['color_primary'] : false;

$lang = getLang($defaultlang, $browserDetect);

if (file_exists(dirname(__FILE__)."/translations/".$lang.".php")) {
    include dirname(__FILE__)."/translations/".$lang.".php";
}

require dirname(__FILE__)."/include/head.php";
require dirname(__FILE__)."/lib/countrycodes.php";

?>

<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title><?php echo getString('title'); ?></title>
        <meta name="description" content="<?php echo getString('description'); ?>">
        <meta name="keywords" content="<?php echo getString('tags'); ?>">

        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="js/ie8.js"></script>
        <![endif]-->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="js/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">

        <link href="style.css" rel="stylesheet">

        <script src="js/jquery-3.2.1.min.js"></script>
        <?php echo setMainColor($color_primary); ?>
    </head>
    <body class="bg-light">
        <div class="navbar p-0 bg-primary m-0">
            <div class="container-fluid">
            <?php 
            // Language menu.
            echo langMenu('menu');
            // End language menu.
            ?>
            </div>
        </div>
        <?php
        if (file_exists(dirname(__FILE__).'/template/header.php')) {
            include dirname(__FILE__).'/template/header.php';
        }
        if (file_exists(dirname(__FILE__).'/include/generator.php')) {
            include dirname(__FILE__).'/include/generator.php';
        }
        if (file_exists(dirname(__FILE__).'/template/footer.php')) {
            include dirname(__FILE__).'/template/footer.php';
        }
        ?>
        <script src="js/popper.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="js/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="js/all.js?v=3"></script>
        <!-- END QRcdr -->
    </body>
</html>