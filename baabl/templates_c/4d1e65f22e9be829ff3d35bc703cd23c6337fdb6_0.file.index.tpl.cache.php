<?php /* Smarty version 3.1.27, created on 2015-09-15 04:45:31
         compiled from "C:\wamp\www\safety\templates\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2271055f7864b15e818_93805694%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d1e65f22e9be829ff3d35bc703cd23c6337fdb6' => 
    array (
      0 => 'C:\\wamp\\www\\safety\\templates\\index.tpl',
      1 => 1442285127,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2271055f7864b15e818_93805694',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55f7864b197b38_97168506',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f7864b197b38_97168506')) {
function content_55f7864b197b38_97168506 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2271055f7864b15e818_93805694';
?>
<head>
<link rel="stylesheet" type="text/css" href="../static/slider/jquery.fullPage.css" />
<!-- <link rel="stylesheet" type="text/css" href="../static/index/index.css" /> -->

	<style>

	/* Style for our header texts
	* --------------------------------------- */
	h1{
		font-size: 5em;
		font-family: arial,helvetica;
		color: #fff;
		margin:0;
	}
	.intro p{
		color: #fff;
	}

	/* Centered texts in each section
	* --------------------------------------- */
	.section{
		text-align:center;
	}


	/* Overwriting styles for the navigation dots (to place it where we want)
	* --------------------------------------- */
	.fp-slidesNav.bottom{
		bottom: 25px;
	}

	/* Bottom menu
	* --------------------------------------- */
	#infoMenu li a {
		color: #fff;
	}

	#section2 h1{
		color: #333;
	}

	</style>


  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>

	<?php echo '<script'; ?>
 type="text/javascript" src="../static/slider/vendors/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="../static/slider/jquery.fullPage.js"><?php echo '</script'; ?>
>



	<?php echo '<script'; ?>
 type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				anchors: ['firstPage', 'secondPage', 'thirdPage'],
				sectionsColor: ['#333', '#EAE1C0', '#DE564B'],
				slidesNavigation: true,
			});
		});
	<?php echo '</script'; ?>
>

</head>
<body>

	<style>
	.section {
	  width: 100%;
	}

	.container {
	  position: relative;
	  width: 1170px;
	  margin: 0 auto;
	  color: #444;
	  font-size: 14px;
	  font-weight: 300;
	  font-family: Roboto, 'Open Sans', Arial, sans-serif;
	  overflow: hidden;
	}

	.section .container {
	  padding: 30px 0 50px 0;
	}

	.section.bg {
	  background: #f7f7f7;
	}
	/*
	  Header
	*/

	.hold {
	  height: 80px;
	}

	.header {
	  line-height: 40px;
	  width: 100%;
	  transition: line-height 0.2s linear, box-shadow 0.2s linear;
	  position: fixed;
	  top: 0;
	  left: 0;
	  z-index: 100;
	  background: rgba(245, 245, 245, 0.97);
	}

	.header.small {
	  line-height: 20px;
	  box-shadow: 0px 1px 3px 0px rgba(50, 50, 50, 0.8);
	}

	.header.small > .container > #logo {
	  height: 40px;
	}

	ul.nav {
	  float: right;
	  list-style: none;
	  margin: 0;
	  padding: 0;
	}

	ul.nav li {
	  float: left;
	  position: relative;
	}

	ul.nav li a {
	  transition: color 0.2s linear;
	  font-size: 18px;
	}

	ul.nav li:hover a {
	  color: red;
	}

	ul.nav li a {
	  padding: 21px;
	  color: initial;
	  text-decoration: initial;
	}

	</style>
	<div class="header">
		<div class="container">

			<ul class="nav">
				<li><a href="#firstPage">Home</a></li>
				<li><a href="#thirdPage">About the Author</a></li>
				<li><a href="#thirdPage/slide2">Blog</a></li>
				<li><a href="#thirdPage/slide3">Contact</a></li>
			</ul>
		</div>
	</div>
</div>


<div id="fullpage">

	<div class="section " id="section0">
		<div class="sec">
			<div class="slider">
				<div class="container slidercontent">
					<h1>Your Amazing Itty Bitty Safety Book</h1>
					<h2>Stephen Chares Carpenter</h2>
					<div><span>15 Essential Steps for the Safe and Healthy Workplace Enviroment</span></div>
          <div style = "color: white">Design not final...just at template</div>
				</div>
			</div>
		</div>
	</div>

  <div class="section" id="section1">
    <div class="intro">
      <h1>About the book section</h1>
    </div>
  </div>


	<div class="section" id="section2">
	    <div class="slide" id="slide1" data-anchor="slide1">
			<div class="intro">
				<h1>About The Author</h1>
				<p>
					Personal Bio Here.
				</p>
			</div>
		</div>

	    <div class="slide" id="slide2" data-anchor="slide2">
      <div class="intro">
			<h1>Blog</h1>
      <p>
        Most Recent Blog Post.
      </p>
		</div>
  </div>

		<div class="slide" id="slide3" data-anchor="slide3">
      			<div class="intro">
      <h1>Contact</h1>
      <p>
        Your Contact Info and a Form that users can submit to email you...etc
      </p>
		</div>
  </div>

	</div>

</div>


</body>
</html>
<?php }
}
?>