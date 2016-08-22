<?php /* Smarty version 3.1.27, created on 2016-04-18 01:53:11
         compiled from "C:\wamp\www\baabl\templates\upload_test.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:25092571421e76ec1b2_80555904%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae456f4c70e832bfe7b022129a4ce537abd97549' => 
    array (
      0 => 'C:\\wamp\\www\\baabl\\templates\\upload_test.tpl',
      1 => 1460937188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25092571421e76ec1b2_80555904',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_571421e7711578_44214363',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_571421e7711578_44214363')) {
function content_571421e7711578_44214363 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '25092571421e76ec1b2_80555904';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Baabl Profile</title>
  <meta charset="UTF-8">




  <!-- <link rel="stylesheet" type="text/css" href="../static/dropzone.css" /> -->

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

  <?php echo '<script'; ?>
 type="text/javascript" src="../bower_components/webcomponentsjs/webcomponents.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="../static/ajax_uploader.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="../static/image_select.js"><?php echo '</script'; ?>
>
  <link rel="stylesheet" type="text/css" href="../static/image_select.css" />

  <link rel="import" href="../polymer/header.html">
  <link rel="import" href="../polymer/sidebar.html">
  <link rel="import" href="../polymer/notification.html">
  <link rel="import" href="../polymer/profile_answers.html">


  <link rel="import" href="../bower_components/paper-button/paper-button.html">


</head>
<body>
  <div id = "image"></div>

<style>
#image {
    width: 100%;
    height: 600px;
    background-image: url("../images/blank_profile_photo.png");
}

</style>

<?php echo '<script'; ?>
>
document.addEventListener("DOMContentLoaded", function(event) {
  var rootLocation = "http://localhost/baabl/htdocs/";
  var location = rootLocation + "baabl_profile/baabl_profile_photos.php";

   $('#image').imgAreaSelect({ aspectRatio: '4:3', handles: true });



});

<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
?>