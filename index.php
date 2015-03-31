<?php
require('./class/users.php');
	//Creating object of user entity
    $user    = Users::getInstance();
    //Getting redirect object
    $redirect=$init->getRedirect();
    //Getting redirect object
    $session=$init->getSession();
    //Starting Session
    $session->startSession();

    if(isset($_POST['login'])){
    	$array=array('username'=>$_POST['username'],'password'=>$_POST['password']);
        $login=$user->login($array);
        if($login){
            $session->__set('username',$array['username']);
            $redirect->redirect('home.php');
        }
        else
            echo "<script>alert('Invalid username or password')</script>";
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div id="container" style="padding:50px;">
    <div id="form1" style="padding:200px;">
    <form method="post" action="">
        <table cellpadding="5" cellspacing="5" align="center">
            <tr>
                <td><span></span></td>
                <td><input type="text" name="username" placeholder="UserName" /></td>
            </tr>
            <tr>
                <td><span></span></td>
                <td><input type="password" name="password" placeholder="PassWord" /></td>
            </tr>
            <tr>
                <td><span></span></td>
                <td><input type="submit" name="login" value="Login"/></td>
            </tr>
            <tr>
                <td><span></span></td>
                <td> <a href="http://www.facebook.com"><label>Sign In with Facebook</label></a></td>
            </tr>
            <tr>
                <td><span></span></td>
                <td><label>Don't have an account? Register Now!</label></td>
            </tr>
         </table>
    </form>
    </div>
</div>
</body>
</html>