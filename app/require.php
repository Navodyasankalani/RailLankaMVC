<?php 

	//Require libraries from the folder libraries
	require_once 'libraries/Core.php';
	require_once 'libraries/Controller.php';
	require_once 'libraries/Database.php';

	require_once 'helpers/session_helper.php';

	require_once 'config/config.php';
	date_default_timezone_set("Asia/Colombo");
	
	//Instantiate core class
	$init = new Core();


