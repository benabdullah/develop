<?php namespace ZN\Services\Request;

interface InternalRedirectInterface
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
    // action()
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string $action
    //
    //--------------------------------------------------------------------------------------------------------
    public function action(String $action);

    //--------------------------------------------------------------------------------------------------------
    // time()
    //--------------------------------------------------------------------------------------------------------
    //
    // @var numeric $time
    //
    //--------------------------------------------------------------------------------------------------------
    public function time(Int $time = 0) : InternalRedirect;

    //--------------------------------------------------------------------------------------------------------
    // wait()
    //--------------------------------------------------------------------------------------------------------
    //
    // @var numeric $time
    //
    //--------------------------------------------------------------------------------------------------------
    public function wait(Int $time = 0) : InternalRedirect;

    //--------------------------------------------------------------------------------------------------------
    // data()
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function data(Array $data) : InternalRedirect;

    //--------------------------------------------------------------------------------------------------------
    // insert()
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function insert(Array $data) : InternalRedirect;

    //--------------------------------------------------------------------------------------------------------
    // select()
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string $key
    //
    //--------------------------------------------------------------------------------------------------------
    public function select(String $key);

    //--------------------------------------------------------------------------------------------------------
    // delete()
    //--------------------------------------------------------------------------------------------------------
    //
    // @var mixed $key
    //
    //--------------------------------------------------------------------------------------------------------
    public function delete($key) : Bool;
}
