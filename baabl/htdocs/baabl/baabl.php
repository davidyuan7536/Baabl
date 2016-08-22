<?php

session_start();
require('../config.php');

if (isset($_POST['Action'])) {
  switch ($_POST['Action']) {
    case "Baabl":
    baabl();
    break;
    case "DeleteBaabl":
    deleteBaabl();
    break;
    case "UpdateBaablMessage":
    updateBaablMessage();
    break;
    case "ReportBaabl":
    reportBaabl();
    break;
    default:
    echo json_encode(array(
      'errorMessage' => 'Server Error: Post action not recognized'
    ));
  }
}


function baabl(){
  require_once "../DbSimple/Utils.php";
  if (empty($_POST['baabl'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {

    $containsLetter  = preg_match('/[a-zA-Z]/',    $_POST['baabl']);
    $containsDigit   = preg_match('/\d/',          $_POST['baabl']);

    $contains = $containsLetter || $containsDigit;

    if($contains){
      require_once "../DbMethods/baabl_baabls.php";
      $baabl_hash = substr(md5(uniqid(mt_rand(), true)), 0, 20);

      $row = array(
        'baabl_hash' => $baabl_hash,
        'baabl_message' => $_POST['baabl'],
        'user_hash' => $_SESSION['user_hash'],
        'baabl_upvote' => "0",
        'baabl_downvote' => "0",
      );

      $newBaabl = baabl_baabls::newBaabl($row);

      if ($newBaabl){
        echo json_encode(array(
          'errorMessage' => 'Baabl posted'
        ));
      }
      else {
        echo json_encode(array(
          'errorMessage' => 'Error: Failed to post Baabl'
        ));
      }
    }
    else{
      echo json_encode(array(
        'errorMessage' => 'Error: Invalid Baabl'
      ));
    }

  }
}



function deleteBaabl(){
  if (empty($_POST['baabl_hash'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_baabls.php";
    $baabl = baabl_baabls::getBaablByBaablHash($_POST['baabl_hash']);
    if ($baabl[0]['user_hash'] == $_SESSION['user_hash']) {

      $deleteBaabl = baabl_baabls::deleteBaablByHash($_POST['baabl_hash']);

      if ($deleteBaabl){
        echo json_encode(array(
          'success' => 'Baabl deleted'
        ));
      }
      else {
        echo json_encode(array(
          'errorMessage' => 'Error: Failed to delete Baabl'
        ));
      }
    }
    else{
      echo json_encode(array(
        'errorMessage' => 'Error: Unoriginal user attempting to delete Baabl'
      ));
    }


  }

}



function updateBaablMessage(){
  if (empty($_POST['baabl_hash']) || (empty($_POST['baabl_message']))) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_baabls.php";
    $baabl = baabl_baabls::getBaablByBaablHash($_POST['baabl_hash']);
    if ($baabl[0]['user_hash'] == $_SESSION['user_hash']) {


      $row = array(
        'baabl_message' => $_POST['baabl_message'],
      );

      $updateBaabl = baabl_baabls::updateBaablByHash($row, $_POST['baabl_hash']);

      if ($updateBaabl){
        echo json_encode(array(
          'success' => 'Baabl updated'
        ));
      }
      else {
        echo json_encode(array(
          'errorMessage' => 'Error: Failed to update Baabl'
        ));
      }
    }
    else{
      echo json_encode(array(
        'errorMessage' => 'Error: Unoriginal user attempting to update Baabl'
      ));
    }


  }

}


function reportBaabl(){
  if (empty($_POST['baabl_hash']) || (empty($_POST['report_message']))) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_baabls.php";
    require_once "../DbMethods/baabl_reports.php";
    $report_hash = substr(md5(uniqid(mt_rand(), true)), 0, 10);
    $row = array(
      'report_type' => 'baabl',
      'report_message' => $_POST['report_message'],
      'reported_hash' => $_POST['baabl_hash'],
      'user_hash' => $_SESSION['user_hash'],
      'report_hash' => $report_hash
    );

    $newReport = baabl_reports::newReport($row);

    if($newReport){
      $row = array(
        'baabl_reported' => '1',
      );
      $updateBaabl = baabl_baabls::updateBaablByHash($row, $_POST['baabl_hash']);
      if ($updateBaabl){
        echo json_encode(array(
          'success' => 'Baabl reported'
        ));
      }
      else {
        echo json_encode(array(
          'errorMessage' => 'Error: Failed to report Baabl'
        ));
      }
    }
    else{
      echo json_encode(array(
        'errorMessage' => 'Error: Failed to save report message'
      ));

    }
  }

}




?>
