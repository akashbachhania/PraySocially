<?php
class Users extends Init{
   protected $userName;
   protected $passWord;
   protected $id;
   protected static $tableName="Users";
  
   private static $instance=NULL;   
   public static function getInstance(){ 
     if( self::$instance === NULL ) { 
         self::$instance = new self();
     }
      return self::$instance;
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

   public function getPassword ($passWord){
      return $this->passWord;  
   }
  
   public function getId ($id){
      return $this->$id;  
   }
   

   //Functions
   public function getAllUsers(){

   }

   //Function for login user 
   public function login($array){
      $user=$this->_dbh->query("select * from Users where 
         username='".$array['username']."' and
         password='".md5($array['password'])."'
         ")->fetchAll(PDO::FETCH_ASSOC);
      if($user)
         return true;
      else
         return false;
   }
   
   //Function for registration user
   public function registration($array){
	    $user=$this->_dbh->exec("insert into userlogin values('".$array['username']."','".md5($array['password'])."')");
		
	  if($user)
        return true;
      else
         return false;
	   
	   
	   
	   }

}

?>