<?php /* Smarty version 3.1.27, created on 2015-10-08 05:42:15
         compiled from "C:\wamp\www\audovillage\templates\login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:265175615e617d0fa66_54484457%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8802f4dcfb5759a015e089233a42b832486d704b' => 
    array (
      0 => 'C:\\wamp\\www\\audovillage\\templates\\login.tpl',
      1 => 1444275634,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265175615e617d0fa66_54484457',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5615e617d4d4d8_93137204',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5615e617d4d4d8_93137204')) {
function content_5615e617d4d4d8_93137204 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '265175615e617d0fa66_54484457';
?>
<header>

  <link rel="stylesheet" type="text/css" href="../static/login/login.css" />

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
 type="text/javascript" src="../static/login/login.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../static/jssor.slider.min.js"><?php echo '</script'; ?>
>


  <?php echo '<script'; ?>
 src="../bower_components/webcomponentsjs/webcomponents-lite.js"><?php echo '</script'; ?>
>

  <link rel="import" href="../bower_components/paper-button/paper-button.html">
  <link rel="import" href="../bower_components/paper-toast/paper-toast.html">
  <link rel="import" href="../bower_components/paper-input/paper-input.html">
  <link rel="import" href="../bower_components/paper-ripple/paper-ripple.html">
  <link rel="import" href="../bower_components/paper-material/paper-material.html">


</header>

<body>
  <div class="wrapper">

    <paper-material elevation="3">

      <div id = "loginHeader">
        <h1><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span><h1>
        </div>
        <div id = "loginCaret"></div>
          <div id = "loginFree">
            <h2>Log<span>in<span><h2>
          </div>

            <div id = "loginBody">
              <div class="form-group">
                <div class="icon-addon addon-md">
                  <label for="loginEmail" id = "loginEmailGlyph" class="glyphicon glyphicon-envelope"></label>
                  <input type="email" class="form-control" id="loginEmail" placeholder="Email">
                </div>
              </div>
              <div class="form-group">
                <div class="icon-addon addon-md">
                  <label for="loginPassword" id = "loginPasswordGlyph" class="glyphicon glyphicon-barcode"></label>
                  <input type="password" class="form-control" id="loginPassword" placeholder="Password">
                </div>
              </div>

            </div>

            <div id = "loginBody2" style = "display: none">
              <div class="form-group">
                <div class="row">
                  <h6>An activation code has been sent to your email. Please enter it to activate your account</h6>
                </div>
                <div class="icon-addon addon-md">
                  <label for="loginEmail" id = "loginActivationGlyph" class="glyphicon glyphicon-qrcode"></label>
                  <input type="email" class="form-control" id="loginActivation" placeholder="Activation Code">
                </div>
              </div>
            </div>




            <button id="loginButton">Submit</button>
            <div id = "loginForgot">Forgot your password? <a href = "../htdocs/reset.php">Reset</a></div>
            <div id = "loginNotMember">Not a member? <a href = "../htdocs/signup.php">Join Now</a></div>




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