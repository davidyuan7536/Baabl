<?php /* Smarty version 3.1.27, created on 2015-12-28 15:13:30
         compiled from "C:\wamp\www\baabl\templates\notification.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:198825681438a5fa7d0_39284655%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '719e52a142679ef49b700163994286f4e5408d4d' => 
    array (
      0 => 'C:\\wamp\\www\\baabl\\templates\\notification.tpl',
      1 => 1451311983,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198825681438a5fa7d0_39284655',
  'variables' => 
  array (
    'notification_hash' => 0,
    'user_hash' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5681438a62b7e2_45450460',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5681438a62b7e2_45450460')) {
function content_5681438a62b7e2_45450460 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '198825681438a5fa7d0_39284655';
?>
<head>
  <title>Baabl notification</title>
  <meta charset="UTF-8">
  <?php echo '<script'; ?>
 type="text/javascript" src="../bower_components/webcomponentsjs/webcomponents.js"><?php echo '</script'; ?>
>
  <link rel="stylesheet" type="text/css" href="../static/notification/notification.css" />
  <?php echo '<script'; ?>
 type="text/javascript" src="../static/notification/notification.js"><?php echo '</script'; ?>
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
  <link rel="import" href="../polymer/profile_answers.html">


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

  <input style = "display:none" id = "notification_hash"  value=<?php echo $_smarty_tpl->tpl_vars['notification_hash']->value;?>
>
  <input style = "display:none" id = "user_hash"  value=<?php echo $_smarty_tpl->tpl_vars['user_hash']->value;?>
>




  <div id = "header_sidebar_container">
    <message-sidebar></message-sidebar>
  </div>

  <div class="main_content">

    <div id = "question_answer_wrap">
      <div id = "question_wrap">
        <div id = "question"></div>

        <div id = "question_report">
          <span class="fa fa-gavel"></span> Report
        </div>

        <div id = "question_delete">
          <span class="fa fa-eraser"></span> Delete
        </div>

      </div>

      <div id = "answer_wrap">
        <textarea id = "answer" maxlength="1000" placeholder="Write your response here..."></textarea>

        <div id="the-count-answer">
          <span id="current-answer">0</span>
          <span id="maximum-answer">/ 1000</span>
        </div>

        <div id = "answer_display"></div>
      </div>


      <div id = "answer_report">
        <span class="fa fa-gavel"></span> Report
      </div>

      <paper-button id = "answer_submit">Submit</paper-button>
      <paper-button id = "answer_edit">Edit</paper-button>
      <paper-button id = "answer_cancel">Cancel</paper-button>
    </div>


    <div id = "baabl_wrap">
      <div id = "baabl_description">
        Submit a Baabl
      </div>
      <textarea id = "baabl" maxlength="1000"></textarea>
      <div id="the-count">
        <span id="current">0</span>
        <span id="maximum">/ 1000</span>
      </div>
      <paper-button id = "baabl_submit">Submit</paper-button>
    </div>
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


</body>
<?php }
}
?>