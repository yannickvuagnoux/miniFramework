<?php 

/**
* 
*/

class View
{
	private $_title;


	public function setTitle()
	{
		/* regex qui recupere le nom du fichier */
		preg_match('#[a-z]+\.php$#',__FILE__,$resultRegex);
		/* enleve l'extention du fichier */
		$this->_title = ucfirst(substr($resultRegex[0],0,-4));

	}

	public function getTitle()
	{
		return $this->_title;

	}


}

 ?>