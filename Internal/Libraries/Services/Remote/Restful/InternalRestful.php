<?php namespace ZN\Services\Remote;

use CURL, Json, URL, XML, CallController;

class InternalRestful extends CallController implements InternalRestfulInterface
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
    // Protected $url
    //--------------------------------------------------------------------------------------------------------
    //
    // @var string
    //
    //--------------------------------------------------------------------------------------------------------
    protected $url;

    //--------------------------------------------------------------------------------------------------------
    // Protected $data
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $data;

    //--------------------------------------------------------------------------------------------------------
    // Url
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    //
    //--------------------------------------------------------------------------------------------------------
    public function url(String $url) : InternalRestful
    {
        $this->url = $url;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Data
    //--------------------------------------------------------------------------------------------------------
    //
    // @param array $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function data(Array $data) : InternalRestful
    {
        $this->data = $data;

        return $this;
    }

    //--------------------------------------------------------------------------------------------------------
    // Get
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    //
    //--------------------------------------------------------------------------------------------------------
    public function get(String $url = NULL)
    {
        $response = CURL::init($this->url ?? $url)
                        ->option('returntransfer', true)
                        ->exec();

        return $this->_result($response);
    }

    //--------------------------------------------------------------------------------------------------------
    // Post
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    // @param array  $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function post(String $url = NULL, Array $data = [])
    {
        $response = CURL::init($this->url ?? $url)
                        ->option('returntransfer', true)
                        ->option('post', true)
                        ->option('postfields', $this->data ?? $data)
                        ->exec();

        return $this->_result($response);
    }

    //--------------------------------------------------------------------------------------------------------
    // Put
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    // @param array  $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function put(String $url = NULL, Array $data = [])
    {
        return $this->_customRequest($url, URL::buildQuery($this->data ?? $data), __FUNCTION__);
    }

    //--------------------------------------------------------------------------------------------------------
    // Delete
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    // @param array  $data
    //
    //--------------------------------------------------------------------------------------------------------
    public function delete(String $url = NULL, Array $data = [])
    {
        return $this->_customRequest($url, $this->data ?? $data, __FUNCTION__);
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Custom Request
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $url
    // @param array  $data
    // @parma string $type
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _customRequest($url, $data, $type)
    {
        $response = CURL::init($this->url ?? $url)
                        ->option('returntransfer', true)
                        ->option('customrequest', strtoupper($type))
                        ->option('postfields', $data)
                        ->exec();

        return $this->_result($response);
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Result
    //--------------------------------------------------------------------------------------------------------
    //
    // @param mixed $response
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _result($response)
    {
        CURL::close();

        $this->_default();

        if( Json::check($response) )
        {
            return Json::decodeObject($response);
        }
        else
        {
            return XML::parseObject($response);
        }
    }

    //--------------------------------------------------------------------------------------------------------
    // Protected Default
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _default()
    {
        $this->url  = NULL;
        $this->data = NULL;
    }
}