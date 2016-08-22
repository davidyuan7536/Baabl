<?php

require('config.php');
require('../setup/setup.php');

$smarty = new Smarty_Setup();

session_start();
session_regenerate_id();
if(!isset($_SESSION['user_email']))      // if there is no valid session
{
  $smarty->display('index.tpl');
}
else{
  header('Location: dashboard.php');    
  // require('dashboard/dashboard.php');
  // $smarty->assign("current_user_first", $_SESSION['user_first']);
  // $smarty->assign("current_user_last", $_SESSION['user_last']);
  // $smarty->assign("current_user_email", $_SESSION['user_email']);
  // $smarty->assign("current_user_hash", $_SESSION['user_hash']);
  // $smarty->display('dashboard.tpl');
}



?>
