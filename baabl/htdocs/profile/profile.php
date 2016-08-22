<?php

  include('../config.php');
  require_once( ROOT_DIR.'/DbSimple/Utils.php');
  require_once( ROOT_DIR.'/DbMethods/baabl_baabls.php');

  session_start();

  $baabl = baabl_baabls::getBaablByHash($_SESSION['user_hash']);

  foreach ($baabl as $key => &$value1) {
    foreach ($value1 as $key => $value) {
       if ($key == 'user_hash' && $value != $_SESSION['user_hash']) {
          unset($value1[$key]);
      }
    }
  }



  echo json_encode(array(
    'baablArray' => $baabl
  ));




?>
