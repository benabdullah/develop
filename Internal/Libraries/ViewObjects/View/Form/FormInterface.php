<?php namespace ZN\ViewObjects\View;

interface FormInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Telif Hakkı: Copyright (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Open
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function open(String $name = NULL, Array $_attributes = []) : String;

    //--------------------------------------------------------------------------------------------------------
    // Close
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function close() : String;

    //--------------------------------------------------------------------------------------------------------
    // Hidden
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    //
    //--------------------------------------------------------------------------------------------------------  
    public function hidden(String $name = NULL, String $value = NULL) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Text
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------      
    public function text(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Text
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function password(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;

    //--------------------------------------------------------------------------------------------------------
    // Textarea
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function textArea(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;

    //--------------------------------------------------------------------------------------------------------
    // Radio
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function radio(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;

    //--------------------------------------------------------------------------------------------------------
    // Select
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param array  $options
    // @param scalar $selected
    // @param array  $attributes
    // @param bool   $multiple
    //
    //--------------------------------------------------------------------------------------------------------  
    public function select(String $name = NULL, Array $options = [], $selected = NULL, Array $_attributes = [], Bool $multiple = false) : String;

    //--------------------------------------------------------------------------------------------------------
    // Multi Select
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param array  $options
    // @param scalar $selected
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function multiselect(String $name = NULL, Array $options = [], $selected = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Chekbox
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function checkbox(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // File
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param bool   $multiple
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function file(String $name = NULL, Bool $multiple = false, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Submit
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function submit(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Button
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function button(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;

    //--------------------------------------------------------------------------------------------------------
    // Reset
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function reset(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;

    //--------------------------------------------------------------------------------------------------------
    // Email
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function email(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Url
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------      
    public function url(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Number
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function number(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Search
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------      
    public function search(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Tel
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function tel(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Color
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function color(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Date
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function date(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Date Time
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function datetime(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Datetime Local
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function datetimeLocal(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Time
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function time(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Week
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function week(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Month
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function month(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Range
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function range(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
    
    //--------------------------------------------------------------------------------------------------------
    // Image
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------  
    public function image(String $name = NULL, String $value = NULL, Array $_attributes = []) : String;
}