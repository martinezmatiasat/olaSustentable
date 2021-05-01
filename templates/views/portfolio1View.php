<?php
include_once "app/controllers/conect.php";
include_once "app/controllers/banneradminController.php";

$datos=NoticiasadminController::getnotbyid($_GET["id"],$conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ola Sustentable Portfolio</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href=<?= IMG . "favicon.ico" ?> rel="icon">
   <link href=<?= IMG . "apple-touch-icon.png" ?> rel="apple-touch-icon">

  <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
   <link href="http://fonts.cdnfonts.com/css/bahnschrift" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href=<?= "assets/vendor/bootstrap/css/bootstrap.min.css" ?> rel="stylesheet">
   <link href=<?= "assets/vendor/icofont/icofont.min.css" ?> rel="stylesheet">
   <link href=<?= "assets/vendor/boxicons/css/boxicons.min.css" ?> rel="stylesheet">
   <link href=<?= "assets/vendor/animate.css/animate.min.css" ?> rel="stylesheet">
   <link href=<?= "assets/vendor/owl.carousel/assets/owl.carousel.min.css" ?> rel="stylesheet">
   <link href=<?= "assets/vendor/venobox/venobox.css" ?> rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href=<?= CSS . "style.css" ?> rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Green - v4.1.0
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


<header id="header" class="fixed-top">
   <div class="container d-flex align-items-center">

      <!--<h1 class="logo mr-auto"><a href="#inicio"><img src= alt="ola sustentable" style=""></a></h1>-->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href=<?= URL.'home'?> class="logo mr-auto"><img src=<?= "assets/img/logo.jpeg" ?> style="max-height: 3em;" alt="Ola Sustentable" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
       
      </nav>
   </div>
</header>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?=$datos["titulo"];?></h2>
          <ol>
            <li><a href=<?= URL.'home'?>>Home</a></li>
            <li>Inner Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper-container">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <?php
                  list($width, $height, $type, $attr) = getimagesize($datos["img"]);
                  if ($width>=848){?>
                    <img src=<?=$datos["img"];?> alt=<?=$datos["titulo"]?> style="width:90%">
                  <?php
                  }else{
                  ?>
                  <img src=<?=$datos["img"];?> alt=<?=$datos["titulo"]?>>
                  <?php
                  }
                  ?>
                </div>

                
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4" >
            
            <div class="portfolio-description" >
              <h2><?=$datos["subtitulo"]?></h2>
              <?php
              $parrafos = explode('./n',$datos['texto']);
              foreach ($parrafos as $parrafo ) {
              ?>
              <p >
              <?=$parrafo;?>              
              </p>
              <?php
              }
              ?>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <footer id="footer">
   <div class="container">
      <a href="index.html" class="logo mr-auto"><img src=<?= "assets/img/logo_fondo_negro.png" ?> style="max-height: 5em;" alt="" class="img-fluid"></a>
      <p></p>
      <div class="social-links">
        
         <a href="https://www.instagram.com/ola.sustentable/" class="instagram"><i class="bx bxl-instagram"></i></a>
         <a href="#charlemos" class="google-plus"><i class="bx bx-envelope"></i></a>
         <a href="https://linkedin.com/in/ola-sustentable-11b3a61bb" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      
   </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>