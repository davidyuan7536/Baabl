<?php

require('config.php');
require('../setup/setup.php');


$smarty = new Smarty_Setup();

session_start();
session_regenerate_id();

$smarty->clearAssign('profile_user_hash');
$smarty->clearAssign('signed_in');



if(isset($_SESSION['user_email'])){
  if(!isset($_GET["notification_hash"]))
  {
    header('Location: index.php');
  }
  else{
    require_once "/DbMethods/baabl_notifications.php";
    $notification = baabl_notifications::getNotificationByHash($_GET["notification_hash"]);
    if($notification[0]['user_hash'] != $_SESSION['user_hash']){
      header('Location: index.php');
    }
    else{
      $smarty->assign("user_hash", $_SESSION['user_hash']);
      $smarty->assign("notification_hash", $_GET['notification_hash']);
      $smarty->display('notification.tpl');
    }
  }
}
else{
  header('Location: index.php');
}




?>
