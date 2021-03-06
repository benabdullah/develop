<?php namespace ZN\ViewObjects;

interface ValidationInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------------
    // Check -> 5.4.2
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $submit = NULL;
    //
    //--------------------------------------------------------------------------------------------------------
    public function check(String $submit = NULL) : Bool;

    //--------------------------------------------------------------------------------------------------------
    // between()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param numeric $min
    // @param numeric $max
    //
    //--------------------------------------------------------------------------------------------------------
    public function between(Float $min = NULL, Float $max = NULL) : Validation;

    //--------------------------------------------------------------------------------------------------------
    // betweenBoth()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param numeric $min
    // @param numeric $max
    //
    //--------------------------------------------------------------------------------------------------------
    public function betweenBoth(Float $min = NULL, Float $max = NULL) : Validation;

    //--------------------------------------------------------------------------------------------------------
    // method()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $method
    //
    //--------------------------------------------------------------------------------------------------------
    public function method(String $method) : Validation;

    //--------------------------------------------------------------------------------------------------------
    // value()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $value
    //
    //--------------------------------------------------------------------------------------------------------
    public function value(String $value) : Validation;

    //--------------------------------------------------------------------------------------------------------
    // required()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function required() : Validation;

    //--------------------------------------------------------------------------------------------------------
    // numeric()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function numeric() : Validation;

    //--------------------------------------------------------------------------------------------------------
    // match()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $match
    //
    //--------------------------------------------------------------------------------------------------------
    public function match(String $match) : Validation;

    //--------------------------------------------------------------------------------------------------------
    // matchPassword()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $match
    //
    //--------------------------------------------------------------------------------------------------------
    public function matchPassword(String $match) : Validation;

    //--------------------------------------------------------------------------------------------------------
    // oldPassword()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $oldPassword
    //
    //--------------------------------------------------------------------------------------------------------
    public function oldPassword(String $oldPassword) : Validation;

    //--------------------------------------------------------------------------------------------------------
    // compare()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param numeric $min
    // @param numeric $max
    //
    //--------------------------------------------------------------------------------------------------------
    public function compare(Int $min = NULL, Int $max = NULL) : Validation;

    //--------------------------------------------------------------------------------------------------------
    // validate()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param args
    //
    //--------------------------------------------------------------------------------------------------------
    public function validate(...$args) : Validation;

    //--------------------------------------------------------------------------------------------------------
    // secure()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param args
    //
    //--------------------------------------------------------------------------------------------------------
    public function secure(...$args) : Validation;

    //--------------------------------------------------------------------------------------------------------
    // pattern()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $pattern
    // @param string $char
    //
    //--------------------------------------------------------------------------------------------------------
    public function pattern(String $pattern, String $char = NULL) : Validation;

    //--------------------------------------------------------------------------------------------------------
    // phone()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $design
    //
    //--------------------------------------------------------------------------------------------------------
    public function phone(String $design = NULL) : Validation;

    //--------------------------------------------------------------------------------------------------------
    // alpha()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function alpha() : Validation;

    //--------------------------------------------------------------------------------------------------------
    // alnum()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function alnum() : Validation;

    //--------------------------------------------------------------------------------------------------------
    // captcha()
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function captcha() : Validation;

    //--------------------------------------------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param array  $config
    // @param string $viewName
    // @param string $met
    //
    //--------------------------------------------------------------------------------------------------------
    public function rules(String $name, Array $config = [], $viewName = '', String $met = 'post');

    //--------------------------------------------------------------------------------------------------------
    // Nval
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    //
    //--------------------------------------------------------------------------------------------------------
    public function nval(String $name);

    //--------------------------------------------------------------------------------------------------------
    // Error
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    //
    //--------------------------------------------------------------------------------------------------------
    public function error(String $name = 'array');

    //--------------------------------------------------------------------------------------------------------
    // Error
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $name
    // @param string $met
    //
    //--------------------------------------------------------------------------------------------------------
    public function postBack(String $name, String $met = 'post');
}
