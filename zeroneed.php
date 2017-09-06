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
// Start
//--------------------------------------------------------------------------------------------------
//
// Microtime
//
//--------------------------------------------------------------------------------------------------
$start = microtime();

//--------------------------------------------------------------------------------------------------
// Current Working Dir
//--------------------------------------------------------------------------------------------------
//
// @return /
//
//--------------------------------------------------------------------------------------------------
chdir(realpath(__DIR__) . DIRECTORY_SEPARATOR);

//--------------------------------------------------------------------------------------------------
// Require Kernel
//--------------------------------------------------------------------------------------------------
//
// All necessary function pats and codes for ZN
//
//--------------------------------------------------------------------------------------------------
require_once 'zerocore.php';
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// Run Kernel
//--------------------------------------------------------------------------------------------------
ZN::run();
//--------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------
// Finish
//--------------------------------------------------------------------------------------------------
//
// Microtime
//
//--------------------------------------------------------------------------------------------------
$finish = microtime();

//--------------------------------------------------------------------------------------------------
// Benchmark Table
//--------------------------------------------------------------------------------------------------
//
// Benchmark
//
//--------------------------------------------------------------------------------------------------
ZN\In::benchmarkReport((float) $start, (float) $finish);
