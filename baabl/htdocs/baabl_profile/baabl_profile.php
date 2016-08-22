<?php

session_start();
require('../config.php');
require_once('baabl_profile_photos.php');


if (isset($_POST['Action'])) {
  switch ($_POST['Action']) {
    case "GetUserPictures":
      getUserPictures();
      break;
    case "GetCountOfUserPictures":
      getCountOfUserPictures();
      break;
    case "SavePhoto":
      savePhoto();
      break;
    case "UploadProfilePicture":
      uploadProfilePicture();
      break;
    case "UploadHeaderPicture":
      uploadHeaderPicture();
      break;
    case "GetProfilePicture":
      getProfilePicture();
      break;
    case "GetHeaderPicture":
      getHeaderPicture();
      break;
    case "SubmitQuestion":
      submitQuestion();
      break;
    case "LoadAnswers":
      loadAnswers();
      break;
    case "LoadQuestion":
      loadQuestion();
      break;
    case "NewEdit":
      newEdit();
      break;
    case "GetEditHistory":
      getEditHistory();
      break;
    case "DeleteQuestion":
      deleteQuestion();
      break;
    default:
    echo json_encode(array(
      'errorMessage' => 'Server Error: Post action not recognized'
    ));
  }
}


function getUserPictures(){
  if (empty($_POST['user_hash']) || empty($_POST['limit'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_user_pictures.php";

    $baablUserPictures = baabl_user_pictures::getUserPictureByUserHashAndOffset($_POST['user_hash'], $_POST['limit'], $_POST['page_offset']);

    if(!empty($baablUserPictures)){
      echo json_encode(array(
        'baablUserPicturesArray' => $baablUserPictures
      ));
    }
    else{
      echo json_encode(array(
        'baablUserPicturesArray' => "no pictures"
      ));
    }


  }

}


function getCountOfUserPictures(){
  if (empty($_POST['user_hash'])){
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_user_pictures.php";

    $countOfUserPictures = baabl_user_pictures::getCountOfUserPictureByUserHash($_POST['user_hash']);

    if(!empty($countOfUserPictures)){
      echo json_encode(array(
        'countOfUserPictures' => $countOfUserPictures
      ));
    }
    else{
      echo json_encode(array(
          'errorMessage' => 'Failed to retrieve count'
      ));
    }


  }

}


function savePhoto(){
  $ds = DIRECTORY_SEPARATOR;

  $storeFolder = 'user_pictures';

  if (!empty($_FILES)) {
      require_once "../DbMethods/baabl_user_pictures.php";
      $userDirectory = ROOT_DIR . $ds . $storeFolder . $ds . $_SESSION['user_hash'] . $ds;
      if (!file_exists($userDirectory)) {
          mkdir($userDirectory, 0777, true);
      }


      $tempFile = $_FILES['files']['tmp_name'][0];


      $uph = substr(md5(uniqid(mt_rand(), true)), 0, 10);

      $row;

      $name = $_FILES["files"]["name"][0];
      $ext = pathinfo($name, PATHINFO_EXTENSION);



      if($ext == "jpg" || $ext == "png" || $ext == "jpeg"){

        if($_POST['is_profile_photo'] == "true"){
          $row = array(
            'user_picture_hash' => $uph,
            'user_hash' => $_SESSION['user_hash'],
            'user_picture_ext' => $ext,
            'is_profile_picture' => 1
          );
        }
        else if($_POST['is_header_photo'] == "true"){
          $row = array(
            'user_picture_hash' => $uph,
            'user_hash' => $_SESSION['user_hash'],
            'user_picture_ext' => $ext,
            'is_header_picture' => 1
          );
        }
        else{
          echo json_encode(array(
            'errorMessage' => "Unable to save photo"
          ));
          return;
        }

        if($_POST['is_profile_photo'] == "true"){
          $oldPicture = baabl_user_pictures::getUserProfilePicture($_SESSION['user_hash']);
          $deleted = baabl_user_pictures::deleteUserPictureByHash($oldPicture[0]['user_picture_hash']);

          $oldFile = $userDirectory . $oldPicture[0]['user_picture_hash'] . "." . $oldPicture[0]['user_picture_ext'];
          $oldThumbnail = $userDirectory . $oldPicture[0]['user_picture_hash'] . "thumbnail" . "." . $oldPicture[0]['user_picture_ext'];
          // $oldFile = $userDirectory . "profilePicture" . "." . $oldPicture[0]['user_picture_ext'];
          // $oldThumbnail = $userDirectory . "profilePicture" . "Thumbnail" . "." . $oldPicture[0]['user_picture_ext'];
          if (file_exists($oldFile)) {
            unlink($oldFile);
          }
          if (file_exists($oldThumbnail)) {
            unlink($oldThumbnail);
          }

        }
        else if($_POST['is_header_photo'] == "true"){
          $oldPicture = baabl_user_pictures::getUserHeaderPicture($_SESSION['user_hash']);
          $deleted = baabl_user_pictures::deleteUserPictureByHash($oldPicture[0]['user_picture_hash']);
          $oldFile = $userDirectory . $oldPicture[0]['user_picture_hash'] . "." . $oldPicture[0]['user_picture_ext'];
          $oldThumbnail = $userDirectory . $oldPicture[0]['user_picture_hash'] . "thumbnail" . "." . $oldPicture[0]['user_picture_ext'];
          // $oldFile = $userDirectory . "profilePicture" . "." . $oldPicture[0]['user_picture_ext'];
          // $oldThumbnail = $userDirectory . "profilePicture" . "Thumbnail" . "." . $oldPicture[0]['user_picture_ext'];
          if (file_exists($oldFile)) {
            unlink($oldFile);
          }
          if (file_exists($oldThumbnail)) {
            unlink($oldThumbnail);
          }

        }

        $newUserPicture = baabl_user_pictures::newUserPicture($row);





        $user_picture_hash_thumbnail = $uph . "thumbnail" . "." . $ext;
        $user_picture_hash = $uph . "." . $ext;
        $targetFile =    $userDirectory . $user_picture_hash;
        $targetFileThumbnail = $userDirectory . $user_picture_hash_thumbnail;
        // $user_picture_hash_thumbnail = "profilePicture" . "Thumbnail" . "." . $ext;
        // $user_picture_hash = "profilePicture" . "." . $ext;
        // $targetFile =    $userDirectory . $user_picture_hash;
        // $targetFileThumbnail = $userDirectory . $user_picture_hash_thumbnail;

        list($width, $height) = getimagesize($tempFile);
        if ($width == null && $height == null) {
            echo json_encode(array(
              'errorMessage' => "Unaccepted file"
            ));
            return;
        }


        $manipulator = new ImageManipulator($tempFile);

        $scaled_width = $_POST['scaled_width'];
        $width_multiplier = $width/$scaled_width;

        $scaled_height = $_POST['scaled_height'];
        $height_multiplier = $height/$scaled_height;

        $x1 = $_POST['x1'] * $width_multiplier;
        $y1 = $_POST['y1'] * $height_multiplier;
        $x2 = $_POST['x2'] * $width_multiplier;
        $y2 = $_POST['y2'] * $height_multiplier;

        $newImage = $manipulator->crop($x1, $y1, $x2, $y2);
        $manipulator->save($targetFile);

        if(($width > 200) || ($height > 200)){
          $newImage = $manipulator->resample(200, 200);
          $manipulator->save($targetFileThumbnail);
        }
        else{
          $manipulator->save($targetFileThumbnail);
        }



        if($newUserPicture){
          if($_POST['is_profile_photo'] == "true"){
            echo json_encode(array(
              'success' => "Profile photo posted",
              'user_picture_hash' => $uph,
              'user_picture_ext' => $ext
            ));
          }
          else if($_POST['is_header_photo'] == "true"){
            echo json_encode(array(
              'success' => "Header photo posted",
              'user_picture_hash' => $uph,
              'user_picture_ext' => $ext
            ));
          }
        }


      }
      else{
        echo json_encode(array(
          'errorMessage' => "Unaccepted file extension"
        ));
        return;
      }
  }
}



function uploadProfilePicture(){

    echo json_encode(array(
      'success' => "Profile picture posted"
    ));

  }




function uploadHeaderPicture(){
  $ds = DIRECTORY_SEPARATOR;

  $storeFolder = 'user_pictures';


  if (!empty($_FILES)) {
      require_once "../DbMethods/baabl_user_pictures.php";
      $userDirectory = ROOT_DIR . $ds . $storeFolder . $ds . $_SESSION['user_hash'] . $ds;
      if (!file_exists($userDirectory)) {
          mkdir($userDirectory, 0777, true);
      }

      $tempFile = $_FILES['file']['tmp_name'];

      $user_picture_hash = substr(md5(uniqid(mt_rand(), true)), 0, 10);

      $row;

      $name = $_FILES["file"]["name"];
      $ext = end((explode(".", $name)));

      if(!empty($_POST['caption'])){
        $row = array(
          'user_picture_hash' => $user_picture_hash,
          'user_hash' => $_SESSION['user_hash'],
          'user_picture_caption' => $_POST['caption'],
          'user_picture_ext' => $ext,
          'is_header_picture' => 1
        );
      }
      else{
        $row = array(
          'user_picture_hash' => $user_picture_hash,
          'user_hash' => $_SESSION['user_hash'],
          'user_picture_ext' => $ext,
          'is_header_picture' => 1
        );
      }

      $oldHeaderPicture = baabl_user_pictures::getUserHeaderPicture($_SESSION['user_hash']);
      if($oldHeaderPicture){

        $updateInfo = array(
          'is_header_picture' => 0
        );

        $update = baabl_user_pictures::updateUserPictureByHash($oldHeaderPicture[0]['user_picture_hash'], $updateInfo);

      }

      $newUserPicture = baabl_user_pictures::newUserPicture($row);


      $user_picture_hash = $user_picture_hash . "." . $ext;

      $targetFile =    $userDirectory . $user_picture_hash;

      move_uploaded_file($tempFile,$targetFile);

      if($newUserPicture){
        echo json_encode(array(
          'success' => "Header picture posted"
        ));
      }


  }

}


function getProfilePicture(){
  if (empty($_POST['user_hash'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_user_pictures.php";

    $userProfilePicture = baabl_user_pictures::getUserProfilePicture($_POST['user_hash']);

    if(!empty($userProfilePicture)){
      echo json_encode(array(
        'userProfilePicture' => $userProfilePicture
      ));
    }
    else{
      echo json_encode(array(
        'userProfilePicture' => "no profile picture"
      ));
    }


  }

}



function getHeaderPicture(){
  if (empty($_POST['user_hash'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_user_pictures.php";

    $userHeaderPicture = baabl_user_pictures::getUserHeaderPicture($_POST['user_hash']);

    if(!empty($userHeaderPicture)){
      echo json_encode(array(
        'userHeaderPicture' => $userHeaderPicture
      ));
    }
    else{
      echo json_encode(array(
        'userHeaderPicture' => "no header picture"
      ));
    }
  }

}


function submitQuestion(){
  if (empty($_POST['user_hash']) || empty($_POST['question'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_questions.php";

    $question_hash = substr(md5(uniqid(mt_rand(), true)), 0, 20);

    $row = array(
      'question_hash' => $question_hash,
      'author_hash' => $_SESSION['user_hash'],
      'user_hash'=> $_POST['user_hash'],
      'question_text' => $_POST['question']
    );

    $newQuestion = baabl_questions::newQuestion($row);

    if($newQuestion){
      echo json_encode(array(
        'success' => "Question posted",
        'question_hash' => $question_hash
      ));
    }
    else{
      echo json_encode(array(
        'errorMessage' => "Question posting error"
      ));
    }
  }

}



function loadAnswers(){
  if (empty($_POST['user_hash'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {

    require_once "../DbMethods/baabl_answers.php";

    $answers = baabl_answers::getAnswerByUserHash($_POST['user_hash']);

    if($answers){
      echo json_encode(array(
        'answerArray' => $answers
      ));

    }
    else{
      echo json_encode(array(
        'errorMessage' => "Question posting error"
      ));
    }
  }
}



function loadQuestion(){
  if (empty($_POST['question_hash'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_questions.php";

    $question = baabl_questions::getQuestionByHash($_POST['question_hash']);

    if($question){
      echo json_encode(array(
        'question' => $question
      ));
    }
    else{
      echo json_encode(array(
        'errorMessage' => "Could not get question"
      ));
    }
  }

}


function updateAnswer(){

  if (empty($_POST['answer_text']) || empty($_POST['answer_hash'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_answers.php";
    if(strlen($_POST['answer_text']) > 1000){
      echo json_encode(array(
        'errorMessage' => 'Error: Response too long'
      ));
      return;
    }

    $containsLetter  = preg_match('/[a-zA-Z]/',    $_POST['answer_text']);
    $containsDigit   = preg_match('/\d/',          $_POST['answer_text']);

    $contains = $containsLetter || $containsDigit;

    if(!($contains)){
      echo json_encode(array(
        'errorMessage' => 'Error: Invalid response'
      ));
      return;
    }

    $row = array(
      'answer_text' => $_POST['answer_text']
    );

    $updateAnswer = baabl_answers::updateAnswerByHash($row, $_POST['answer_hash']);
    if($updateAnswer){
      echo json_encode(array(
        'success' => "Response updated"
      ));
    }
    else{
      echo json_encode(array(
        'errorMessage' => "Failed to update response"
      ));
    }
  }

}


function newEdit(){
  if (empty($_POST['edit_hash']) || empty($_POST['edit_type']) || empty($_POST['edit_text']) || empty($_POST['edit_time'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_edits.php";
    require_once "../DbMethods/baabl_answers.php";
    date_default_timezone_set(TIMEZONE);


    if(strlen($_POST['edit_text']) > 1000){
      echo json_encode(array(
        'errorMessage' => 'Error: Response too long'
      ));
      return;
    }

    $containsLetter  = preg_match('/[a-zA-Z]/',    $_POST['edit_text']);
    $containsDigit   = preg_match('/\d/',          $_POST['edit_text']);

    $contains = $containsLetter || $containsDigit;

    if(!($contains)){
      echo json_encode(array(
        'errorMessage' => 'Error: Invalid response'
      ));
      return;
    }

    $dateNow = date('Y-m-d H:i:s');

    $row = array(
      'answer_text' => $_POST['edit_text'],
      'answer_time' => $dateNow,
      'answer_edited' => 1
    );

    $updateAnswer = baabl_answers::updateAnswerByHash($row, $_POST['edit_hash']);
    if($updateAnswer){

      $row = array(
        'edit_hash' => $_POST['edit_hash'],
        'edit_type' => $_POST['edit_type'],
        'edit_text'=> $_POST['old_text'],
        'edit_time' => $_POST['edit_time']
      );

      $newEdit = baabl_edits::newEdit($row);

      if($newEdit){
        echo json_encode(array(
          'success' => "Edit Posted",
          'datenow' => $dateNow
        ));
      }
      else{
        echo json_encode(array(
          'errorMessage' => "Edit posting error"
        ));
      }

    }
    else{
      echo json_encode(array(
        'errorMessage' => "Failed to update response"
      ));
    }
  }
}


function getEditHistory(){
  if (empty($_POST['edit_hash']) || empty($_POST['edit_type']) ) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_edits.php";

    $edits = baabl_edits::getEditsByHash($_POST['edit_hash'], $_POST['edit_type']);

    echo json_encode(array(
      'edits' => $edits
    ));

    // if($edits){
    //   echo json_encode(array(
    //     'edits' => $edits
    //   ));
    // }
    // else{
    //   echo json_encode(array(
    //     'errorMessage' => "Could not get edit history"
    //   ));
    // }
  }

}
