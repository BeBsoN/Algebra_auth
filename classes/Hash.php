<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Hash
{
    private function __construct() {
        
    }
    public static function salt($length)
    {
        return random_bytes($length);
    }
    public static function make($string, $salt)
    {
        return hash('sha256', $salt.$string);
    }
}
