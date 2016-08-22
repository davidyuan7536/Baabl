<?php

require('config.php');
require('../setup/setup.php');


$smarty = new Smarty_Setup();

session_start();
session_regenerate_id();

$smarty->clearAssign('profile_user_hash');
$smarty->clearAssign('user_hash');



if(isset($_GET["user_hash"])){
  if(!isset($_SESSION['user_email']))
  {
    $smarty->assign("profile_user_hash", $_GET['user_hash']);
    $smarty->assign("user_hash", $_SESSION['user_hash']);
    $smarty->display('profile.tpl');
  }
  else{
    $smarty->assign("profile_user_hash", $_GET['user_hash']);
    $smarty->assign("user_hash", $_SESSION['user_hash']);
    $smarty->display('profile.tpl');
  }
}
else{
  if(!isset($_SESSION['user_email']))
  {
    header('Location: index.php');
  }
  else{
    $smarty->assign("profile_user_hash", $_SESSION['user_hash']);
    $smarty->assign("user_hash", $_SESSION['user_hash']);
    $smarty->display('profile.tpl');
  }
}




?>
