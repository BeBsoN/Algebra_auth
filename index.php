<?php

   require_once 'core/init.php';
   
  // $db = DB::getInstance()->get('id, name', 'users');  //'SELECT *', 'users', array('username','=','perozdero'));
   
  // echo '<pre>';
  // var_dump($db);
  // die;
   
   Helper::getHeader('Algebra Auth','main_header');
   

?>

    <div class="row">
	 <div class="col-xs-12 col-md-8 col-lg-6 coll-md-offset-2 col-lg-offset-3">
	      <div class="jumbotron">
		     <div class="cointainer">
			   <h1>Algebra Auth</h1>
			   <p>Lorem ipsum dolor sit amet!</p>
			   <p>
			    <a class="btn btn-primary brn-lg" href="login.php"
   role="button">Sign in</a>	
            or
              <a class="btn btn-primary brn-lg" href="register.php"
   role="button">Create an account</a>		
           </p>
	        </div>
         </div>
     </div>
  </div>
	<?php
	 
	 Helper::getFooter('main_footer');
	 
	?>
   