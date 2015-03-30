<?php
class User	
{
	private $dbh;
	private $redirect;
	private static $instance=NULL;
	function __construct()
	{
		$dbObject = DatabaseConnection::getInstance();
		$this->_dbh = $dbObject->getConnection();
		$this->_redirect = URLRedirect::getInstance();
		//$session= Session::getInstance();
	}
	//get object of current class...
	public static function getInstance()
	{ 
	    if( self::$instance === NULL )
	    { 
		   self::$instance = new self();
	    }
	    return self::$instance;
	}
	// manage login functionality......
	public function login($array) {
		try {
			
			$username=$array['username'];
			$sql = "select * from userlogin where username = '$username'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch();
		
				if(($array['username']==$value['username']) and  ($array['password'])==($value['password']))
				{
					return $value;
						//echo "successfully login !!!";
				}
				
			}
		
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
}
?>