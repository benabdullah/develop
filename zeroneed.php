<?php
//--------------------------------------------------------------------------------------------------
// ZERONEED PHP WEB FRAMEWORK
//--------------------------------------------------------------------------------------------------
//
// Author     : Ozan UYKUN <ozanbote@windowslive.com> | <ozanbote@gmail.com>
// Site       : www.znframework.com
// License    : The MIT License
// Copyright  : Copyright (c) 2012-2016, ZN Framework
//
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// Start Micro Time
//--------------------------------------------------------------------------------------------------
$start = microtime();
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// REQUEST_URI
//--------------------------------------------------------------------------------------------------
define('REQUEST_URI', $_SERVER['REQUEST_URI'] ?? NULL);
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// DS
//--------------------------------------------------------------------------------------------------
define('DS', DIRECTORY_SEPARATOR);
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// REAL_BASE_DIR
//--------------------------------------------------------------------------------------------------
define('REAL_BASE_DIR', realpath(__DIR__) . DS);
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// Current Working Dir
//--------------------------------------------------------------------------------------------------
chdir(REAL_BASE_DIR);
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// INTERNAL_DIR
//--------------------------------------------------------------------------------------------------
//
// @return Internal/
//
//--------------------------------------------------------------------------------------------------
define('INTERNAL_DIR', REAL_BASE_DIR . 'Internal' . DS);

//--------------------------------------------------------------------------------------------------
// Base
//--------------------------------------------------------------------------------------------------
require_once INTERNAL_DIR . 'Priority/BaseLevel.php';
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// Invalid PHP Version
//--------------------------------------------------------------------------------------------------
//
// Versiyon Kontrolü Yapılıyor.
//
//--------------------------------------------------------------------------------------------------
if( ! isPhpVersion(REQUIRED_PHP_VERSION) )
{
    trace('Invalid PHP Version! Required PHP version ["'.REQUIRED_PHP_VERSION.'"] and should be over!');
}
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// Require Projects Config File
//--------------------------------------------------------------------------------------------------
define('PROJECTS_CONFIG', require_once PROJECTS_DIR . 'Projects.php');
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// DEFAULT_PROJECT
//--------------------------------------------------------------------------------------------------
//
// @return Frontend/
//
//--------------------------------------------------------------------------------------------------
define('DEFAULT_PROJECT', PROJECTS_CONFIG['directory']['default']);

//--------------------------------------------------------------------------------------------------
// Preloading
//--------------------------------------------------------------------------------------------------
require_once INTERNAL_DIR . 'Priority/HighLevel.php';
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// Application Directory
//--------------------------------------------------------------------------------------------------
$projectDir = PROJECTS_CONFIG['directory']['others'];

if( is_array($projectDir) && ! empty($projectDir[host()]) )
{
    $projectDir = $projectDir[host()];
}
elseif( defined('_CURRENT_PROJECT') )
{
    $flip              = array_flip($projectDir);
    $projectDir        = _CURRENT_PROJECT;
    $currentProjectDir = $flip[$projectDir] ?? $projectDir;
}
elseif( is_array($projectDir) )
{
    $projectDir = DEFAULT_PROJECT;
}

//--------------------------------------------------------------------------------------------------
// Current Project Name
//--------------------------------------------------------------------------------------------------
define('CURRENT_PROJECT', $currentProjectDir ?? $projectDir);
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// Project Directory
//--------------------------------------------------------------------------------------------------
define('PROJECT_DIR', suffix(PROJECTS_DIR . $projectDir, DS));
//--------------------------------------------------------------------------------------------------

if( ! is_dir(PROJECT_DIR) )
{
    trace('["'.$projectDir.'"] Project Directory Not Found!');
}

//--------------------------------------------------------------------------------------------------
// Internal/Core/Required.php
//--------------------------------------------------------------------------------------------------
require_once REQUIRED_FILE;
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// Finish Micro Time
//--------------------------------------------------------------------------------------------------
$finish = microtime();
//--------------------------------------------------------------------------------------------------

if( Config::get('Project', 'benchmark') === true && REQUEST_URI !== NULL )
{
    //----------------------------------------------------------------------------------------------
    // System Elapsed Time Calculating
    //----------------------------------------------------------------------------------------------
    $elapsedTime = $finish - $start;
    //----------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------
    // Get Memory Usage
    //----------------------------------------------------------------------------------------------
    $memoryUsage = memory_get_usage();
    //----------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------
    // Get Maximum Memory Usage
    //----------------------------------------------------------------------------------------------
    $maxMemoryUsage = memory_get_peak_usage();
    //----------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------
    // Template Benchmark Performance Result Table
    //----------------------------------------------------------------------------------------------
    $benchmarkData =
    [
        'elapsedTime'    => $elapsedTime,
        'memoryUsage'    => $memoryUsage,
        'maxMemoryUsage' => $maxMemoryUsage
    ];

    $benchResult = Import::template('BenchmarkTable', $benchmarkData, true);
    //----------------------------------------------------------------------------------------------

    //----------------------------------------------------------------------------------------------
    // Get Benchmark Performance Result Table
    //----------------------------------------------------------------------------------------------
    internalBenchmarkReport($benchResult);
    //----------------------------------------------------------------------------------------------
}
