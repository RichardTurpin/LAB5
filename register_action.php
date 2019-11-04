<?php
include("db.php");
require('libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
if($db)
{
	print_r($_POST);
	print_r(empty($_POST['name']));
	print_r(empty($_POST['email']));
	print_r(empty($_POST['password']));
	print_r(empty($_POST['password_confirmation']));

  	$name  = $_POST['name'];
  	$password = substr(md5($_POST['password']),0,32);
  	$email    = $_POST['email'];
	$query = "SELECT * FROM users WHERE email = '$email'";
	$result = @ mysql_query($query,$db);

	if(empty($_POST['name']) or empty($_POST['email'])  ) 
	{
   		header("Location: register.php?Error=0");   
  	} elseif(mysql_num_rows($result) > 0)
 	 {
      	header("Location: register.php?Error=1");
  	 }
 	elseif(empty($_POST['password']) or empty($_POST['password_confirmation']))
  	{
  		header("Location: register.php?Error=3&name=$name&email=$email");  

  	}
  	elseif(  $_POST['password'] != $_POST['password_confirmation'] )
  	{
  		header("Location: register.php?Error=4&name=$name&email=$email");  

  	}
	else
	{
  		
  		$sql_insert = "INSERT INTO users(name,password_digest,email, created_at,updated_at)
                 VALUES('$name','$password','$email',NOW(),NOW())";

   		if(!mysql_query($sql_insert,$db))
     		showerror();

     	header("Location: register_success.html"); 

	}
  mysql_close($db);

}



?>