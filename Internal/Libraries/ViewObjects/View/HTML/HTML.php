<?php namespace ZN\ViewObjects\View;

class InternalHTML extends \CallController implements HTMLInterface, ViewCommonInterface
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
    // Common
    //--------------------------------------------------------------------------------------------------------
    // 
    // attributes()
    // _input()
    //
    //--------------------------------------------------------------------------------------------------------
    use ViewCommonTrait;
    
    //--------------------------------------------------------------------------------------------------------
    // Audio
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $src
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function audio(String $src, String $content = NULL, Array $attributes = []) : String
    {
        return $this->_mediaContent($src, $content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Video
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $src
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function video(String $src, String $content = NULL, Array $attributes = []) : String
    {
        return $this->_mediaContent($src, $content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Embed
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $src
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function embed(String $src, Array $attributes = []) : String
    {
        return $this->_media($src, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Source
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $src
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function source(String $src, Array $attributes = []) : String
    {
        return $this->_media($src, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Bold
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function bold(String $str, Array $attributes = []) : String
    {
        return $this->_multiElement('b', $str, $attributes);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Strong
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function strong(String $str, Array $attributes = []) : String
    {
        return $this->_multiElement(__FUNCTION__, $str, $attributes);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Italic
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function italic(String $str, Array $attributes = []) : String
    {
        return $this->_multiElement('em', $str, $attributes);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Image
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $str
    // @param int    $width
    // @param int    $height
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function image(String $src, Int $width = NULL, Int $height = NULL, Array $attributes = []) : String
    {
        if( ! isUrl($src) ) 
        {
            $src = baseUrl($src);
        }

        if( ! empty($width) )
        {
            $attributes['width'] = $width;
        }

        if( ! empty($height) )
        {
            $attributes['height'] = $height;
        }
        
        if( ! isset($attributes['title']) )
        { 
            $attributes['title'] = '';
        }
        
        if( ! isset($attributes['alt']) )
        { 
            $attributes['alt'] = '';
        }
        
        return $this->_singleElement('img', $attributes);   
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Label
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string $for
    // @param  string $value
    // @param  string $form
    // @param  array  $attributes
    // @return string
    //
    //--------------------------------------------------------------------------------------------------------
    public function label(String $for, String $value = NULL, String $form = NULL, Array $attributes = []) : String
    {
        if( ! empty($for) ) 
        {
            $attributes['for'] = $for;
        }
        
        if( ! empty($form) ) 
        {   
            $attributes['form'] = $form;
        }

        return $this->_multiElement(__FUNCTION__, $value, $attributes);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Canvas
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string $for
    // @param  array  $attributes
    // @return string
    //
    //--------------------------------------------------------------------------------------------------------
    public function canvas(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Aside
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string $html
    //
    //--------------------------------------------------------------------------------------------------------
    public function aside(String $html) : String
    {
        return $this->_content($html, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Article
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string $html
    //
    //--------------------------------------------------------------------------------------------------------
    public function article(String $html) : String
    {
        return $this->_content($html, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Footer
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string $html
    //
    //--------------------------------------------------------------------------------------------------------
    public function footer(String $html) : String
    {
        return $this->_content($html, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Header
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string $html
    //
    //--------------------------------------------------------------------------------------------------------
    public function header(String $html) : String
    {
        return $this->_content($html, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Nav
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string $html
    //
    //--------------------------------------------------------------------------------------------------------
    public function nav(String $html) : String
    {
        return $this->_content($html, __FUNCTION__);
    }   
    
    //--------------------------------------------------------------------------------------------------------
    // Section
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param  string $html
    //
    //--------------------------------------------------------------------------------------------------------
    public function section(String $html) : String
    {
        return $this->_content($html, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Anchor
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $url
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function anchor(String $url, String $value = NULL, Array $attributes = []) : String
    {
        if( ! isUrl($url) && strpos($url, '#') !== 0 )
        { 
            $url = siteUrl($url);
        }

        $attributes['href'] = $url;

        nullCoalesce($value, $url);

        return $this->_multiElement('a', $value, $attributes);  
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Mail To
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $mail
    // @param string $value
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function mailTo(String $mail, String $value = NULL, Array $attributes = []) : String
    {
        if( ! isEmail($mail) ) 
        {
            return \Exceptions::throws('Error', 'emailParameter', 'mail');
        }

        $attributes['href'] = 'mailto:'.$mail;
        
        nullCoalesce($value, $mail);

        return $this->_multiElement('a', $value, $attributes);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Parag
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $str
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function parag(String $str = NULL, Array $attributes = []) : String
    {   
        return $this->_multiElement('p', $str, $attributes);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Over Line
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $str
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function overLine(String $str, Array $attributes = []) : String
    {
        return $this->_multiElement('del', $str, $attributes);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Over Text
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $str
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function overText(String $str, Array $attributes = []) : String
    {
        return $this->_multiElement('sup', $str, $attributes);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Under Line
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $str
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function underLine(String $str, Array $attributes = []) : String
    {
        return $this->_multiElement('u', $str, $attributes);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Under Text
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $str
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function underText(String $str, Array $attributes = []) : String
    {
        return $this->_multiElement('sub', $str, $attributes);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Font
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $str
    // @param string $size
    // @param string $color
    // @param string $face
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function font(String $str, String $size = NULL, String $color = NULL, String $face = NULL, Array $attributes = []) : String
    {
        if( ! empty($size) )
        {
            $attributes['size'] = $size;
        }

        if( ! empty($color) )
        {
            $attributes['color'] = $color;
        }

        if( ! empty($face) )
        {
            $attributes['face'] = $face;
        }

        return $this->_multiElement('font', $str, $attributes);
    }   
    
    //--------------------------------------------------------------------------------------------------------
    // Hgroup
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $html
    //
    //--------------------------------------------------------------------------------------------------------
    public function hgroup(String $html) : String
    {
        return $this->_content($html, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // BR
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param int $cunt
    //
    //--------------------------------------------------------------------------------------------------------
    public function br(Int $count = 1) : String
    {
        return str_repeat($this->_singleElement(__FUNCTION__), $count);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Space
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param int $count
    //
    //--------------------------------------------------------------------------------------------------------
    public function space(Int $count = 4) : String
    {
        return str_repeat("&nbsp;", $count);
    }

    //--------------------------------------------------------------------------------------------------------
    // Heading
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $str
    // @param int    $type
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function heading(String $str, Int $type = 3, Array $attributes = []) : String
    {
        return $this->_multiElement('h'.$type, $str, $attributes);
    }   
    
    //--------------------------------------------------------------------------------------------------------
    // Element
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $element
    // @param string $str
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function element(String $element, String $str = NULL, Array $attributes = []) : String
    {
        return $this->_multiElement($element, $str, $attributes);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Multi Attr
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $element
    // @param array  $array
    //
    //--------------------------------------------------------------------------------------------------------
    public function multiAttr(String $str, Array $array = []) : String
    {
        if( is_array($array) )
        {
            $open = '';
            $close = '';
            $att = '';
            
            foreach( $array as $k => $v )
            {
                if( ! is_numeric($k) )
                {
                    $element = $k;  
                    
                    if( ! is_array($v) )
                    {
                        $att = ' '.$v;
                    }
                    else
                    {
                        $att = $this->attributes($v);   
                    }
                }
                else
                {
                    $element = $v;  
                }
                
                $open .= '<'.$element.$att.'>';
                $close = '</'.$element.'>'.$close;
            }
        }
        else
        {
            return $str;
        }
        
        return $open.$str.$close;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Meta
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param mixec  $name
    // @param string $content
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    public function meta($name, String $content = NULL, String $type = 'name') : String
    {
        if( ! is_array($name) )
        {
            if( $type === 'name' ) 
            {
                $name = ' name="'.$name.'"'; 
            }
            elseif( $type === 'http' )
            { 
                $name = ' http-equiv="'.$name.'"'; 
            }
            
            if( ! empty($content) ) 
            {
                $content = ' content="'.$content.'"';   
            }
            else
            { 
                $content = '';
            }
            
            return '<meta'.$name.$content.' />'."\n";
        }
        else
        {
            $metas = '';
            
            foreach( $name as $val )
            {
                if( ! isset($val['name']) )
                { 
                    $val['name'] = '';
                }
                
                if( ! isset($val['content']) ) 
                {
                    $val['content'] = '';
                }
                
                if( ! isset($val['type']) )
                { 
                    $val['type'] = 'name';
                }
                
                if( $val['type'] === 'http' )
                { 
                    $type = ' http-equiv="'.$val['name'].'"';
                }
                
                if( $val['type'] === 'name' )
                {
                    $type = ' name="'.$val['name'].'"';         
                }
                
                if( ! empty($val['content']) )
                {
                    $content = ' content="'.$val['content'].'"';
                }
                else
                {
                    $content = '';
                }
                
                $metas .= '<meta'.$type.$content.' />'."\n";
            }
                
            return $metas;
        }
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Command
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function command(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Data List
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function dataList(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Details
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function details(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Dialog
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function dialog(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Fig Caption
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function figCaption(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Figure
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function figure(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Keygen
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function keygen(Array $attributes = []) : String
    {
        return $this->_singleElement(__FUNCTION__, $attributes);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Mark
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function mark(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Meter
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function meter(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Time
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function time(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Summary
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function summary(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Progress
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function progress(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Output
    //--------------------------------------------------------------------------------------------------------
    // 
    // @param string $content
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    public function output(String $content, Array $attributes = []) : String
    {
        return $this->_contentAttribute($content, $attributes, __FUNCTION__);
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected Content
    //--------------------------------------------------------------------------------------------------------
    protected function _content($html, $type)
    {
        $type = strtolower($type);
        
        $str = "<$type>$html</$type>";
        
        return $str;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected Content Attribute
    //--------------------------------------------------------------------------------------------------------
    protected function _contentAttribute($content, $_attributes, $type)
    {
        if( ! is_scalar($content) )  
        {
            $content = '';
        }

        $type = strtolower($type);
        
        return '<'.$type.$this->attributes($_attributes).'>'.$content."</$type>".EOL;
    }   
    
    //--------------------------------------------------------------------------------------------------------
    // Protected Media
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $src
    // @param array  $attributes
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _media($src, $_attributes, $type)
    {
        return '<'.strtolower($type).'src="'.$src.'"'.$this->attributes($_attributes).'>'.EOL;
    }
    
    //--------------------------------------------------------------------------------------------------------
    // Protected Media Content
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $src
    // @param string $content
    // @param array  $attributes
    // @param string $type
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _mediaContent($src, $content, $_attributes, $type)
    {
        $type = strtolower($type);

        return '<'.$type.'src="'.$src.'"'.$this->attributes($_attributes).'>'.$content."</$type>".EOL;
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Element
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $element
    // @param string $str
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _multiElement($element, $str, $attributes = [])
    {
        $element = strtolower($element);

        return '<'.$element.$this->attributes($attributes).'>'.$str.'</'.$element.'>';
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Single Element
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $element
    // @param array  $attributes
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _singleElement($element, $attributes = [])
    {
        return '<'.strtolower($element).$this->attributes($attributes).'>';
    }
}