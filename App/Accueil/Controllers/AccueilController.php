<?php 

include ("FW/Controller.php");

/**
* 
*/
class AccueilController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function indexAction()
	{
		require ("App/Accueil/Views/index.php");
	}


}


 ?>