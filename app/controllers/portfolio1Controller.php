<?php

class Portfolio1Controller
{
   public function index()
   {
      //if (!isset($_SESSION['user'])) Redirect::to('login');
      
      View::render('portfolio1', $data);
   }
}