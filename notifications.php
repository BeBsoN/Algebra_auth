<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$ses = Session::all();
foreach ($ses as $key => $value){
    switch ($key){
        case 'success':
        case 'danger':
        case 'warning':
        case 'info':
?>

        <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-<?php echo $key ?> alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong><?php echo ucfirst($key)?>!</strong> <?php echo $value ?>
                         </div>
                </div>
        </div>

            
<?php
Session::delete($key);
break;
default: 
    }
}


?>