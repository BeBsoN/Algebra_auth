<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Validation
{
    private $passed = false;
    private $errors = array();
    
    public function __construct()
    {
      $this->db = DB::getInstance();  
    }
    
    public function check($items = array())
    {
        foreach ($items as $item => $rules)
        {
            foreach ($rules as $rule => $rule_value){
                
                $value = trim(Input::get($item));
                
                if (empty($value) && $rule === 'required')
                    {

                    $this->addError($item, "Field {$item} is required.");
                    }
                    elseif (0) {
                    
                }
            }
        }
        return $this;
    }
    
    private function addError($item, $error)
    {
        $this->errors[$item] = $error;
    }
}
