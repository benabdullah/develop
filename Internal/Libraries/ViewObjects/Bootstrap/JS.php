<?php
namespace ZN\ViewObjects\Javascript;

class InternalJS extends \CallController
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
	// Interval 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $time
	// @param  string $code
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function interval(String $time, String $code, Bool $comma = true) : String 
	{
		return $this->_jsFunc('setInterval', "$code, $time", $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Timeout 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $time
	// @param  string $code
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function timeout(String $time, String $code, Bool $comma = true) : String 
	{
		return $this->_jsFunc('setTimeout', "$code, $time", $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// indexOf 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function indexOf(String $str, String $find, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).indexOf", $find, $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// indexOf 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arrayIndexOf(String $str, String $find, Bool $comma = true) : String
	{
		return $this->_jsFunc("Array($str).indexOf", $find, $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Join 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arrayJoin(String $str, String $find, Bool $comma = true) : String
	{
		return $this->_jsFunc("Array($str).join", $find, $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// lastIndexOf 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function lastIndexOf(String $str, String $find, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).lastIndexOf", $find, $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// lastIndexOf 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arrayLastIndexOf(String $str, String $find, Bool $comma = true) : String
	{
		return $this->_jsFunc("Array($str).lastIndexOf", $find, $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// arraySplice 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $p1
	// @param  string $p2
	// @param  string $p3
	// @param  string $p4
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arraySplice(String $str, String $p1 = NULL, String $p2 = NULL, String $p3 = NULL, String $p4 = NULL, Bool $comma = true) : String
	{
		$param[] = $p1;
		$param[] = $p2;
		$param[] = $p3;
		$param[] = $p4;

		return $this->_jsFunc("Array($str).splice", implode(",", array_diff($param, [''])), $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// length 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function length(String $str, Bool $comma = true) : String
	{
		return "String($str).length".($comma === true ? ';' : '');
	}
	
	//----------------------------------------------------------------------------------------------------
	// length 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arrayLength(String $str, Bool $comma = true) : String
	{
		return "Array($str).length".($comma === true ? ';' : '');
	}
	
	//----------------------------------------------------------------------------------------------------
	// arrayUnshift 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arrayUnshift(Sting $str, String $find, Bool $comma = true) : String 
	{
		return $this->_jsFunc("Array($str).unshift", $find, $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// arrayUnshift 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arraySort(Sting $str, String $find, Bool $comma = true) : String 
	{
		return $this->_jsFunc("Array($str).sort", $find, $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// pop 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arrayPop(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("Array($str).pop", $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Reverse 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arrayReverse(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("Array($str).reverse", $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// toString 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arrayToString(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("Array($str).toString", $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Shift 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arrayShift(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("Array($str).shift", $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// push 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arrayPush($str = '', $param = '', $comma = true) : String
	{
		return $this->_jsFunc("Array($str).push", $param, $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// search 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $find
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function search(String $str, String $find, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).search", $find, $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// slice 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function slice(String $str, String $p1, String $p2 = NULL, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).slice", "$p1, $p2" , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// slice 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arraySlice(String $str, String $p1, String $p2 = NULL, Bool $comma = true) : String
	{
		return $this->_jsFunc("Array($str).slice", "$p1, $p2" , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// substr 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function substr(String $str, String $p1, String $p2 = NULL, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).substr", "$p1, $p2" , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// substring 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function substring(String $str, String $p1, String $p2 = NULL, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).substring", "$p1, $p2" , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// replace 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function replace(String $str, String $p1, String $p2 = NULL, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).replace", "$p1, $p2" , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Upper Case 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function upperCase(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).toUpperCase", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Lowe Case 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function lowerCase(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).toLowerCase", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// concat 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function concat(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).concat", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// concat 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function arrayConcat(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Array($str).concat", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// charAt 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function charAt(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).charAt", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// charCodeAt 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function codeAt(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).charCodeAt", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// split 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function split(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).split", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// localeCompare 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function localeCompare(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).localeCompare", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// match 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function match(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).match", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// trim 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function trim(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).trim", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// anchor 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function anchor(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).anchor", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// fontcolor 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function fontColor(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).fontcolor", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// fontsize 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function fontSize(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).fontsize", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// link 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function link(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).link", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// big 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function big(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).big", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// small 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function small(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).small", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// strike 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function strike(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).strike", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// sub 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function sub(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).sub", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// sup 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function sup(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).sup", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// toString 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function toString(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("Number($str).toString", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// valueOf 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function valueOf(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("Number($str).valueOf", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// toExponential 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function toExponential(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Number($str).toExponential", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// toFixed 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function toFixed(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Number($str).toFixed", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// toPrecision 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function toPrecision(String $str, String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Number($str).toPrecision", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// sqrt 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function sqrt(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.sqrt", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// abs 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function abs(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.abs", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// acos 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function acos(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.acos", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// asin 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function asin(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.asin", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// atan 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function atan(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.atan", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// atan2 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function atan2(String $p1, String $p2 = NULL, Bool $comma = true) : String
	{
		$param[] = $p1;
		$param[] = $p2;

		return $this->_jsFunc("Math.atan2", "$p1, $p2" , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// ceil 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function ceil(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.ceil", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// cos 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function cos(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.cos", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// exp 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function exp(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.exp", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// floor 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function floor(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.floor", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// log 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function log(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.log", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// max 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function max(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.max", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// round 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function round(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.round", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// sin 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function sin(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.sin", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// tan 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function tan(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.tan", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// random 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function random(Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.random", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// min 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function min(String $param, Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.min", $param , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// pow 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function pow(String $p1, String $p2 = NULL, Bool $comma = true) : String
	{
		$param[] = $p1;
		$param[] = $p2;

		return $this->_jsFunc("Math.pow", "$p1, $p2" , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// pi 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function pi(Bool $comma = true) : String
	{
		return $this->_jsFunc("Math.pi", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// blink 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function blink(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).blink", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// bold 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function bold(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).bold", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// fixed 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function fixed(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).fixed", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// italic 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function italic(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String($str).italics", '' , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// fromCharCode 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $str
	// @param  string $param
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function ascii(String $str, Bool $comma = true) : String
	{
		return $this->_jsFunc("String.fromCharCode", $str , $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// define 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $varname
	// @param  string $value
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function define(String $varname, String $value, String $operator = '=') : String
	{
		return EOL.'var '.$varname.' '.$operator.' '.suffix(trim($value, EOL), ';');
	}
	
	//----------------------------------------------------------------------------------------------------
	// Function 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $varname
	// @param  string $value
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function defineFunc(String $funcname, String $param = NULL, String $code = NULL) : String 
	{
		return EOL.'function '.$funcname.' ('.$param.') {'.$code.'}'.EOL;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Function 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $varname
	// @param  string $value
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function func(String $funcname, String $param = NULL) : String
	{
		return $funcname.'('.$param.');';
	}
	
	//----------------------------------------------------------------------------------------------------
	// Alert 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $code
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function alert(String $code, Bool $comma = true) : String
	{
		return $this->_jsFunc('alert', $code, $comma);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Confirm 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $code
	// @param  string $true
	// @param  string $false
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function confirm(String $code, String $true = NULL, String $false = NULL) : String
	{
		 $confirm = $this->_jsFunc('confirm', \JQ::stringControl($code), false);
		 
		 if( empty($true) )
		 {
			 return "$confirm;";
		 }
		 
		 return $this->ifClause("$confirm === true", $true).$this->elseClause($false);
	}
	
	//----------------------------------------------------------------------------------------------------
	// If Clause 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $condition
	// @param  string $code
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function ifClause(String $condition, String $code = NULL , String $elseCode = NULL) : String
	{
		$elseCode = ! empty($elseCode) ? $this->elseClause($elseCode) : '';
		
		return $this->_clause('if', $condition, $code).$elseCode;
	}
	
	//----------------------------------------------------------------------------------------------------
	// Else If Clause 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $condition
	// @param  string $code
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function elseIfClause(String $condition, String $code = NULL) : String
	{
		return $this->_clause('else if', $condition, $code);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Else Clause 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $code
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function elseClause(String $code) : String
	{
		return "else{".$code."}";
	}
	
	//----------------------------------------------------------------------------------------------------
	// For Loop 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $condition
	// @param  string $code
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function forLoop(String $condition, String $code = NULL) : String
	{
		return $this->_clause('for', $condition, $code);
	}
	
	//----------------------------------------------------------------------------------------------------
	// While Loop 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $condition
	// @param  string $code
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function whileLoop(String $condition, String $code = NULL) : String
	{
		return $this->_clause('while', $condition, $code);
	}
	
	//----------------------------------------------------------------------------------------------------
	// Do While Loop
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $condition
	// @param  string $code
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function doWhileLoop(String $condition, String $code = NULL) : String
	{
		return "do{".$code."}while(".$condition.")";
	}
	
	//----------------------------------------------------------------------------------------------------
	// Switch Clause 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $condition
	// @param  array  $cases
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function switchClause(String $condition, Array $cases) : String
	{
		$clause = '';
		
		if( ! empty($cases) ) foreach( $cases as $case => $code )
		{
			if( $case !== 'multiple' )
			{
				if( $case !== 'default' )
				{
					$clause .= "case $case : $code break; ";
				}
				else
				{
					$clause .= "$case : $code";
				}
			}
			else
			{
				$multiple = isset($code[0]) ?  $code[0] : [];
				$mcode    = isset($code[1]) ?  $code[1] : '';
				
				if( ! empty($multiple) ) foreach( $multiple as $val )
				{
					$clause .= "case $val : ";	
				}
				
				$clause .= "$mcode break; ";
			}
		}
		
		return "switch($condition){".$clause."}";
	}

	//----------------------------------------------------------------------------------------------------
	// Protected Js Func
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $func
	// @param  string $code
	// @param  bool   $comma
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	protected function _jsFunc($func, $code, $comma = false)
	{
		return "$func($code)".($comma === true ? ";" : "");
	}

	//----------------------------------------------------------------------------------------------------
	// Protected Clause 
	//----------------------------------------------------------------------------------------------------
	//
	// @param  string $type
	// @param  string $condition
	// @param  string $code
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	protected function _clause($type = '', $condition = '', $code = '')
	{
		$eol = EOL;
		return $this->_jsFunc($type, $condition, false)."{".$code."}";
	}
}