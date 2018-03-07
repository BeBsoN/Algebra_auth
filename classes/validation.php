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
                    elseif (!empty($value)) {
                        
                        switch ($rule){
                            case 'min':                                
                                if (strlen($value) < $rule_value) {
                                $this->addError($item, "Field {$item} must have minimum of {$rule_value} characters.");
                            }
                            break;
                            case 'max':
                                if (strlen($value) > $rule_value) {
                                $this->addError($item, "Field {$item} must have maximum of {$rule_value} characters.");
                            }
                            break;
                            case 'matches':
                                if ($value != Input::get($rule_value)) {
                                $this->addError ($item, "Field must {$item} must match {$rule_value} field.");}
                            case 'unique':{
                                $check = $this->db->get('id',$rule_value, array($item, '=', $value));
                                if ($check->getCount()) {
                                    $this->addError($item, "{$item} already exists.");
                                }
                                break;
                            }
                        }
                    
                }
            }
        }
        if(empty($this->errors))
            $this->passed = true;
        return $this;
    }
    
    private function addError($item, $error)
    {
        $this->errors[$item] = $error;
    }
    
    public function getPassed() {
        return $this->passed;
    }
    
    public function hasError($field) {
        if(isset($this->errors[$field]))
            return $this->errors[$field];
        return FALSE;
        
    }
}
