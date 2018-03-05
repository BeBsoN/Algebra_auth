<?php

   require_once 'core/init.php';
   
   
   Helper::getHeader('Algebra Auth | Create an account','main_header');
  
   $validate = new Validation();
   
   
  if(Input::exists()){
      if(Token::check(Input::get('token'))){
          $validation = $validate->check(array(
              'name' => array(
                  'required' => true,
                  'min' => 2,
                  'max' => 255
              ),
              'username' => array(
                  'required' => true,
                  'min' => 2,
                  'max' => 255,
                  'uniqe' => 'users'
              ),
              'password' => array(
                  'required' => true,
                  'min' => 8
              ),
              'confirm_password' =>array(
                  'required' => true,
                  'matches' => 'password'
              )
          ));
          echo '<pre>';
          var_dump($validation);
          echo '</pre>';
      }
     //echo 'nisu';
      
   
  // var_dump(Input::get('username'));
  }
   
?>


    <div class="row">
	 <div class="col-xs-12 col-md-8 col-lg-6 coll-md-offset-2 col-lg-offset-3">
	 
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Create an account</h3>
  </div>
  
  <div class="panel-body">
  
  <form method="post">
      <input type="hidden" name="token" value="<?php echo Token::generate()?>">
	<div class="form-group">
		<label for="name">Name*</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="name" autofocus>
	</div>

	<div class="form-group">
		<label for="username">Username*</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="username">
	</div>
	
	<div class="form-group">
		<label for="password">Password*</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="password">
	</div> 
	
	<div class="form-group">
		<label for="confirm_password">Confirm Password*</label>
		<input type="password" class="form-control" id="confirm_passwordpassword" name="confirm_password" placeholder="confirm password">
	</div> 
	
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Create</button>
	</div>
	<p>IF YOU HAVE AN ACCOUNT, PLEASE <a href="login.php">Sign In</a></p>
	
  </form>
  
	</div>
    </div>
    </div>
</div>		