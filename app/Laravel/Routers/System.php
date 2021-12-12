<?php

$this->group([

	/**
	*
	* Backend routes main config
	*/
	'namespace' => "System", 
	'as' => "system.", 
	'prefix'	=> "admin",
	// 'middleware' => "", 

], function(){

	$this->group(['middleware' => ["web","system.guest"]], function(){
		$this->get('register/{_token?}',['as' => "register",'uses' => "AuthController@register"]);
		$this->post('register/{_token?}',['uses' => "AuthController@store"]);
		$this->get('login/{redirect_uri?}',['as' => "login",'uses' => "AuthController@login"]);
		$this->post('login/{redirect_uri?}',['uses' => "AuthController@authenticate"]);
	});

	$this->group(['middleware' => ["web","system.auth","system.client_partner_not_allowed"]], function(){
		
		$this->get('logout',['as' => "logout",'uses' => "AuthController@destroy"]);


		$this->group(['middleware' => ["system.update_profile_first"]], function() {

			$this->group(['prefix' => "areas", 'as' => "areas."], function () {
				$this->get('/',['as' => "index", 'uses' => "AreasController@index"]);
				$this->get('create',['as' => "create", 'uses' => "AreasController@create"]);
				$this->post('create',['uses' => "AreasController@store"]);
				$this->get('edit/{id?}',['as' => "edit", 'uses' => "AreasController@edit"]);
				$this->get('preview/{id?}',['as' => "preview", 'uses' => "AreasController@preview"]);
				$this->post('edit/{id?}',['uses' => "AreasController@update"]);
				$this->any('delete/{id?}',['as' => "destroy", 'uses' => "AreasController@destroy"]);
			});

			$this->group(['prefix' => "category", 'as' => "category."], function () {
				$this->get('/',['as' => "index", 'uses' => "CategoryController@index"]);
				$this->get('create',['as' => "create", 'uses' => "CategoryController@create"]);
				$this->post('create',['uses' => "CategoryController@store"]);
				$this->get('edit/{id?}',['as' => "edit", 'uses' => "CategoryController@edit"]);
				$this->post('edit/{id?}',['uses' => "CategoryController@update"]);
				$this->any('delete/{id?}',['as' => "destroy", 'uses' => "CategoryController@destroy"]);
			});

			$this->group(['prefix' => "product", 'as' => "product."], function () {
				$this->get('/',['as' => "index", 'uses' => "ProductController@index"]);
				$this->get('create',['as' => "create", 'uses' => "ProductController@create"]);
				$this->post('create',['uses' => "ProductController@store"]);
				$this->get('edit/{id?}',['as' => "edit", 'uses' => "ProductController@edit"]);
				$this->post('edit/{id?}',['uses' => "ProductController@update"]);
				$this->any('delete/{id?}',['as' => "destroy", 'uses' => "ProductController@destroy"]);
			});

			$this->group(['prefix' => "user-management", 'as' => "user_management."], function () {
				$this->get('/',['as' => "index", 'uses' => "UserManagementController@index"]);
				// $this->get('create',['as' => "create", 'uses' => "ProductController@create"]);
				// $this->post('create',['uses' => "ProductController@store"]);
				// $this->get('edit/{id?}',['as' => "edit", 'uses' => "ProductController@edit"]);
				// $this->post('edit/{id?}',['uses' => "ProductController@update"]);
				// $this->any('delete/{id?}',['as' => "destroy", 'uses' => "ProductController@destroy"]);
			});

			$this->group(['prefix' => "order-product", 'as' => "order_product."], function () {
				$this->get('/',['as' => "index", 'uses' => "OrderProductController@index"]);
				// $this->get('create',['as' => "create", 'uses' => "ProductController@create"]);
				$this->post('/',['uses' => "OrderProductController@store"]);
				// $this->get('edit/{id?}',['as' => "edit", 'uses' => "ProductController@edit"]);
				// $this->post('edit/{id?}',['uses' => "ProductController@update"]);
				// $this->any('delete/{id?}',['as' => "destroy", 'uses' => "ProductController@destroy"]);
			});

		});
	});
});