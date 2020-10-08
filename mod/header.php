<?php
if (!defined('_VALID_ACCESS')) {
  header("location: index.php");
  die;
}

if (isset($_GET["id"])) $idh = $_GET['id'];
else $idh = "";
if (isset($_GET["se"])) $seh = $_GET['se'];
else $seh = "";
if (isset($_GET["mod"])) $moh = $_GET['mod'];
else $moh = "";

$akdb = new aksesdb;
$akdb->dbconnect(_DBSERVER, _DBUSER, _DBPASS, _DBNAME);

$profil = $akdb->dbobject("SELECT * FROM " . _TBPROFIL . " ORDER BY id_pf DESC LIMIT 0,1");
// var_dump($profil);
?>
<!doctype html>
<html lang="en">

<head>
  <link rel="shortcut icon" href="<?php echo _URLWEB; ?>cssMediatama/images/favicon.png" type="image/x-icon">
  <title>TVRI &mdash; Sumatra Barat</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700, 900|Vollkorn:400i" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/css/jquery-ui.css">
  <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/fonts/flaticon/font/flaticon.css">

  <!-- <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/css/aos.css"> -->

  <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/css/style.css">

  <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/css/owl.carousel.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/fontawesome.min.css">

  <link rel="stylesheet" href="<?php echo _URLWEB; ?>cssMediatama/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

  <style>
    @font-face {
      font-family: "Bold";
      src: url('<?php echo _URLWEB; ?>cssMediatama/Bold.ttf');
    }

    @font-face {
      font-family: "Regular";
      src: url('<?php echo _URLWEB; ?>cssMediatama/Regular.ttf');
    }

    h1,
    h2,
    h5,
    .nav-link {
      font-family: "Bold" !important;
    }

    p {
      font-family: "Regular" !important;
    }


    .carousel-cell {
      width: 100%;
      margin-right: 10px;
      /* position: absolute; */
    }

    .main-carousel .carousel-cell .img-class {
      width: 100%;
    }

    /* position dots up a bit */
    .flickity-page-dots {
      bottom: 0px;
    }

    /* dots are lines */
    .flickity-page-dots .dot {
      height: 4px;
      width: 40px;
      margin: 0;
      border-radius: 0;
    }

    @media (min-width: 1200px) {
      .main-carousel .carousel-cell .card {
        position: absolute;
        top: 20em;
        left: 50em;
        right: 10em;
        bottom: 5em;
      }
    }
  </style>

  <style>
    .owl-carousel .owl-slide {
      position: relative;
      height: 100vh;
      background-color: lightgray;
    }

    .owl-carousel .owl-slide-animated {
      transform: translateX(20px);
      opacity: 0;
      visibility: hidden;
      transition: all 0.05s;
    }

    .owl-carousel .owl-slide-animated.is-transitioned {
      transform: none;
      opacity: 1;
      visibility: visible;
      transition: all 0.5s;
    }

    .owl-carousel .owl-slide-title.is-transitioned {
      transition-delay: 0.2s;
    }

    .owl-carousel .owl-slide-subtitle.is-transitioned {
      transition-delay: 0.35s;
    }

    .owl-carousel .owl-slide-cta.is-transitioned {
      transition-delay: 0.5s;
    }


    .owl-carousel .owl-dots,
    .owl-carousel .owl-nav {
      position: absolute;
    }

    .owl-carousel .owl-nav {
      left: 50%;
      top: -20%;
      transform: translateX(-50%);
      margin: 0;
    }

    @media (min-width: 576px) {
      /* .memberiSpace{
        
      } */
    }
  </style>

  <script type="text/javascript" src="//player.wowza.com/player/latest/wowzaplayer.min.js"></script>

</head>