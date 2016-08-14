<?php namespace ZN\ViewObjects\Jquery\Helpers;

use ZN\ViewObjects\JqueryTrait;

class Action extends \CallController
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
	// Jquery Trait                                                                 
	//--------------------------------------------------------------------------------------------------------
	//
	// @methods
	//																						  
	//--------------------------------------------------------------------------------------------------------
	use JqueryTrait;
	
	//--------------------------------------------------------------------------------------------------------
	// Type                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @var string
	//																						  
	//--------------------------------------------------------------------------------------------------------
	protected $type	= 'show';
	
	//--------------------------------------------------------------------------------------------------------
	// Speed                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @var string
	//																						  
	//--------------------------------------------------------------------------------------------------------
	protected $speed = '';
	
	//--------------------------------------------------------------------------------------------------------
	// Easing                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @var string
	//																						  
	//--------------------------------------------------------------------------------------------------------
	protected $easing = '';
	
	//--------------------------------------------------------------------------------------------------------
	// Speed                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @param scalar $speed
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function speed(String $speed) : Action
	{
		$this->speed = $speed;
		
		return $this;
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Duration                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @param scalar $speed
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function duration(String $speed) : Action
	{
		$this->speed($speed);
		
		return $this;
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Easing                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @param string $data
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function easing(String $data) : Action
	{
		$this->easing = $data;
		
		return $this;
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Type                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @param string $type
	//																						  
	//--------------------------------------------------------------------------------------------------------
 	public function type(String $type = 'show') : Action
	{
		$this->type = $type;
		
		return $this;
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Show                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @param string $selector
	// @param scalar $speed
	// @param string $callback
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function show(String $selector = NULL, String $speed = NULL, String $callback = NULL) : String
	{
		$this->_effect(__FUNCTION__, $selector, $speed, $callback);
		
		return $this->create();
	}
	
	//--------------------------------------------------------------------------------------------------------
	// hİDE                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @param string $selector
	// @param scalar $speed
	// @param string $callback
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function hide(String $selector = NULL, String $speed = NULL, String $callback = NULL) : String
	{
		$this->_effect(__FUNCTION__, $selector, $speed, $callback);
		
		return $this->create();
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Fade In                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @param string $selector
	// @param scalar $speed
	// @param string $callback
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function fadeIn(String $selector = NULL, String $speed = NULL, String $callback = NULL) : String
	{
		$this->_effect(__FUNCTION__, $selector, $speed, $callback);
		
		return $this->create();
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Fade Out                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @param string $selector
	// @param scalar $speed
	// @param string $callback
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function fadeOut(String $selector = NULL, String $speed = NULL, String $callback = NULL) : String
	{
		$this->_effect(__FUNCTION__, $selector, $speed, $callback);
		
		return $this->create();
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Fade To                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @param string $selector
	// @param scalar $speed
	// @param string $callback
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function fadeTo(String $selector = NULL, String $speed = NULL, String $callback = NULL) : String
	{
		$this->_effect(__FUNCTION__, $selector, $speed, $callback);
		
		return $this->create();
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Slide Up                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @param string $selector
	// @param scalar $speed
	// @param string $callback
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function slideUp(String $selector = NULL, String $speed = NULL, String $callback = NULL) : String
	{
		$this->_effect(__FUNCTION__, $selector, $speed, $callback);
		
		return $this->create();
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Slide Down                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @param string $selector
	// @param scalar $speed
	// @param string $callback
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function slideDown(String $selector = NULL, String $speed = NULL, String $callback = NULL) : String
	{
		$this->_effect(__FUNCTION__, $selector, $speed, $callback);
		
		return $this->create();
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Slide Toggle                                                              
	//--------------------------------------------------------------------------------------------------------
	//
	// @param string $selector
	// @param scalar $speed
	// @param string $callback
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function slideToggle(String $selector = NULL, String $speed = NULL, String $callback = NULL) : String
	{
		$this->_effect(__FUNCTION__, $selector, $speed, $callback);
		
		return $this->create();
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Complete                                                             
	//--------------------------------------------------------------------------------------------------------
	//
	// @param void
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function complete() : String
	{
		$event = \JQ::property($this->type, [$this->speed, $this->easing, $this->callback]);
		
		$this->_defaultVariable();
		
		return $event;
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Create                                                             
	//--------------------------------------------------------------------------------------------------------
	//
	// @param string variadic $args
	//																						  
	//--------------------------------------------------------------------------------------------------------
	public function create(...$args) : String
	{
		$combineEffect = $args;
		
		$event  = EOL.\JQ::selector($this->selector);
		$event .= $this->complete();
		
		if( ! empty($combineEffect) ) foreach($combineEffect as $effect)
		{			
			$event .= $effect;
		}
		
		$event .= ";";

		return $this->_tag($event);
	}

	//--------------------------------------------------------------------------------------------------------
	// Protected                                                              
	//--------------------------------------------------------------------------------------------------------
	protected function _effect($type = '', $selector = '', $speed = '', $callback = '')
	{
		$this->type = $type;
		
		if( ! empty($selector))
		{
			$this->selector($selector);	
		}
		
		if( ! empty($speed))
		{
			$this->speed($speed);	
		}
		
		if( ! empty($callback))
		{
			$this->callback('e', $callback);	
		}
	}
	
	//--------------------------------------------------------------------------------------------------------
	// Protected                                                              
	//--------------------------------------------------------------------------------------------------------
	protected function _defaultVariable()
	{
		$this->selector = 'this';
		$this->type		= 'show';
		$this->callback = '';
		$this->speed 	= '';
		$this->easing   = '';	
	}
}