<?php
$c=0;
if($_POST){
    $a="olaSustentable";
    $b="SurfeandolaOla123";
    
    if ($_POST['usuario']==$a && $_POST['pass']==$b){
        session_start();
        $_SESSION['esta?']='si';
        
        header("Location: admin.php");
    }else{
        $c=1;
    }
}
?>
<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>Ola Sustentable</title>
   <meta content="" name="description">
   <meta content="" name="keywords">
   <!-- Favicons -->
   <link href= "assets\img\favicon.ico"  rel="icon">
   <link href= "assets\img\apple-touch-icon.png"  rel="apple-touch-icon">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.gstatic.com">
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&display=swap" rel="stylesheet">
   <link href="http://fonts.cdnfonts.com/css/bahnschrift" rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href= "..\..\assets\vendor\bootstrap\css\bootstrap.min.css"   rel="stylesheet">
   
</head>
<main id="main">
    <section >
        <div class="container ">
            <div class="row align-items-center justify-content-center ">
                <div class="card text-center col-6 row " style="margin-top:15%">
                    <div class="card-header col-12" style="background-color:#663399;color:#009999;">
                        <h5>Login Ola Sustentable </h5>
                    </div>
                    <div class="card-body">
                        <form action="adminlogin.php" method="post">
                            <input class="form-control" type="text" name='usuario' placeholder='Ingrese su usuario'>
                            <input class="form-control" type="password" name="pass" id="" placeholder='Contraseña'>
                            <?php if ($c==1){
                                echo('<p style="color:red">Contraseña Incorrecta</p>');
                            }?>
                        
                    </div>
                    <div class="card-footer text-muted" style="background-color:#663399;">
                        <input  type="submit" value="Ingresar" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>  
        </div>
    </section>
</main><!-- End #main -->
