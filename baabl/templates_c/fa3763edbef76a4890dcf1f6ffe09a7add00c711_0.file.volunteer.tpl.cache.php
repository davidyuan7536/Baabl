<?php /* Smarty version 3.1.27, created on 2015-10-17 02:53:50
         compiled from "C:\wamp\www\audovillage\templates\volunteer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1232756219c1ecc5e46_15873183%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa3763edbef76a4890dcf1f6ffe09a7add00c711' => 
    array (
      0 => 'C:\\wamp\\www\\audovillage\\templates\\volunteer.tpl',
      1 => 1445043227,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1232756219c1ecc5e46_15873183',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56219c1eceb941_97432972',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56219c1eceb941_97432972')) {
function content_56219c1eceb941_97432972 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1232756219c1ecc5e46_15873183';
?>
<head>
  <link rel="stylesheet" type="text/css" href="../static/volunteer/volunteer.css" />

  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300,100' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
 type="text/javascript" src="../static/volunteer/volunteer.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../static/jssor.slider.min.js"><?php echo '</script'; ?>
>


  <?php echo '<script'; ?>
 src="../bower_components/webcomponentsjs/webcomponents-lite.js"><?php echo '</script'; ?>
>

  <link rel="import" href="../polymer/header.html">


</head>

<body>

  <navigation-header></navigation-header>

  <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register Organization</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="recipient-name" class="control-label">Organization Name</label>
          <input type="text" class="form-control" id="orgName">
        </div>
        <div class="form-group">
          <label for="recipient-name" class="control-label">Organization Website</label>
          <input type="text" class="form-control" id="recipient-name">
        </div>
        <div class="form-group">
          <label for="recipient-name" class="control-label">Address</label>
          <input type="text" class="form-control" style = "margin-bottom: 10px;" id="recipient-name">
          <input type="text" class="form-control" style = "margin-bottom: 10px;" id="recipient-name">
          <input type="text" class="form-control" style = "margin-bottom: 10px;" id="recipient-name">
          <input type="text" class="form-control" id="recipient-name">
        </div>
        <div class="form-group">
          <label for="message-text" class="control-label">Mission (400 Characters Max)</label>
          <textarea class="form-control" id="message-text"></textarea>
        </div>+

      </div>
      <div class="modal-footer">
        <paper-button data-dismiss="modal">Close</paper-button>
        <paper-button>Save changes</paper-button>
      </div>
    </div>
  </div>
</div>


</body>
<?php }
}
?>