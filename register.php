<?php
require('class/init.php'); 
	//$session = $init->getSession();
    $redirect = $init->getRedirect();
 	$users = Users::getInstance();
 	
	if(isset($_POST['register'])){
		
		//if password and confirm password is match 
		if($_POST['password']==$_POST['confirm_password']){
			
			 $array=array('username'=>$_POST['username'],'password'=>$_POST['password']);
			 $login=$users->registration($array);
			 }
			else{
			
			?><script>
            alert("there are some problem in signin	");
			//window.location.open='register.php';
            </script><?php
		}
 }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Form</title>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#greencheck1').hide();
	$('#label1').hide();
	
			$('.username').blur(function (e) { //alert($(".username").val());
				e.preventDefault();
				var data = {};
				data.username=$(".username").val();
				$.ajax({
					type: "POST",
					url: "ajaxRegister.php",
					data: data,
					//cache: false,
					success: function (response) {
						//alert(response);
						if(response==true){
								$(".username").onfocus();
								$('#greencheck1').hide();
								$('#label1').show();
							}
						else{
								$('#label1').hide();
								$('#greencheck1').show();
								
						}
					}
			}); 
					 return false;
	   
		});
	
});
</script> </head>
<body>
<div id="container" style="padding:50px;">
    <div id="form1" style="padding:200px;" align="center">
            <h1>Registration Form</h1>
    
    <form method="post" action="">
        <table cellpadding="5" cellspacing="5" align="center">
            <tr>
                <td>Desired:</td>
                <td><input type="text" name="username" class="username" placeholder="UserName" /></td>
                <td><img src="image/greencheck1.jpg" height="20" width="20" id="greencheck1"/></td>
                <td><label id="label1">Username is Exist! Please Entrer Another</label></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" placeholder="PassWord" /></td>
            </tr>
             <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirm_password" placeholder="Confirm PassWord" /></td>
            </tr>
             <tr>
                <td>Email Address:</td>
                <td><input type="email" name="email" placeholder="email" /></td>
            </tr>
            <tr>
                <td><span></span></td>
                <td><input type="submit" name="register" value="Register"/></td>
            </tr>
            <tr>
                <td><span></span></td>
                <td> <a href="http://www.facebook.com"><label>Sign In with Facebook</label></a></td>
            </tr>
            <tr>
                <td><span></span></td>
                <td><a href="<?php $this->$redirect('index.php')?>"><label>Already have an account? Log in!</label></a></td>
            </tr>
         </table>
    </form>
    </div>
</div>
</body>
</html>