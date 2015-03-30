<?php
class Users{
   private $userName;
   private $passWord;
   private $id;
   private static $instance=NULL;	
 
  function __construct()
	{
		$dbObject = DatabaseConnection::getInstance();
		$this->_dbh = $dbObject->getConnection();
		$this->_redirect = URLRedirect::getInstance();
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
//Setters  
 	public function setUsername ($userName){
      $this->userName = $userName;  
   }
  
    public function setPassword ($passWord){
      $this->passWord = $passWord;  
   }
   
	public function setId ($id){
      $this->id = $id;  
   }

//Getters
    public function getUsername ($userName){
      return $this->userName;  
   }

  	public  function getPassword ($passWord){
      return $this->passWord;  
   }
  
   public function getId ($id){
      return $this->$id;  
   }
   
   //Function
   
  
   
}

?>