<?php namespace ZN\ViewObjects\Bootstrap;

trait JqueryTrait
{
    //--------------------------------------------------------------------------------------------------------
    // Selector                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    protected $selector = 'this';
    
    //--------------------------------------------------------------------------------------------------------
    // Callback                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    protected $callback = '';
    
    //--------------------------------------------------------------------------------------------------------
    // Tag                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @var bool
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    protected $tag = false;

    //--------------------------------------------------------------------------------------------------------
    // Jquery CDN                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @var bool
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    protected $jqueryCdn = false;

    //--------------------------------------------------------------------------------------------------------
    // Jquery UI CDN                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @var bool
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    protected $jqueryUiCdn = false;

    //--------------------------------------------------------------------------------------------------------
    // Construct                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @param bool $tag
    // @param bool $jqueryCDN
    // @param bool $jqueryUICDN
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function __construct($tag = false, $jqueryCdn = false, $jqueryUiCdn = false)
    {
        $this->tag          = $tag;
        $this->jqueryCdn    = $jqueryCdn;
        $this->jqueryUiCdn  = $jqueryUiCdn;     
    }

    //--------------------------------------------------------------------------------------------------------
    // Selector                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $selector
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function selector(String $selector = 'this')
    {
        $this->selector = $selector;
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Callback                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params
    // @param string $callback
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function callback(String $params, String $callback)
    {
        $this->callback = \JQ::func($params, $callback);
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Func                                                                  
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $params
    // @param string $callback
    //                                                                                        
    //--------------------------------------------------------------------------------------------------------
    public function func(String $params, String $callback)
    {
        $this->callback($params, $callback);
        
        return $this;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected                                                                  
    //--------------------------------------------------------------------------------------------------------
    protected function _tag($code)
    {
        if( $this->tag === true )
        {
            return \Script::open(true, $this->jqueryCdn, $this->jqueryUiCdn).$code.\Script::close();
        }
        
        return $code;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected                                                                  
    //--------------------------------------------------------------------------------------------------------
    protected function _nailConvert($str, $nail = '"')
    {
        if( $nail === '"')
        {
            $str = str_replace('"', "'", $str);
        }
        
        return $str;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected                                                                  
    //--------------------------------------------------------------------------------------------------------
    protected function _boolToStr($bool = true)
    {
        if( $bool == true )
        {
            return 'true';
        }
        elseif( $bool == false )
        {
            return 'false';
        }
        else
        {
            return $bool;   
        }
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected                                                                  
    //--------------------------------------------------------------------------------------------------------
    protected function _isKeySelector($data)
    {
        $keyword  = ['document', 'this', 'window'];
        
        if( in_array($data, $keyword) )
        {
            return true;    
        }
        else
        {
            return false;   
        }
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected                                                                  
    //--------------------------------------------------------------------------------------------------------
    protected function _isFunc($data)
    {
        if( preg_match('/function.*\(.*\)/', $data) )
        {
            return true;    
        }
        else
        {
            return false;   
        }
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected                                                                  
    //--------------------------------------------------------------------------------------------------------
    protected function _isJquery($data)
    {
        if( preg_match('/(\$|jQuery)(\.\w+)*\(.*\)/i', $data) )
        {
            return true;    
        }
        else
        {
            return false;   
        }
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected                                                                  
    //--------------------------------------------------------------------------------------------------------
    protected function _object($array)
    {
        $object = '';
        
        if( is_array($array) )
        {       
            $object  = '';  
            $object .= "{";
            if( ! empty($array)) foreach($array as $k => $v)
            {
                $object .= $k.":".$v.", ";
            }
            $object  = substr($object, 0, -2);
            $object .= "}";
        }
        else
        {
            $object = EOL."\"$array\""; 
        }
        
        return $object;
    }   
    
    //--------------------------------------------------------------------------------------------------------
    // Protected                                                                  
    //--------------------------------------------------------------------------------------------------------
    protected function _params($array = [])
    {
        $implode = '';
        
        if( is_array($array) )
        {
            if( ! empty($array) ) foreach( $array as $v )
            {
                if( ! empty($v) )
                {
                    $implode .= \JQ::stringControl($v).",";
                }
            }
            
            $implode = rtrim($implode, ",");    
        }
        else
        {
            if( ! empty($array) )
            {
                $implode = \JQ::stringControl($array);
            }   
        }
        
        return $implode;
    }
}