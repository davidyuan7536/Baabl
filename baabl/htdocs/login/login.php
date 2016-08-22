<?php

session_start();
require('../config.php');

if (isset($_POST['Action'])) {
  switch ($_POST['Action']) {
    case "Authenticate":
      authenticate();
      break;
    case "Signup":
      signup();
      break;
    case "Logout":
      logout();
      break;
    case "ConfirmResetPassword":
      confirmResetPassword();
      break;
    default:
    echo json_encode(array(
      'errorMessage' => 'Server Error: Post action not recognized'
    ));
  }
}


function authenticate(){
  require_once "../DbSimple/Utils.php";
  if (empty($_POST['email']) || empty($_POST['password'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_users.php";
    $user = baabl_users::getUserByEmail(Utils::escape($_POST['email']));

    if (!empty($user)){
      if(password_verify($_POST['password'], $user['user_password'])){
          $_SESSION['user_email'] = $_POST['email'];
          $_SESSION['user_hash'] =$user['user_hash'];
          $_SESSION['user_first'] = $user['user_first_name'];
          $_SESSION['user_last'] = $user['user_last_name'];
          echo json_encode(array(
            'newPage' => 'dashboard'
          ));
      }
      else{
        echo json_encode(array(
          'errorMessage' => 'Error: Incorrect password'
        ));
      }
    }
    else{
      echo json_encode(array(
        'errorMessage' => 'Error: Unregistered email'
      ));
    }
  }
}

function signup(){
  require_once "../DbSimple/Utils.php";
  if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['password'])) {
    echo json_encode(array(
      'errorMessage' => 'Error: Empty field(s)'
    ));
  }
  else {
    require_once "../DbMethods/baabl_users.php";
    $user = baabl_users::getUserByEmail(Utils::escape($_POST['email']));
    if (!empty($user)){
      echo json_encode(array(
        'errorMessage' => 'Error: Email in use'
      ));
    }
    else{
      if (!(filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL))) {
        echo json_encode(array(
          'errorMessage' => 'Error: Invalid email'
        ));
        return;
      }

      if(!preg_match("/^[a-zA-Z'-]+$/",$_POST['firstName'])){
        echo json_encode(array(
          'errorMessage' => 'Error: Invalid first name'
        ));
        return;
      }

      if(!preg_match("/^[a-zA-Z'-]+$/",$_POST['lastName'])){
        echo json_encode(array(
          'errorMessage' => 'Error: Invalid last name'
        ));
        return;
      }


      $user_hash = substr(md5(uniqid(mt_rand(), true)), 0, 10);
      $password_hash = password_hash(Utils::escape($_POST['password']), PASSWORD_DEFAULT);

      $row = array(
        'user_hash' => $user_hash,
        'user_first_name' => Utils::escape($_POST['firstName']),
        'user_last_name' => Utils::escape($_POST['lastName']),
        'user_email' => Utils::escape($_POST['email']),
        'user_password' => $password_hash
      );

      $newUser = baabl_users::newUser($row);

      if ($newUser){
        $_SESSION['user_email'] = $_POST['email'];
        $_SESSION['user_hash'] = $user_hash;
        $_SESSION['user_first'] = Utils::escape($_POST['firstName']);
        $_SESSION['user_last'] = Utils::escape($_POST['lastName']);
        echo json_encode(array(
          'newPage' => 'dashboard'
        ));
      }
      else {
        echo json_encode(array(
          'errorMessage' => 'Error: Failed to create new user'
        ));

      }
    }
  }
}

function logout(){
  $_SESSION = array();

  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), '', time() - 42000,
          $params["path"], $params["domain"],
          $params["secure"], $params["httponly"]
      );
  }
  session_destroy();
  echo json_encode(array(
    'newPage' => 'index'
  ));


}


?>
