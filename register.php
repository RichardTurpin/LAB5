<?php
require('libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->template_dir = 'templates';
$smarty->compile_dir = 'templates_c';

$MessagError=typeError($_GET[$Error]);
function typeError($Error)
{
if($Error==0)
{

}




return $MessagError;

}

























?>