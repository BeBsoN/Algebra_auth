<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Session
{
   private function __construct() {}
   public static function all()
   {
       return $_SESSION;
   }
   
   public static function exists($key)
   {
       return (isset($_SESSION[$key])) ? true : FALSE;
   }
   
   public static function put($key, $value)
   {
       //osim zapisa, potrebno je da odmah i vrati vrijednost
       return $_SESSION[$key] = $value;
   }
   
   public static function get($key)
   {
       return $_SESSION[$key];
   }
   
   public static function delete($key)
   {
       unset($_SESSION[$key]);
   }
   
   public static function flash($key, $msg = '')
   {
       //kada je metoda static kako bi pozvali unutar metode pozivamo pomoću self
       self::put($key, $msg);
   }
}

