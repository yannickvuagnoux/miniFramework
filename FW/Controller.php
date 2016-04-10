<?php 

/**
* 
*/


abstract class Controller
{
	private $_className;
	

	function __construct()
	{
		// on va chercher le nom de la class on enleve le mot Controller pour garder uniquement son nom
		$this->_className = substr(get_class($this),0,-10);

	
	}

	// public function renderView($action = NULL)
	// {
	// 	// on se sert de $this->_className pour appeler la vue qui correspond 
	// 	require ("App/Views/".$this->_className.".php");

	// }

	public function indexAction()
	{
		require ("App/Views/".$this->_className."/index.php");
	}

}

 ?>