<?php

class AdminController
{
   public function index()
   {
      //if (!isset($_SESSION['user'])) Redirect::to('login');
      
      View::render('admin');
   }
}