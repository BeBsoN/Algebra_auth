<?php

   require_once 'core/init.php';
   
   
   Helper::getHeader('Algebra Auth','main_header');
   
  if(Input::exists()){
   
  // var_dump(Input::get('username'));
      
      //bootstrap 3.3 forme i panel
  }
   
?>


    <div class="row">
	 <div class="col-xs-12 col-md-8 col-lg-6 coll-md-offset-2 col-lg-offset-3">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Sign in</h3>
  </div>
  <div class="panel-body">
  <form method="post">
  
 

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" placeholder="Username" autofocus>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="pssword" name="password" placeholder="Password">
  </div> 
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
	<p>If don't have an account, you can <a href="register.php">Register</a></p>
	
  </form>
  
	</div>
</div>
</div>
</div>		