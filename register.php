<?php

   require_once 'core/init.php';
   
   //$user = new User();
   
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
          /*echo '<pre>';
          var_dump($validation);
          echo '</pre>';*/
          
          if($validate->getPassed()){
              //try catch block - hvata 
              //try{
              //    $user->create(array('username' => Input::get('username'),'password'=>$password,$salt=>$salt,$name=>Input::get('name'); -metoda će pokušati napraviti usera sa onim što je korisnik upisao i što proslijedimo $salt i$pass, ako je došlo do greške kod inserta, u catch blocku treba napraviti err
              //}catch(Exception $e){
              //factory predložak
              //}
              //
              //kako izgenerirati blok
              $salt = Hash::salt(32);
              $password = Hash::make(Input::get('password'), $salt);
              //var_dump($salt);
              
              header('Location:login.php');
      }
     //echo 'nisu';
      
   
  // var_dump(Input::get('username'));
  }
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
	<div class="form-group <?php  echo ($validate->hasError('name')) ? 'has-error' : ''?>">
		<label for="name">Name*</label>
		<input type="text" class="form-control" id="name" name="name" placeholder="name" autofocus>
                <?php                echo ($validate->hasError('name')) ? '<p class="text-danger">'.$validate->hasError('name').'</p>' : '' ?>
	</div>

	<div class="form-group <?php  echo ($validate->hasError('username')) ? 'has-error' : ''?>">
		<label for="username">Username*</label>
		<input type="text" class="form-control" id="username" name="username" placeholder="username">
                <?php                echo ($validate->hasError('username')) ? '<p class="text-danger">'.$validate->hasError('username').'</p>' : '' ?>
	</div>
	
	<div class="form-group <?php  echo ($validate->hasError('username')) ? 'has-error' : ''?>">
		<label for="password">Password*</label>
		<input type="password" class="form-control" id="password" name="password" placeholder="password">
                <?php                echo ($validate->hasError('password')) ? '<p class="text-danger">'.$validate->hasError('password').'</p>' : ''?>
	</div> 
	
	<div class="form-group <?php  echo ($validate->hasError('username')) ? 'has-error' : ''?>">
		<label for="confirm_password">Confirm Password*</label>
		<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="confirm password">
                <?php                echo ($validate->hasError('confirm_password')) ? '<p class="text-danger">'.$validate->hasError('confirm_password').'</p>' : ''?>
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
<?php
//svaki user se mora instancirati
//instancirati bazu
//klasa user
//kako registrirati korisnika
//na vrhu koda, napisati klasu Userm, i u toj klasi user
?>