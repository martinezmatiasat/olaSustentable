<?php
include_once "../../app/controllers/conect.php";
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

$query="SELECT * FROM banner ORDER BY orden";
$res=mysqli_query($conn, $query);
$i=verify($res);

    
    $banners=mysqli_fetch_all($res, MYSQLI_ASSOC);
if ($_POST){
    $texto=$_POST["text"];
    $orden=$_POST["orden"];
    if (!empty($_FILES)) {
        $fileName = time();        
        $rutanueva='../../assets/img/'.$fileName;
        $rutamuestra='../../assets/img/'.$fileName;
        $rutaactual=$_FILES['imba']['tmp_name'];
        
        move_uploaded_file($rutaactual,$rutanueva);
        
        $img=$rutamuestra;
        $img1=$fileName;  
        $query="INSERT INTO banner (id, img, orden, texto) VALUES (NULL,'$img' , '$orden','$texto')";
        $resutltado=mysqli_query($conn, $query);
        verify($resutltado);
        

        
    }
    
    close($conn);
}
?>
<?php include_once '../includes/sidebar.php'; ?>

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
                <form action="banneradmin.php" method="post" enctype="multipart/form-data" class="form-inline">

                    <textarea name="text" id="" cols="30" rows="2" name="texba" id="" placeholder="Ingrese el texto de la imagen" class="form-control"style='margin-left:1%;margin-bottom:1%'></textarea>
                    <select name="orden" id="" class="form-control" style='margin-left:1%;margin-bottom:1%'placeholder="Orden">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>

                    </select>
                    <input type="file" name="imba" id="" style='margin-left:1%;margin-bottom:1%'>
                    
                    <input type="submit" value="Cargar" class="btn btn-outline-primary"style='margin-left:1%;margin-bottom:1%'>
                </form>
            </div>
            <div class="row align-items-center">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">imagen</th>
                        <th scope="col">Texto</th>
                        <th scope="col">Orden</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($banners as $banner ) {?>
                                <tr>                                    
                                    <td style="width:20%;"><img src=<?=$banner['img'];?> alt="" style="width:50%;"></td>
                                    <td><?=$banner['texto'];?></td>
                                    <td><?=$banner['orden'];?></td>
                                </tr>
                        <?php
                            }
                        ?>
                        
                    </tbody>
                </table>

            </div>
        </div> 

    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/popper.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main2.js"></script>
  </body>
</html>