<?php /* Smarty version 3.1.27, created on 2015-12-18 01:15:09
         compiled from "C:\wamp\www\baabl\templates\dashboard.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:302395673500db6ea32_70755923%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0a9db5c4bcee6bb672eb74de53d842a3212e87dd' => 
    array (
      0 => 'C:\\wamp\\www\\baabl\\templates\\dashboard.tpl',
      1 => 1450097199,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '302395673500db6ea32_70755923',
  'variables' => 
  array (
    'current_user_first' => 0,
    'current_user_last' => 0,
    'current_user_email' => 0,
    'current_user_hash' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5673500dd6ca66_57248567',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5673500dd6ca66_57248567')) {
function content_5673500dd6ca66_57248567 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '302395673500db6ea32_70755923';
?>
<head>
  <title>Baabl Dashboard</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../static/dashboard/dashboard.css" />
  <?php echo '<script'; ?>
 type="text/javascript" src="../static/dashboard/dashboard.js"><?php echo '</script'; ?>
>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>
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
      <a id = "confirmationToastYes" class="btn paper-raise">Yes</a>
      <a id = "confirmationToastNo" class="btn paper-raise">No</a>
  </div>

<div id = "header_sidebar_container">
  <message-sidebar></message-sidebar>

</div>

  <div class="main_content">
    <textarea maxlength="1000" id = "baabl_message" placeholder="Add your baabl!"></textarea>
    <button class = "submit">submit</button>



  <paper-button class = "logout">logout</paper-button>


  <input id = "current_baabl_delete">
  <input id = "current_baabl_comment_delete">

  <input id = "current_user_first"  value=<?php echo $_smarty_tpl->tpl_vars['current_user_first']->value;?>
>

  <input id = "current_user_last"  value=<?php echo $_smarty_tpl->tpl_vars['current_user_last']->value;?>
>
  <input id = "current_user_email"  value=<?php echo $_smarty_tpl->tpl_vars['current_user_email']->value;?>
>
  <input id = "current_user_hash"  value=<?php echo $_smarty_tpl->tpl_vars['current_user_hash']->value;?>
>

  <br>
  <div id = "baabl_container">
  </div>


  <div class="modal fade" id="report_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="report_modal_title">Reason for report</h4>
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