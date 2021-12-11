<?php

$this->group([

	/**
	*
	* Backend routes main config
	*/
	'namespace' => "Frontend", 
	'as' => "frontend.", 
	// 'prefix'	=> "admin",
	// 'middleware' => "", 

	], function(){

		
		$this->get('/', ['as' => "main",'uses' => "MainController@index"]);
		

	



		
	
});