<?php
include("db.php");
require('libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

$db = dbconnect($hostname,$db_name,$db_user,$db_passwd);
if($db)
{
	if( $_POST['name']    == '' or
     $_POST['email']  == '' or
     $_POST['password'] == '' or
     $_POST['password_confirmation']=='' ) 
	{
   		header("Location: register.php?$Error=0");   
  }

	$query = "SELECT * FROM users WHERE email = '" .$_POST[email] ."'";
	$result = @ mysql_query($query,$db);
	if(!$result)
     showerror();
 	if(mysql_num_rows($result) > 0)
 	 {
      	header("Location: register.php?$Error=1");
  	 }
 	if(  $_POST['password'] == '' &&
     $_POST['password_confirmation']=='' && isset($_POST['name']) && isset($_POST['email']))
  	{
  		header("Location: register.php?$Error=3&$name=$_POST['name']&$email=$_POST['email']");  

  	}
  	if(  $_POST['password'] != $_POST['password_confirmation'] )
  	{
  		header("Location: register.php?$Error=4&$name=$_POST['name']&$email=$_POST['email']");  

  	}
}




header("Location: register_success.html"); 

?>