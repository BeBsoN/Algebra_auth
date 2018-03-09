<?php

   require_once 'core/init.php';
   
   $user = new User();
   //checkirati objekt da ga ne pustimo na dashboard ako nije logiran
   
   if(!$user->check()){
       Redirect::to('login');
   }
   

   
   Helper::getHeader('Algebra Auth','main_header');
   
   require_once 'notifications.php';
   
 
   
?>

<div class="row">
    <div class="col-xs-12 col-md-8 col-lg-6 coll-md-offset-2 col-lg-offset-3">
        <h1>Dashboard</h1>
        <a href="logout.php">Logout</a>
    </div>
</div>		