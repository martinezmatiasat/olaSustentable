<?php

class mailController
{
   public function index()
   {
      if (empty($_POST['message']) || empty($_POST['email']) || empty($_POST['name']) || empty($_POST['subject'])) {
         Alert::throw_msg('Faltan completar datos', 'danger');
      } else {
         send_email('martinezmatiasat@outlook.com', $_POST['subject'], $_POST['message'], $_POST['name'], $_POST['email']);
      }
      $data = ['title' => 'Home', 'bg' => 'dark'];
      View::render('home', $data);
   }
}
