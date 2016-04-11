<?php

//demarrage de la session si elle n 'est pas demarré elle sera accessible sur toutes les pages'
if(!isset($_SESSION)){
	session_start();
}

if ($_GET){
	// on va recuperer les param d'url pour les stocker dans une variable 
    $path_ctrl = ucfirst($_GET["controller"]."Controller");
    // on va recuperer les param d'url pour les stocker dans une variable 
	$path_module = ucfirst($_GET["module"]);
    //on recupere le nom de l action qui va servir a appeler la bonne method du controller
	$path_act =$_GET["action"]."Action";

    // appel le controleur et on l'instancie
    require ("App/".$path_module."/Controllers/".$path_ctrl.".php");
    $ctrl = new $path_ctrl ();

	//apelle de sa method
	$ctrl->$path_act();
}
else{
	// controleur et vue par default
	require ("App/Accueil/Controllers/AccueilController.php");
	$ctrl = new AccueilController();
	$ctrl->indexAction();
}


 ?>