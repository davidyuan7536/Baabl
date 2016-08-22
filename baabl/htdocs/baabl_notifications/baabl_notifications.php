<?php

session_start();
require('../config.php');

if (isset($_POST['Action'])) {
  switch ($_POST['Action']) {
    case "NewNotification":
      newNotification();
      break;
    case "GetNotification":
      getNotification();
      break;
    case "DeleteQuestion":
      deleteQuestion();
      break;
    case "ReportQuestion":
      reportQuestion();
      break;
    case "NewAnswer":
      newAnswer();
      break;
    case "UpdateAnswer":
      updateAnswer();
      break;
    case "ReportAnswer":
      reportAnswer();
      break;
    default:
    echo json_encode(array(
      'errorMessage' => 'Server Error: Post action not recognized'
    ));
  }
}


function newNotification(){

  if (empty($_POST['user_hash']) || empty($_POST['notification_type']) || empty($_POST['notification_trigger_hash'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_notifications.php";

    $notification_hash = substr(md5(uniqid(mt_rand(), true)), 0, 20);

    $row = array(
      'notification_hash' => $notification_hash,
      'notification_type' => $_POST['notification_type'],
      'user_hash'=> $_POST['user_hash'],
      'notification_trigger_hash' => $_POST['notification_trigger_hash']
    );

    $newNotification = baabl_notifications::newNotification($row);

    if($newNotification){
      echo json_encode(array(
        'success' => "Notification Sent"
      ));
    }
    else{
      echo json_encode(array(
        'errorMessage' => "Notification Error"
      ));
    }
  }

}



function getNotification(){

  if (empty($_POST['notification_hash']) || empty($_POST['user_hash'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_notifications.php";
    $notification = baabl_notifications::getNotificationByHash($_POST['notification_hash']);

    if(count($notification) > 1){
      echo json_encode(array(
        'errorMessage' => 'Error: Repeating notification hash'
      ));
      return;
    }
    if(!($notification)){
      echo json_encode(array(
        'errorMessage' => 'Error: Notication not found'
      ));
      return;
    }

    if($notification[0]['user_hash'] != $_POST['user_hash']){
      echo json_encode(array(
        'errorMessage' => 'Error: Invalid permissions'
      ));
      return;
    }
    else{

      if($notification[0]['notification_type'] == "question"){
        require_once "../DbMethods/baabl_questions.php";
        $question = baabl_questions::getQuestionByHash($notification[0]['notification_trigger_hash']);
        if(count($question) > 1){
          echo json_encode(array(
            'errorMessage' => 'Error: Repeating question hash'
          ));
          return;
        }
        if(!($question)){
          echo json_encode(array(
            'errorMessage' => 'Error: Question not found'
          ));
          return;
        }
        if($question[0]['question_answered'] == 1){
          require_once "../DbMethods/baabl_answers.php";
          $answer = baabl_answers::getAnswerByQuestionHash($question[0]['question_hash']);
          if(count($answer) > 1){
            echo json_encode(array(
              'errorMessage' => 'Error: Repeating answer hash'
            ));
            return;
          }
          if(!($answer)){
            echo json_encode(array(
              'errorMessage' => 'Error: Answer not found'
            ));
            return;
          }
          else{
            echo json_encode(array(
              'notification_type' => "question answered",
              'question_text' => $question[0]['question_text'],
              'question_time' => $question[0]['question_time'],
              'question_hash' => $question[0]['question_hash'],
              'answer_text' => $answer[0]['answer_text'],
              'answer_hash' => $answer[0]['answer_hash'],
              'answer_time' => $answer[0]['answer_time']
            ));
          }
        }
        else{
          echo json_encode(array(
            'notification_type' => "question",
            'question_text' => $question[0]['question_text'],
            'question_time' => $question[0]['question_time'],
            'question_hash' => $question[0]['question_hash']
          ));
        }

      }





      if($notification[0]['notification_type'] == "answer"){
        require_once "../DbMethods/baabl_answers.php";
        $answer = baabl_answers::getAnswerByHash($notification[0]['notification_trigger_hash']);
        if(count($answer) > 1){
          echo json_encode(array(
            'errorMessage' => 'Error: Repeating answer hash'
          ));
          return;
        }
        if(!($answer)){
          echo json_encode(array(
            'errorMessage' => 'Error: Answer not found'
          ));
          return;
        }
        else{
          require_once "../DbMethods/baabl_questions.php";
          $question = baabl_questions::getQuestionByHash($answer[0]['question_hash']);
          if(count($question) > 1){
            echo json_encode(array(
              'errorMessage' => 'Error: Repeating question hash'
            ));
            return;
          }
          if(!($question)){
            echo json_encode(array(
              'errorMessage' => 'Error: Question not found'
            ));
            return;
          }
          else{
            echo json_encode(array(
              'notification_type' => "answer",
              'question_text' => $question[0]['question_text'],
              'question_time' => $question[0]['question_time'],
              'question_hash' => $question[0]['question_hash'],
              'answer_text' => $answer[0]['answer_text'],
              'answer_hash' => $answer[0]['answer_hash'],
              'answer_time' => $answer[0]['answer_time']
            ));
          }
        }

      }



    }

  }

}






function deleteQuestion(){

  if (empty($_POST['question_hash'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_questions.php";

    $question = baabl_questions::getQuestionByHash($_POST['question_hash']);
    if(count($question)>1){
      echo json_encode(array(
        'errorMessage' => 'Error: Repeating question hash'
      ));
      return;
    }
    if(!($question)){
      echo json_encode(array(
        'errorMessage' => 'Error: Question not found'
      ));
      return;
    }
    if($question[0]['user_hash'] != $_SESSION['user_hash']){
      echo json_encode(array(
        'errorMessage' => 'Error: Invalid permissions'
      ));
      return;
    }
    else{
      if($question[0]['question_answered'] == 1){
        require_once "../DbMethods/baabl_answers.php";
        $answer = baabl_answers::getAnswerByQuestionHash($_POST['question_hash']);
        $deleteAnswer = baabl_answers::deleteAnswerByQuestionHash($_POST['question_hash']);
        if($deleteAnswer){
          $deleteQuestion = baabl_questions::deleteQuestionByHash($_POST['question_hash']);
          if($deleteQuestion){
            require_once "../DbMethods/baabl_notifications.php";
            $notification = baabl_notifications::deleteNotificationByTypeAndTriggerHash("question", $_POST['question_hash']);
            $notification = baabl_notifications::deleteNotificationByTypeAndTriggerHash("answer", $answer[0]['answer_hash']);
            echo json_encode(array(
              'success' => 'Question Deleted'
            ));
          }
          else{
            echo json_encode(array(
              'errorMessage' => 'Error: Question could not be deleted'
            ));
            return;
          }
        }
        else{
          echo json_encode(array(
            'errorMessage' => 'Error: Answer could not be deleted'
          ));
        }
      }
      else{

        $deleteQuestion = baabl_questions::deleteQuestionByHash($_POST['question_hash']);
        if($deleteQuestion){
          require_once "../DbMethods/baabl_notifications.php";
          $notification = baabl_notifications::deleteNotificationByTypeAndTriggerHash("question", $_POST['question_hash']);
          echo json_encode(array(
            'success' => 'Question Deleted'
          ));
        }
        else{
          echo json_encode(array(
            'errorMessage' => 'Error: Question could not be deleted'
          ));
          return;
        }

      }

    }

  }

}




function reportQuestion(){

  if (empty($_POST['question_hash']) || empty($_POST['report'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_questions.php";

    $row = array(
      'question_reported' => 1
    );

    $updateQuestion = baabl_questions::updateQuestionByHash($row, $_POST['question_hash']);
    if($updateQuestion){
      require_once "../DbMethods/baabl_reports.php";
      $report_hash = substr(md5(uniqid(mt_rand(), true)), 0, 20);
      $reportRow = array(
        'report_hash' => $report_hash,
        'report_type' => "question",
        'report_message' => $_POST['report'],
        'reported_hash' => $_POST['question_hash'],
        'user_hash' => $_SESSION['user_hash']
      );
      $report = baabl_reports::newReport($reportRow);
      if($report){
        echo json_encode(array(
          'success' => 'Question reported'
        ));
      }
      else{
        echo json_encode(array(
          'errorMessage' => 'Error: Failted to log report message'
        ));
      }
    }
    else{
      echo json_encode(array(
        'errorMessage' => 'Error: Failted to report question'
      ));
      return;
    }



  }

}





function newAnswer(){

  if (empty($_POST['question_hash']) || empty($_POST['answer_text'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
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

    require_once "../DbMethods/baabl_answers.php";

    $answer_hash = substr(md5(uniqid(mt_rand(), true)), 0, 20);

    $row = array(
      'answer_hash' => $answer_hash,
      'question_hash' => $_POST['question_hash'],
      'user_hash'=> $_SESSION['user_hash'],
      'answer_text' => $_POST['answer_text']
    );

    $newAnswer = baabl_answers::newAnswer($row);

    if($newAnswer){
      require_once "../DbMethods/baabl_notifications.php";
      require_once "../DbMethods/baabl_questions.php";

      $question = baabl_questions::getQuestionByHashAll($_POST['question_hash']);
      if(count($question)>1){
        echo json_encode(array(
          'errorMessage' => 'Error: Repeating question hash'
        ));
        return;
      }
      if(!($question)){
        echo json_encode(array(
          'errorMessage' => 'Error: Question not found'
        ));
        return;
      }
      $notification_hash = substr(md5(uniqid(mt_rand(), true)), 0, 20);
      $notificationRow = array(
        'notification_hash' => $notification_hash,
        'notification_type' => "answer",
        'notification_trigger_hash' => $answer_hash,
        'user_hash' => $question[0]['author_hash']
      );
      $questionRow = array(
        'question_answered' => 1
      );
      $updateQuestion=  baabl_questions::updateQuestionByHash($questionRow, $_POST['question_hash']);
      if(!($updateQuestion)){
        echo json_encode(array(
          'errorMessage' => "Failed to respond to question"
        ));
      }
      $newNotification = baabl_notifications::newNotification($notificationRow);
      if($newNotification){
        echo json_encode(array(
          'success' => "Response submitted",
          'answer_hash' => $answer_hash
        ));
      }
      else{
        echo json_encode(array(
          'errorMessage' => "Failed to create notification"
        ));
      }

    }
    else{
      echo json_encode(array(
        'errorMessage' => "Failed to submit response"
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





function reportAnswer(){

  if (empty($_POST['answer_hash']) || empty($_POST['report'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_answers.php";

    $row = array(
      'answer_reported' => 1
    );

    $updateAnswer = baabl_answers::updateAnswerByHash($row, $_POST['answer_hash']);
    if($updateAnswer){
      require_once "../DbMethods/baabl_reports.php";
      $report_hash = substr(md5(uniqid(mt_rand(), true)), 0, 20);
      $reportRow = array(
        'report_hash' => $report_hash,
        'report_type' => "answer",
        'report_message' => $_POST['report'],
        'reported_hash' => $_POST['answer_hash'],
        'user_hash' => $_SESSION['user_hash']
      );
      $report = baabl_reports::newReport($reportRow);
      if($report){
        echo json_encode(array(
          'success' => 'Answer reported'
        ));
      }
      else{
        echo json_encode(array(
          'errorMessage' => 'Error: Failted to log report message'
        ));
      }
    }
    else{
      echo json_encode(array(
        'errorMessage' => 'Error: Failted to report answer'
      ));
      return;
    }



  }

}
