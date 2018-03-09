<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Redirect
{
    public static function to($url = null)
    {
        if($url){
            if(is_numeric($url)){
                switch ($url){
                    case 404:
                    header('HTTP/1.0 404 Not Found');
                    include 'includes/errors/404.html';
                    exit();
                    break;
                }
            }
            
            header('Location:'.$url.'.php');
            exit();            
        }
}


}
