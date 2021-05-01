<?php

class NoticiasadminController
{
   public function index()
   {
      //if (!isset($_SESSION['user'])) Redirect::to('login');
      
      View::render('noticiasadmin');
   }

   public static function savenoticias($post, $files, $conn){
      var_dump($post);
      var_dump($files);
       $titulo=$post["titulo"];
       $subtitulo=$post["subtitulo"];
      $texto=$post["text"];
      $clase=$post["clase"];
      if (!empty($files)) {
         $fileName = time();        
         $rutanueva='assets/img/'.$files['imba']['name'];
         $rutamuestra='assets/img/'.$files['imba']['name'];
         $rutaactual=$files['imba']['tmp_name'];
         
         move_uploaded_file($rutaactual,$rutanueva);
         
         $img=$rutamuestra;
         $img1=$fileName;  
         $query="INSERT INTO noticias (id, img, clase, texto, titulo, subtitulo) VALUES (NULL,'$img' , '$clase','$texto', '$titulo','$subtitulo')";
         $resutltado=mysqli_query($conn, $query);
         verify($resutltado);
         
         close($conn);
         Redirect::to('noticiasadmin');
         
         
    }
   }
   public static function getnotbyid($id,$conn){
       
   
    
         $query="SELECT * FROM noticias  WHERE id='$id'";
         $resutltado=mysqli_query($conn, $query);
         
         $fila = mysqli_fetch_assoc($resutltado);
         mysqli_close($conn);
         return($fila);
         
         
    
   }
   public static function changenoticias($post, $files, $conn){
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
      $id=$post["id"];
      $titulo=$post["titulo"];
       $subtitulo=$post["subtitulo"];
      $texto=$post["text"];
      $orden=$post["clase"];
      if (!empty($files)) {
         $fileName = time();        
         $rutanueva='assets/img/'.$files['imba']["name"];
         $rutamuestra='assets/img/'.$files['imba']["name"];
         $rutaactual=$files['imba']['tmp_name'];
         
         move_uploaded_file($rutaactual,$rutanueva);
         
         $img=$rutamuestra;
         $img1=$fileName;  
         $query="UPDATE banner SET img=$img, orden=$orden,texto=$texto orden=$titulo,texto=$subtitulo WHERE id=$id ";
         $resutltado=mysqli_query($conn, $query);
         verify($resutltado);
         
         close($conn);
         Redirect::to('noticiasadmin');
         
    }

   }
   public static function deletenoticias($post, $conn){
      
        $id=$post["id"];
      
         $query="DELETE FROM noticias WHERE id=$id ";
         $resutltado=mysqli_query($conn, $query);
         verify($resutltado);
         
         close($conn);
         Redirect::to('noticiasadmin');
         
    }
    
   
}