<?php
/*%%SmartyHeaderCode:762565e550bc571a2_05462144%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a9db5c4bcee6bb672eb74de53d842a3212e87dd' => 
    array (
      0 => 'C:\\wamp\\www\\baabl\\templates\\dashboard.tpl',
      1 => 1449022636,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '762565e550bc571a2_05462144',
  'tpl_function' => 
  array (
  ),
  'variables' => 
  array (
    'current_user_first' => 0,
    'current_user_last' => 0,
    'current_user_email' => 0,
    'current_user_hash' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565e550bdd4a70_38243307',
  'cache_lifetime' => 3600,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565e550bdd4a70_38243307')) {
function content_565e550bdd4a70_38243307 ($_smarty_tpl) {
?>
<head>
  <title>Baabl Dashboard</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../static/dashboard/dashboard.css" />
  <script type="text/javascript" src="../static/dashboard/dashboard.js"></script>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="import" href="../polymer/header.html">
  <link rel="import" href="../polymer/sidebar.html">
  <link rel="import" href="../polymer/notification.html">
  <link rel="import" href="../polymer/baabl.html">

    <link rel="import" href="../bower_components/paper-button/paper-button.html">


</head>
<body>

  <div id = "notificationToast">
      <h2>cool</h2>
  </div>

  <div id = "confirmationToast">
      <div id = "confirmationMessage">
      </div>
      <paper-button id = "confirmationToastYes">Yes</paper-button>
      <paper-button id = "confirmationToastNo">No</paper-button>
  </div>

<div id = "header_sidebar_container">
  <!-- <message-sidebar></message-sidebar>
  <navigation-header></navigation-header> -->

</div>

  <div class="main_content">
    <textarea maxlength="1000" id = "baabl_message" placeholder="Add your baabl!"></textarea>
    <button class = "submit">submit</button>



  <paper-button class = "logout">logout</paper-button>


  <input id = "current_baabl_delete">
  <input id = "current_baabl_comment_delete">

  <input id = "current_user_first" ype="text" name="fname" value=David>

  <input id = "current_user_last" ype="text" name="fname" value=Yuan>
  <input id = "current_user_email" ype="text" name="fname" value=davidyuan7536@gmail.com>
  <input id = "current_user_hash" ype="text" name="fname" value=409e4413>

  <br>
  <div id = "baabl_container">
  </div>


  <div class="modal fade" id="report_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="report_modal_title">Reason for report Baabl</h4>
        </div>
        <div class="modal-body">
          <textarea id = "report_modal_report"></textarea>
        </div>
        <div class="modal-footer">
          <paper-button data-dismiss="modal">Close</paper-button>
          <paper-button id = "report_modal_submit">Submit</paper-button>
        </div>
      </div>
    </div>
  </div>



</div>


</body>
<?php }
}
?>