<?php namespace ZN\Helpers;

interface LoggerInterface
{
    //--------------------------------------------------------------------------------------------------------
    //
    // Author     : Ozan UYKUN <ozanbote@gmail.com>
    // Site       : www.znframework.com
    // License    : The MIT License
    // Copyright  : (c) 2012-2016, znframework.com
    //
    //--------------------------------------------------------------------------------------------------------

    //--------------------------------------------------------------------------------------------------
    // notice()
    //--------------------------------------------------------------------------------------------------
    //
    // @param string $message
    // @param string $time
    //
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------
    public static function notice(String $message, String $time = NULL);

    //--------------------------------------------------------------------------------------------------
    // emergency()
    //--------------------------------------------------------------------------------------------------
    //
    // @param string $message
    // @param string $time
    //
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------
    public static function emergency(String $message, String $time = NULL);

    //--------------------------------------------------------------------------------------------------
    // alert()
    //--------------------------------------------------------------------------------------------------
    //
    // @param string $message
    // @param string $time
    //
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------
    public static function alert(String $message, String $time = NULL);

    //--------------------------------------------------------------------------------------------------
    // error()
    //--------------------------------------------------------------------------------------------------
    //
    // @param string $message
    // @param string $time
    //
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------
    public static function error(String $message, String $time = NULL);

    //--------------------------------------------------------------------------------------------------
    // warning()
    //--------------------------------------------------------------------------------------------------
    //
    // @param string $message
    // @param string $time
    //
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------
    public static function warning(String $message, String $time = NULL);

    //--------------------------------------------------------------------------------------------------
    // critical()
    //--------------------------------------------------------------------------------------------------
    //
    // @param string $message
    // @param string $time
    //
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------
    public static function critical(String $message, String $time = NULL);

    //--------------------------------------------------------------------------------------------------
    // info()
    //--------------------------------------------------------------------------------------------------
    //
    // @param string $message
    // @param string $time
    //
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------
    public static function info(String $message, String $time = NULL);

    //--------------------------------------------------------------------------------------------------
    // debug()
    //--------------------------------------------------------------------------------------------------
    //
    // @param string $message
    // @param string $time
    //
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------
    public static function debug(String $message, String $time = NULL);

    //--------------------------------------------------------------------------------------------------
    // report()
    //--------------------------------------------------------------------------------------------------
    //
    // @param string $subject
    // @param string $message
    // @param string $destination
    // @param string $time
    //
    // @return bool
    //
    //--------------------------------------------------------------------------------------------------
    public static function report(String $subject, String $message, String $destination = NULL, String $time = NULL) : Bool;
}
