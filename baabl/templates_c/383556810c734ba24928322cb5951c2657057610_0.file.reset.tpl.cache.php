<?php /* Smarty version 3.1.27, created on 2015-10-08 01:15:25
         compiled from "C:\wamp\www\audovillage\templates\reset.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:149235615a78decb7b7_30640690%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '383556810c734ba24928322cb5951c2657057610' => 
    array (
      0 => 'C:\\wamp\\www\\audovillage\\templates\\reset.tpl',
      1 => 1444258839,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '149235615a78decb7b7_30640690',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5615a78df12572_58888379',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615a78df12572_58888379')) {
function content_5615a78df12572_58888379 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '149235615a78decb7b7_30640690';
?>
<header>

  <link rel="stylesheet" type="text/css" href="../static/reset/reset.css" />

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
 type="text/javascript" src="../static/reset/reset.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../static/jssor.slider.min.js"><?php echo '</script'; ?>
>


  <?php echo '<script'; ?>
 src="../bower_components/webcomponentsjs/webcomponents-lite.js"><?php echo '</script'; ?>
>

  <link rel="import" href="../bower_components/paper-button/paper-button.html">
  <link rel="import" href="../bower_components/paper-material/paper-material.html">


</header>

<body>
  <div class="wrapper">

    <paper-material elevation="3">

      <div id = "resetHeader">
        <h1><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span><h1>
        </div>
        <div id = "resetCaret"></div>
          <div id = "resetFree">
            <h2>Reset <span>Password<span><h2>
          </div>

            <div id = "resetBody">

            <div class="row">
              <h6>Please enter the email you have signed up with</h6>
            </div>
            <div class="form-group">
              <div class="icon-addon addon-md">
                <label for="resetEmail" id = "resetEmailGlyph" class="glyphicon glyphicon-envelope"></label>
                <input type="email" class="form-control" id="resetEmail" placeholder="Email">
              </div>
            </div>


            </div>

            <div id = "resetBody2" style = "display: none">

            <div class="row">
              <h6>A temporary password has been sent to your email. You may reset your password after signing in</h6>
            </div>
            <div class="form-group">
              <div class="icon-addon addon-md">
                <label for="resetEmail" id = "resetPasswordGlyph" class="glyphicon glyphicon-barcode"></label>
                <input type="email" class="form-control" id="resetPassword" placeholder="New Password">
              </div>
            </div>


            </div>


            <button id="resetButton">Submit</button>

            <div id = "resetNotMember">Not a member? <a href = "../htdocs/signup.php">Join Now</a></div>




          </paper-material>

          <div id = "notificationToast">
              <h2>cool</h2>
          </div>




          <ul class="bg-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>

        </div>

      </body>
<?php }
}
?>