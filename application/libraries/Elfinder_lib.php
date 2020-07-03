<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once __DIR__.DIRECTORY_SEPARATOR.'Elfinder/elFinderConnector.class.php';
include_once __DIR__.DIRECTORY_SEPARATOR.'Elfinder/elFinder.class.php';
include_once __DIR__.DIRECTORY_SEPARATOR.'Elfinder/elFinderVolumeDriver.class.php';
include_once __DIR__.DIRECTORY_SEPARATOR.'Elfinder/elFinderVolumeLocalFileSystem.class.php';

class Elfinder_lib {
	
	protected $CI;
	
	public function __construct($opts) 
	{
		$this->CI =& get_instance();
		$connector = new elFinderConnector(new elFinder($opts));
		$connector->run();
	}
}
