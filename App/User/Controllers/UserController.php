<?php 

include ("FW/Controller.php");

/**
* 
*/
class UserController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function indexAction(){
		require('App/User/Views/index.php');

	}
}


 ?>