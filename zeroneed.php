<?php
//----------------------------------------------------------------------------------------------------
// ZERONEED PHP WEB FRAMEWORK 
//----------------------------------------------------------------------------------------------------
//
// Author     : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
// Site       : www.znframework.com
// License    : The MIT License
// Copyright  : Copyright (c) 2012-2016, ZN Framework
//
//----------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------
// REAL_BASE_DIR
//----------------------------------------------------------------------------------------------------
define('REAL_BASE_DIR', realpath(__DIR__).DIRECTORY_SEPARATOR);

//----------------------------------------------------------------------------------------------------
// INTERNAL_DIR
//----------------------------------------------------------------------------------------------------
//
// @return Internal/
//
//----------------------------------------------------------------------------------------------------
define('INTERNAL_DIR', 'Internal/'); 

//----------------------------------------------------------------------------------------------------
// CORE_DIR
//----------------------------------------------------------------------------------------------------
//
// @return Internal/Core/
//
//----------------------------------------------------------------------------------------------------
define('CORE_DIR', INTERNAL_DIR.'Core/'); 

//----------------------------------------------------------------------------------------------------
// EXTERNAL_DIR
//----------------------------------------------------------------------------------------------------
//
// @return External/
//
//----------------------------------------------------------------------------------------------------
define('EXTERNAL_DIR', 'External/'); 

//----------------------------------------------------------------------------------------------------
// EXTERNAL_CONFIG_DIR
//----------------------------------------------------------------------------------------------------
//
// @return External/Config/
//
//----------------------------------------------------------------------------------------------------
define('EXTERNAL_CONFIG_DIR', EXTERNAL_DIR.'Config/'); 

//----------------------------------------------------------------------------------------------------
// INTERNAL_CONFIG_DIR
//----------------------------------------------------------------------------------------------------
//
// @return Internal/Config/
//
//----------------------------------------------------------------------------------------------------
define('INTERNAL_CONFIG_DIR', INTERNAL_DIR.'Config/'); 

//----------------------------------------------------------------------------------------------------
//  Dahili Uygulama Ayarları
//----------------------------------------------------------------------------------------------------
require_once INTERNAL_CONFIG_DIR.'Applications.php';

global $config;

$application = $config['Applications'];
//----------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------
//  Directory Index
//----------------------------------------------------------------------------------------------------
define('DIRECTORY_INDEX', 'zeroneed.php');
//----------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------
//  Uygulama Türü
//----------------------------------------------------------------------------------------------------
define('APPMODE', strtolower($application['mode']));
//----------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------
//  Ön Yüklenenler
//----------------------------------------------------------------------------------------------------
require_once CORE_DIR.'Preloading.php';
//----------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------
// Available Options: development, restoration or publication
//----------------------------------------------------------------------------------------------------
internalApplicationMode(APPMODE);

//----------------------------------------------------------------------------------------------------
//  Uygulama Dizini
//----------------------------------------------------------------------------------------------------
$appdir = $application['directory']['others'];

if( is_array($appdir) && ! empty($appdir[host()]) )
{
	$appdir = $appdir[host()];
}
elseif( defined('URIAPPDIR') )
{
	$flip   = array_flip($appdir);
	$appdir = URIAPPDIR;
			
	if( ! empty($flip[URIAPPDIR]) )
	{
		define('CURRENT_URIAPPDIR', $flip[URIAPPDIR]);
	}
}
elseif( is_array($appdir) )
{
	$appdir = $application['directory']['default'];	
}

//----------------------------------------------------------------------------------------------------
//  Applications & Restorasyons Directories
//----------------------------------------------------------------------------------------------------
define('APPDIR', suffix(APPLICATIONS_DIR.$appdir));
define('RESDIR', suffix(RESTORATIONS_DIR.$appdir));
//----------------------------------------------------------------------------------------------------

if( ! is_dir(APPDIR) )
{
	exit('"'.$appdir.'" Application Directory Not Found!');
}

//----------------------------------------------------------------------------------------------------
// Benchmarking Test
//----------------------------------------------------------------------------------------------------
$benchmark = $application['benchmark'];	
//----------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------
//  Sisteminin Açılış Zamanını Hesaplamayı Başlat
//------------------------------------------------------------------------------------------------
$start = microtime();
//------------------------------------------------------------------------------------------------

//----------------------------------------------------------------------------------------------------
//  Internal Hierarchy -- Internal/Core/Hierarchy.php
//----------------------------------------------------------------------------------------------------
require_once HIERARCHY_DIR; 
//----------------------------------------------------------------------------------------------------
	
//------------------------------------------------------------------------------------------------
//  Sistemin Açılış Zamanını Hesaplamayı Bitir
//------------------------------------------------------------------------------------------------
$finish = microtime();
//------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------
//  System Elapsed Time Calculating
//------------------------------------------------------------------------------------------------
$elapsedTime = $finish - $start;
//------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------
//  Sistemin Bellek Kullanımını Hesapla
//------------------------------------------------------------------------------------------------
$memoryUsage = memory_get_usage();
//------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------
//  Sistemin Maksimum Bellek Kullanımını Hesapla
//------------------------------------------------------------------------------------------------
$maxMemoryUsage = memory_get_peak_usage();
//------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------
//  Benchmark Performans Sonuç Tablosu
//------------------------------------------------------------------------------------------------
$benchmarkData = 
[
	'elapsedTime'	 => $elapsedTime,
	'memoryUsage'	 => $memoryUsage,
	'maxMemoryUsage' => $maxMemoryUsage
];	

$benchResult = Import::template('BenchmarkTable', $benchmarkData, true);
//------------------------------------------------------------------------------------------------

if( $benchmark === true )
{
	//------------------------------------------------------------------------------------------------
	//  Benchmark Performans Sonuç Tablosu Yazdırılıyor
	//------------------------------------------------------------------------------------------------
	echo $benchResult;
	//------------------------------------------------------------------------------------------------
			
	//------------------------------------------------------------------------------------------------
	//  Sistem benchmark performans test sonuçlarını raporla.
	//------------------------------------------------------------------------------------------------
	report('Benchmarking Test Result', $benchResult, 'BenchmarkTestResults');
	//------------------------------------------------------------------------------------------------
}
else
{
	global $appcon;
	
	if( $appcon['benchmark'] === true ) 
	{
		echo $benchResult;
	}	
}