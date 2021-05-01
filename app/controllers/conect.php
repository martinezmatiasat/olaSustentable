<?php
  $server='localhost';
  $db='olasustentable';
	$user = 'root';
	$pass = '';

  $conn=mysqli_connect($server,$user,$pass,$db);
  if(!$conn){
    die('Error de conexion: '. mysqli_connect_errno());
  }