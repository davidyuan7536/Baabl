<?php

session_start();
require('../config.php');

if (isset($_POST['Action'])) {
  switch ($_POST['Action']) {
    case "NewComment":
      newComment();
      break;
    case "GetBaablComments":
      getBaablComments();
      break;
    case "UpdateBaablComment":
      UpdateBaablComment();
      break;
    case "ReportBaablComment":
      reportBaablComment();
      break;
    case "DeleteBaablComment":
      deleteBaablComment();
      break;
    default:
    echo json_encode(array(
      'errorMessage' => 'Server Error: Post action not recognized'
    ));
  }
}



function newComment(){
  if (empty($_POST['baabl_hash']) || empty($_POST['comment_message'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_comments.php";
    $comment_hash = substr(md5(uniqid(mt_rand(), true)), 0, 10);

    $row = array(
      'comment_hash' => $comment_hash,
      'user_hash' => $_SESSION['user_hash'],
      'comment_message' => $_POST['comment_message'],
      'parent_type' =>  $_POST['parent_type'],
      'parent_hash' => $_POST['baabl_hash']

    );

    $newBaablComment = baabl_comments::newBaablComment($row);

    if ($newBaablComment){
      echo json_encode(array(
        'success' => 'Comment posted',
        'comment_hash' => $comment_hash
      ));
    }
    else {
      echo json_encode(array(
        'errorMessage' => 'Error: Failed to create new comment'
      ));
    }
  }
}





function getBaablComments(){
  if (empty($_POST['baabl_hash'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_comments.php";


    $baablComments = baabl_comments::getBaablCommentByParentHashAndType($_POST['baabl_hash'], "baabl");

    if(!empty($baablComments)){
      echo json_encode(array(
        'baablCommentsArray' => $baablComments
      ));
    }
    else{
      echo json_encode(array(
        'baablCommentsArray' => "no comments"
      ));
    }


  }

}



function updateBaablComment(){
  if (empty($_POST['comment_hash']) || empty($_POST['comment_message'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {

    require_once "../DbMethods/baabl_comments.php";

    $comment = baabl_comments::getBaablCommentByHash($_POST['comment_hash']);
    if($comment[0]['user_hash'] == $_SESSION['user_hash']){
      $row = array(
        'comment_message' => $_POST['comment_message']
      );

      $newBaablComment = baabl_comments::updateBaablCommentByHash($row, $_POST['comment_hash']);

      if ($newBaablComment){
        echo json_encode(array(
          'success' => 'Comment updated'
        ));
      }
      else {
        echo json_encode(array(
          'errorMessage' => 'Error: Failed to update comment'
        ));
      }
    }
    else{
      echo json_encode(array(
        'errorMessage' => 'Error: Unoriginal author attempting to edit'
      ));
    }

  }
}



function reportBaablComment(){
  if (empty($_POST['comment_hash']) || (empty($_POST['report_message']))) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_comments.php";
    require_once "../DbMethods/baabl_reports.php";
    $report_hash = substr(md5(uniqid(mt_rand(), true)), 0, 10);
    $row = array(
      'report_type' => 'comment',
      'report_message' => $_POST['report_message'],
      'reported_hash' => $_POST['comment_hash'],
      'user_hash' => $_SESSION['user_hash'],
      'report_hash' => $report_hash
    );

    $newReport = baabl_reports::newReport($row);

    if($newReport){
      $row = array(
        'comment_reported' => '1',
      );
      $updateBaablComment = baabl_comments::updateBaablCommentByHash($row, $_POST['comment_hash']);
      if ($updateBaablComment){
        echo json_encode(array(
          'success' => 'Comment reported'
        ));
      }
      else {
        echo json_encode(array(
          'errorMessage' => 'Error: Failed to report comment'
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





function deleteBaablComment(){
  if (empty($_POST['comment_hash'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_comments.php";
    $baablComment = baabl_comments::getBaablCommentByHash($_POST['comment_hash']);
    if ($baablComment[0]['user_hash'] == $_SESSION['user_hash']) {


      $deleteBaabl = baabl_comments::deleteBaablCommentByHash($_POST['comment_hash']);

      if ($deleteBaabl){
        echo json_encode(array(
          'success' => 'Baabl comment deleted'
        ));
      }
      else {
        echo json_encode(array(
          'errorMessage' => 'Error: Failed to update Baabl comment'
        ));
      }
    }
    else{
      echo json_encode(array(
        'errorMessage' => 'Error: Unoriginal user attempting to delete Baabl comment'
      ));
    }


  }

}

?>
