<?php


if(!isset($_SESSION))
{
	session_start();
}

if ($_GET) {

	// on va recuperer les param d'url pour les stocker dans une variable 
	$path_ctrl = ucfirst($_GET["controller"]."Controller");
	// appel le controleur et on l'instancie
	require ("App/Controllers/".$path_ctrl.".php");
	$ctrl = new $path_ctrl ();

	$path_act =$_GET["action"]."Action";
	var_dump($path_act);
	
	$ctrl->$path_act();


	

}
else{

	// controleur et vue par default
	require ("App/Controllers/AccueilController.php");
	$ctrl = new AccueilController();
	$ctrl->indexAction();
	

}


 ?>