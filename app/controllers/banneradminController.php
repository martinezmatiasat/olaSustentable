<?php

class BanneradminController
{
   public function index()
   {
      //if (!isset($_SESSION['user'])) Redirect::to('login');
      
      View::render('adminbanner');
   }

   public static function savebanner($post, $files, $conn){
     
      $texto=$post["text"];
      $orden=$post["orden"];
      if (!empty($files)) {
         $fileName = time();        
         $rutanueva='assets/img/'.$files['imba']['name'];
         $rutamuestra='assets/img/'.$files['imba']['name'];
         $rutaactual=$files['imba']['tmp_name'];
         
         move_uploaded_file($rutaactual,$rutanueva);
         
         $img=$rutamuestra;
         $img1=$fileName;  
         $query="INSERT INTO banner (id, img, orden, texto) VALUES (NULL,'$img' , '$orden','$texto')";
         $resutltado=mysqli_query($conn, $query);
         verify($resutltado);
         
         close($conn);
         Redirect::to('banneradmin');
         
    }
   }
   public static function getbyid($id,$conn){
       
   
    
         $query="SELECT * FROM banner  WHERE id='$id'";
         $resutltado=mysqli_query($conn, $query);
         
         $fila = mysqli_fetch_assoc($resutltado);
         mysqli_close($conn);
         return($fila);
         
         
    
   }
   public static function changebanner($post, $files, $conn){
      
      $id=$post["id"];
      $texto=$post["text"];
      $orden=$post["orden"];
      if (!empty($files)) {
         $fileName = time();        
         $rutanueva='assets/img/'.$files['imba']['name'];
         $rutamuestra='assets/img/'.$fileName;
         $rutaactual=$files['imba']['name'];
         
         move_uploaded_file($rutaactual,$rutanueva);
         
         $img=$rutamuestra;
         $img1=$fileName;  
         $query="UPDATE banner SET img='$img', orden='$orden',texto='$texto' WHERE id='$id' ";
         $resutltado=mysqli_query($conn, $query);
         verify($resutltado);
         
         close($conn);
         Redirect::to('banneradmin');
         
    }

   }
   public static function deletebanner($post, $conn){
      
      $id=$post["id"];
      
         $query="DELETE FROM banner WHERE id=$id ";
         $resutltado=mysqli_query($conn, $query);
         verify($resutltado);
         
         close($conn);
         Redirect::to('adminbanner');
         
    }
    
   
}