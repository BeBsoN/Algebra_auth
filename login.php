<?php

   require_once 'core/init.php';
   
   $user = new User();
   
   
   // ako sam logiran, vrati me na dashboard, nema smisla opet ulaziti u login page
   if($user->check()){
       Redirect::to('dashboard');
   }
   
   Helper::getHeader('Algebra Auth','main_header');
   
   $validate = new Validation();
   
  if(Input::exists()){
   
      if(Token::check(Input::get('token'))){
          $validation = $validate->check(array(
              'username' => array(
                  'required' => true,
                  
              ),
              'password' => array(
                  'required' => true,
                  
              )
              
          ));
          /*echo '<pre>';
          var_dump($validation);
          echo '</pre>';*/
          
          if($validate->getPassed()){
        //user i pass dohvaća iz metode sa Input klase
              
                  $login = $user->login(Input::get('username'), Input::get('password'));
                      
                  if($login){
                  Redirect::to('dashboard');
                  }
                  
              }
              
              Session::flash('danger','Sorry, login failed! Pleqase try again!');
              Redirect::to('login');
              
      }
     //echo 'nisu';
      
   
  // var_dump(Input::get('username'));
 
 }
  // var_dump(Input::get('username'));
      
      //bootstrap 3.3 forme i panel
  
   require_once 'notifications.php';
   
?>


    <div class="row">
	 <div class="col-xs-12 col-md-8 col-lg-6 coll-md-offset-2 col-lg-offset-3">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Sign in</h3>
  </div>
  <div class="panel-body">
  <form method="post">
  
    <input type="hidden" name="token" value="<?php echo Token::generate()?>">

        <div class="form-group <?php  echo ($validate->hasError('username')) ? 'has-error' : ''?>">
		<label for="username">Username*</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="username" autofocus>
                <?php                echo ($validate->hasError('username')) ? '<p class="text-danger">'.$validate->hasError('username').'</p>' : '' ?>
	</div>
	
	<div class="form-group <?php  echo ($validate->hasError('username')) ? 'has-error' : ''?>">
		<label for="password">Password*</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="password">
                <?php                echo ($validate->hasError('password')) ? '<p class="text-danger">'.$validate->hasError('password').'</p>' : ''?>
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