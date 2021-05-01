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
if ($_POST){
  
  if($_POST["form"]==0){
    NoticiasadminController::savenoticias($_POST,$_FILES,$conn);  
  }elseif($_POST["form"]==1){
    NoticiasadminController::changenoticias($_POST,$_FILES,$conn);
  }elseif($_POST["form"]==2){
    $datos=NoticiasadminController::getnotbyid($_POST["id"],$conn);
    
  }elseif($_POST["form"]==3){
    $id=$_POST["id"];
    
      
         $query="DELETE FROM noticias WHERE id=$id ";
         $resutltado=mysqli_query($conn, $query);
         verify($resutltado);
         
         close($conn);
         Redirect::to('noticiasadmin');
    
  }
    

        
    }
    
?>
<?php include_once 'templates/includes/sidebar.php' ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
             
              
            </div>
          </div>
        </nav>

        <div class="container ">
            <div class="row align-items-center justify-content-center ">
                <form action="noticiasadmin" method="post" enctype="multipart/form-data" class="form-inline">
                <?php
                if(isset($datos)){
                ?>
                <div class="row">
                  <input type="hidden" name="form" value=1>
                  <input type="text" name="titulo" id="" value=<?= $datos["titulo"];?>>
                  <input type="text" name="subtitulo" id="" value=<?= $datos["subtitulo"];?>>
                  </div>
                  <div class="row">
                  <textarea name="text" id="" cols="30" rows="4"  id="" placeholder="Ingrese el texto de la imagen" class="form-control"style='margin-left:1%;margin-bottom:1%'><?= $datos["texto"];?> </textarea>
                  
                  <select name="clase" id="" class="form-control" style='margin-left:1%;margin-bottom:1%'placeholder="Orden">
                        <option value="<?= $datos["clase"];?>" selected><?= $datos["clase"];?></option>  
                        <option value="1">1</option>
                        <option value="2">2</option>
                        
                        
                  </select>
                  </div>
                <?php
                }else{
                ?>
                <div class="row">
                  <input type="hidden" name="form" value=0>
                  <input type="text" name="titulo" id="" class="form-control"style='margin-left:1%;margin-bottom:1%' placeholder="Ingrese el titulo aqui">
                  <input type="text" name="subtitulo" id="" class="form-control"style='margin-left:1%;margin-bottom:1%' placeholder="Ingrese el subtitulo aqui">
                </div>
                <div class="row">
                  <textarea name="text" id="" cols="30" rows="4" id="" placeholder="Ingrese el texto de la imagen" class="form-control"style='margin-left:1%;margin-bottom:1%' ></textarea>
                  
                  <select name="clase" id="" class="form-control" style='margin-left:1%;margin-bottom:1%'placeholder="Orden">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        
                        
                  </select>
                  </div>
                <?php
                }
                ?>
                
                   
                    <input type="file" name="imba" id="" style='margin-left:1%;margin-bottom:1%'>
                    <?php
                    if(isset($datos)){
                    ?>
                    <input type="submit" value="Guardar" class="btn btn-outline-primary"style='margin-left:1%;margin-bottom:1%'>
                    <?php
                    }else{
                    ?>
                    <input type="submit" value="Cargar" class="btn btn-outline-primary"style='margin-left:1%;margin-bottom:1%'>
                    <?php
                    }
                    ?>
                  
                </form>
            </div>
            <div class="row align-items-center">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">imagen</th>
                        <th scope="col">Texto</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Subtitulo</th>
                        <th scope="col">Clase</th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($noticias as $noticia ) {?>
                                <tr>                                    
                                    <td style="width:20%;"><img src=<?=$noticia['img'];?> alt=<?=$noticia['titulo'];?> style="width:50%;"></td>
                                    <td><?=substr($noticia['texto'], 0, 150); ?></td>
                                    <td><?=$noticia['titulo'];?></td>
                                    <td><?=$noticia['subtitulo'];?></td>
                                    <td><?=$noticia['clase'];?></td>
                                    <td> 
                                    <form action="noticiasadmin" method="post">
                                        <input type="hidden" name="form" value=2>
                                        <input type="hidden" name="id" value=<?=$noticia['id'];?>>
                                        <button type="submit" class="btn btn-success">Editar</button>
                                    </form>
                                    </td>
                                    <td> 
                
                                    <form action="noticiasadmin" method="post">
                                        <input type="hidden" name="form" value=3>
                                        <input type="hidden" name="id" value=<?=$noticia['id'];?>>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                        
                    </tbody>
                </table>

            </div>
        </div> 

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main2.js"></script>
  </body>
</html>