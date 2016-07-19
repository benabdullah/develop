<?php 
namespace ZN\EncodingSupport;

interface MLInterface
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
	// Insert
	//----------------------------------------------------------------------------------------------------
	//
	// Dil dosyasına kelime eklemek için kullanılır.
	// @param string $app 
	// @param mixed  $key
	// @param string $data
	//
	//----------------------------------------------------------------------------------------------------
	public function insert($app, $key, $data);
	
	//----------------------------------------------------------------------------------------------------
	// Delete
	//----------------------------------------------------------------------------------------------------
	//
	// Silinecek dil dosyası.
	// @param string $app 
	// @param mixed  $key
	//
	// @return bool
	//
	//----------------------------------------------------------------------------------------------------
	public function delete($app, $key);
	
	//----------------------------------------------------------------------------------------------------
	// Delete All
	//----------------------------------------------------------------------------------------------------
	//
	// Silinecek dil dosyası.
	// @param string $app 
	//
	//----------------------------------------------------------------------------------------------------
	public function deleteAll($app);
	
	//----------------------------------------------------------------------------------------------------
	// Update
	//----------------------------------------------------------------------------------------------------
	//
	// Dil dosyasında yer alan bir kelimeyi güncellemek için kullanılır.
	// @param string $app 
	// @param mixed  $key
	// @param string $data
	//
	//----------------------------------------------------------------------------------------------------
	public function update($app, $key, $data);
	
	//----------------------------------------------------------------------------------------------------
	// Select
	//----------------------------------------------------------------------------------------------------
	//
	// Dil dosyasın yer alan istenilen kelimeye erişmek için kullanılır.
	// @param mixed $key 
	// @return string
	//
	//----------------------------------------------------------------------------------------------------
	public function select($key, $convert);
	
	//----------------------------------------------------------------------------------------------------
	// Lang
	//----------------------------------------------------------------------------------------------------
	//
	// Sayfanın aktif dilini ayarlamak için kullanılır.
	// @param string $lang 
	// @return bool
	//
	//----------------------------------------------------------------------------------------------------
	public function lang($lang);
}