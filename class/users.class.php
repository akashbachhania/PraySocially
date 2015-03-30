<?php
class User{
   var $userName;
   var $passWord;
   var $id;
  
   //THis is all set function username , password , and Id
   function setUsername ($userName){
      $this->userName = $userName;  
   }
  
    function setPassword ($passWord){
      $this->passWord = $passWord;  
   }
   
	function setId ($id){
      $this->id = $id;  
   }

//This is set function for  username , password and Id
    function getUsername ($userName){
      return $this->userName;  
   }

   function getPassword ($passWord){
      return $this->passWord;  
   }
  
   function getId ($id){
      return $this->$id;  
   }
   
}

?>