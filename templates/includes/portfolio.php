<?php
include_once "app/controllers/conect.php";
include_once "app/controllers/noticiasadminController.php";
function verify($resultado){
  if(!$resultado){
    $info=2;
  }else{
    $info=1;
  }
  return($info);
}

function close($conn){
  mysqli_close($conn);
}

$query="SELECT * FROM noticias ORDER BY id";
$res=mysqli_query($conn, $query);
$i=verify($res);
$noticias=mysqli_fetch_all($res, MYSQLI_ASSOC);
?>
      
      
      <section id="portfolio" class="portfolio">
         <div class="container">

            <div class="section-title">
               <h2>Novedades</h2>
               
            </div>

            <div class="row">
               <div class="col-lg-12 d-flex justify-content-center">
                  <ul id="portfolio-flters">
                     <li data-filter="*" class="filter-active">All</li>
                     <li data-filter=".filter-app">App</li>
                     <li data-filter=".filter-card">Card</li>
                     <li data-filter=".filter-web">Web</li>
                  </ul>
               </div>
            </div>

            <div class="row portfolio-container">
            <?php foreach ($noticias as $noticia ) {?>
                <?php if ($noticia["clase"] ==1) {?>
               <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                  <div class="portfolio-wrap">
                     <img src="<?= $noticia["img"];?>" class="img-fluid" alt="Ola_sustentable_novedades_espiritu_emprendedor">
                     <div class="portfolio-info">
                        <h4><?= $noticia["titulo"];?></h4>
                        <p><?= $noticia["subtitulo"];?></p>
                        <div class="portfolio-links">
                           <a href="<?= $noticia["img"];?>" data-gall="portfolioGallery" class="venobox" title="App 1"><i class="bx bx-plus"></i></a>
                           <a href="<?= URL.'portfolio1?id='.$noticia["id"];?>" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <?php }elseif ($noticia["clase"] ==2 ) {?>
               <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                  <div class="portfolio-wrap">
                     <img src="assets/img/Ola_sustentable_novedades_huella.jpg" class="img-fluid" alt="Ola_sustentable_novedades_huella">
                     <div class="portfolio-info">
                        <h4><?= $noticia["titulo"];?></h4>
                        <p><?= $noticia["subtitulo"];?></p>
                        <div class="portfolio-links">
                           <a href="<?= $noticia["img"];?>" data-gall="portfolioGallery" class="venobox" title="Web 3"><i class="bx bx-plus"></i></a>
                           <a href="<?= URL.'portfolio1?id='.$noticia["id"];?>" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <?php }?>
                <?php }?>
               

            </div>

         </div>
      </section> 
