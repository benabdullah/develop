<?php
namespace ZN\Services;

interface HTTPInterface
{
	//----------------------------------------------------------------------------------------------------
	//
	// Yazar      : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
	// Site       : www.zntr.net
	// Lisans     : The MIT License
	// Telif Hakkı: Copyright (c) 2012-2016, zntr.net
	//
	//----------------------------------------------------------------------------------------------------
	
	//----------------------------------------------------------------------------------------------------
	// Is Ajax
	//----------------------------------------------------------------------------------------------------
	// 
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function isAjax();
	
	//----------------------------------------------------------------------------------------------------
	// Browser Lang
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $default tr
	// @param void
	//
	//----------------------------------------------------------------------------------------------------
	public function browserLang($default);
	
	//----------------------------------------------------------------------------------------------------
	// Code
	//----------------------------------------------------------------------------------------------------
	// 
	// @param numeric $code
	//
	//----------------------------------------------------------------------------------------------------
	public function code($code);
	
	//----------------------------------------------------------------------------------------------------
	// Message
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $message
	//
	//----------------------------------------------------------------------------------------------------
	public function message($message);
	
	//----------------------------------------------------------------------------------------------------
	// Name
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function name($name);
	
	//----------------------------------------------------------------------------------------------------
	// Value
	//----------------------------------------------------------------------------------------------------
	// 
	// @param mixed $value
	//
	//----------------------------------------------------------------------------------------------------
	public function value($value);
	
	//----------------------------------------------------------------------------------------------------
	// Input
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $input
	//
	//----------------------------------------------------------------------------------------------------
	public function input($input);
	
	//----------------------------------------------------------------------------------------------------
	// Select
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function select($name);
	
	//----------------------------------------------------------------------------------------------------
	// Insert
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	// @param string $value
	//
	//----------------------------------------------------------------------------------------------------
	public function insert($name, $value);
	
	//----------------------------------------------------------------------------------------------------
	// Delete
	//----------------------------------------------------------------------------------------------------
	// 
	// @param string $name
	//
	//----------------------------------------------------------------------------------------------------
	public function delete($name);
}