<?php 
//singleton pdo
class SPDO
{
	private $pdo;
	private static $_instance;


	private function __construct()	
	{
		$this->pdo = new PDO('mysql:dbname=hordes;host=localhost','root',''); 
	}
	public static function getInstance()
	{
		if (!isset(self::$_instance)){
			self::$_instance= new sPDO();
		}
		return self::$_instance;
	}
	public function getPDO()
	{
		return $this->pdo;
	}

};