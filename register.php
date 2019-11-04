<?php
require('libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';
$smarty->assign("MessagError",$MessagError);
$smarty->assign('href0',"register.php");

$MessagError=typeError($_GET[$Error]);
function typeError($Error)
{
switch ($Error) {
	case '0':
		$MessagError="Todos os campos devem ser preenchidos";
		break;
	case '1':
		$MessagError="Email já existe na base de dados";
		break;
	case '2':
		$MessagError="Email tem formato incorrecto";
		break;
	case '3':
		$MessagError="Password em branco";
		break;
	case '4':
		$MessagError="Passwords não coincidem";
		break;

}

return $MessagError;

}
  $smarty->display('register_templates.tpl');
























?>