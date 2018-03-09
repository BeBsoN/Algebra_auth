<?php


   require_once 'core/init.php';
   
   $user = new User();
   
   //pozivanje metode logout
   
   $user->logout();
   
   Redirect::to('index');
   

?>
