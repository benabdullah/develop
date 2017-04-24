<?php namespace ZN\Services\Remote;

use CURL, Json, URL, XML;

class InternalRestful implements InternalRestfulInterface
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
    // Protected $info
    //--------------------------------------------------------------------------------------------------------
    //
    // @var array
    //
    //--------------------------------------------------------------------------------------------------------
    protected $info;

    //--------------------------------------------------------------------------------------------------------
    // Magic Call
    //--------------------------------------------------------------------------------------------------------
    //
    // @param string $method
    // @param array  $parameters
    //
    //--------------------------------------------------------------------------------------------------------
    public function __call($method, $parameters)
    {
        return $this->info($method);
    }

    //--------------------------------------------------------------------------------------------------------
    // Info
    //--------------------------------------------------------------------------------------------------------
    //
    // @param void
    //
    //--------------------------------------------------------------------------------------------------------
    public function info(String $key = NULL)
    {
        return $key === NULL ? $this->info : ($this->info[$key] ?? false);
    }

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
    // Protected Info
    //--------------------------------------------------------------------------------------------------------
    //
    // @param mixed $response
    //
    //--------------------------------------------------------------------------------------------------------
    protected function _info()
    {
        $this->info['getHttpCode']          = CURL::info('http_code');
        $this->info['getFileTime']          = CURL::info('filetime');
        $this->info['getTotalTime']         = CURL::info('total_time');
        $this->info['getPretransferTime']   = CURL::info('pretransfer_time');
        $this->info['getStartTransferTime'] = CURL::info('starttransfer_time');
        $this->info['getRedirectTime']      = CURL::info('redirect_time');
        $this->info['getUploadSize']        = CURL::info('size_upload');
        $this->info['getDownloadSize']      = CURL::info('size_download');
        $this->info['getRequestSize']       = CURL::info('request_size');
        $this->info['getDownloadSpeed']     = CURL::info('speed_download');
        $this->info['getUploadSpeed']       = CURL::info('speed_upload');
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
        $this->_info();

        CURL::close();

        $this->_default();

        if( Json::check($response) )
        {
            return Json::decodeObject($response);
        }
        elseif( XML::check($response) )
        {
            return XML::parseObject($response);
        }
        else
        {
            return false;
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
