<?php 

include ("FW/Controller.php");

/**
* 
*/
class BlogController extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function gestionBlogAction(){
		require('App/Blog/Views/gestionBlog.php');
	}
}


 ?>