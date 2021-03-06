<?php namespace ZN\IndividualStructures\Security;

class PHP
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
    // PHP Tag Chars
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected static $phpTagChars =
    [
        '<?' => '&#60;&#63;',
        '?>' => '&#63;&#62;'
    ];

    //--------------------------------------------------------------------------------------------------------
    // PHP Tag Encode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    //
    //--------------------------------------------------------------------------------------------------------
    public static function encode(String $str) : String
    {
        return str_replace(array_keys(self::$phpTagChars), array_values(self::$phpTagChars), $str);
    }

    //--------------------------------------------------------------------------------------------------------
    // PHP Tag Decode
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    //
    //--------------------------------------------------------------------------------------------------------
    public static function decode(String $str) : String
    {
        return str_replace(array_values(self::$phpTagChars), array_keys(self::$phpTagChars), $str);
    }

    //--------------------------------------------------------------------------------------------------------
    // PHP Tag Clean
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    //
    //--------------------------------------------------------------------------------------------------------
    public static function tagClean(String $str) : String
    {
        return str_ireplace(['<?php', '<?', '?>'], NULL, $str);
    }
}
