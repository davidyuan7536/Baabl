<?php
/*%%SmartyHeaderCode:105895612e278d84a23_04733005%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bc16b5dc6f50c8c2be188c49401a971648d0123' => 
    array (
      0 => 'C:\\wamp\\www\\audovillage\\templates\\index.tpl',
      1 => 1444078198,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105895612e278d84a23_04733005',
  'tpl_function' => 
  array (
  ),
  'version' => '3.1.27',
  'unifunc' => 'content_564173ba50de84_18401734',
  'has_nocache_code' => false,
  'cache_lifetime' => 3600,
),true);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564173ba50de84_18401734')) {
function content_564173ba50de84_18401734 ($_smarty_tpl) {
?>
<head>

	<!-- <link rel="stylesheet" type="text/css" href="../static/index/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="../static/index/css/demo.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="../static/index/css/component.css" /> -->
	<link rel="stylesheet" type="text/css" href="../static/index/index.css" />



	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,100' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<script type="text/javascript" src="../static/index/index.js"></script>

	<script src="../static/jssor.slider.min.js"></script>


	<script src="../bower_components/webcomponentsjs/webcomponents-lite.js"></script>

	<link rel="import" href="../bower_components/paper-button/paper-button.html">
	<link rel="import" href="../bower_components/paper-toast/paper-toast.html">
	<link rel="import" href="../bower_components/paper-input/paper-input.html">
	<link rel="import" href="../bower_components/paper-material/paper-material.html">






</head>
<body>

<style>


#header{
	position:fixed;
	height: 50px;
	display:block;
	width: 100%;
	background: #fff;
	-webkit-transition: backgroundcolor 0.5s;
	-moz-transition:    background-color 0.5s;
	-ms-transition:     background-color 0.5s;
	-o-transition:      background-color 0.5s;
	transition:         background-color 0.5s;
	z-index:9;
	top:0px;
	padding-right: 80px;
	box-shadow: 0px 1px 1px #888;

}

#header.secondary{
	background: #424242;
	box-shadow: 0px 1px 1px #888;
}

#header.secondary #headerNavlist a{
	text-decoration:none;
	font-family: 'Lato', sans-serif;
	color: #fff;
	position: relative;
	top: 12px;
	font-size: 15px;
	border-radius: 2px;
	padding-top: 5px;
	padding-bottom: 5px;
	padding-left: 15px;
	padding-right: 15px;

}

#header.secondary #headerNavlist a:hover{
	color: #FF4545;
}

#header.secondary #headerNavlist a.signUp{
	text-decoration:none;
	background-color: #FF4545;
	-webkit-transition: backgroundcolor 0.5s;
	-moz-transition:    background-color 0.5s;
	-ms-transition:     background-color 0.5s;
	-o-transition:      background-color 0.5s;
	transition:         background-color 0.5s;
	color: #fff;
	/*-webkit-transition: color 0.5s;
	-moz-transition:    color 0.5s;
	-ms-transition:     color 0.5s;
	-o-transition:      color 0.5s;
	transition:         color 0.5s;*/
	position: relative;
	top: 12px;
	font-size: 15px;
	border-radius: 2px;
	padding-top: 5px;
	padding-bottom: 5px;
	padding-left: 15px;
	padding-right: 15px;

}

#header.secondary #headerNavlist a.signUp:hover{
	background-color: #fff;
	color: #424242;
}

#headerNavlist li
{
	display: inline;
	height: 100%;
	float: right;
	margin:0 30px 0 0;

}

#headerNavlist a{
	text-decoration:none;
	font-family: 'Lato', sans-serif;
	color: #000;
	position: relative;
	top: 12px;
	font-size: 15px;
	border-radius: 2px;
	padding-top: 5px;
	padding-bottom: 5px;
	padding-left: 15px;
	padding-right: 15px;

}

#headerNavlist a:hover{
	color : #FF4545;
}


#headerNavlist a.signUp{
	text-decoration:none;
	background-color: #FF4545;
	-webkit-transition: background-color 0.5s;
	-moz-transition:    background-color 0.5s;
	-ms-transition:     background-color 0.5s;
	-o-transition:      background-color 0.5s;
	transition:         background-color 0.5s;
	color: #fff;
	position: relative;
	top: 12px;
	font-size: 15px;
	border-radius: 2px;
	padding-top: 5px;
	padding-bottom: 5px;
	padding-left: 15px;
	padding-right: 15px;

}
#headerNavlist a.signUp:hover{

	background-color: #424242;

}

#large-header{
	background: url("../images/3.jpg");
	background-size:   cover;
	background-repeat: no-repeat;
	background-position: center center;
	background-attachment: fixed;
	height: 600px;

}

#large-header-blur{
	background: url("../images/3blur.jpg");
	background-size:   cover;
	background-repeat: no-repeat;
	background-position: center center;
	background-attachment: fixed;
	height: 600px;
	opacity: 0;
	margin-top: -600px;

}



#signupSection{
	padding-top: 30px;
	padding-bottom: 30px;
	min-height: 650px;
	background:
	linear-gradient(
		rgba(248, 247, 216, 0.7),
		rgba(248, 247, 216, 0.7)
		),
		url("../images/1.jpg");
	}


	#large-header-title{
		text-align: center;
	}

	#large-header-title h1{
		position: relative;
		margin-top: -400px;
		z-index: 1;
		color:#fff;

	}
	#large-header-title h2{
		position: relative;
		z-index: 1;
		color:#fff;

	}

	#large-header-title a{
		position: relative;
		top: 100px;
		text-decoration: none;
		z-index: 1;
		color: rgba(255,255,255,0.85);
		line-height: 30px;
		padding: 7px 14px;
		border: 1px solid rgba(255,255,255,0.3);
		border-radius: 2em;
		transition: all 0.3s ease;
	}

	#large-header-title a:hover{
		background-color: white;
		color: #FF4545;
		cursor: pointer;
	}

	#section0{
		height:600px;

	}

	#attributeSection{
		margin-bottom: 20px;

	}

	#attributeSection .moto {
		padding-top: 30px;
		width: 100%;
		height: 420px;
		margin: 30px 0;
		text-align: center;
		border: 1px solid #ddd;
		-webkit-transition: all 0.3s ease;
		transition: all 0.3s ease;
	}

	#attributeSection h2{
		font-family: 'Open Sans', sans-serif;
		font-weight: bold;
		width: 80%;
		margin: 0 auto;

	}

	#attributeSection h4{
		font-family: 'Open Sans', sans-serif;
		width: 80%;
		margin: 0 auto;
	}

	#section1{

	}

	#visionSection{
			background-color:#323a45


	}
	#visionSection h1{
		padding-top: 20px;
		font-family: 'Open Sans', sans-serif;
		font-weight: bold;
		margin-left: 40px;
		margin-right: 40px;
		color: #fff;
	}

	#visionSection p{
		font-family: 'Open Sans', sans-serif;
		margin-left: 40px;
		margin-right: 40px;
		color: #fff;
		padding-bottom: 20px;


	}

	#academicDescription{
			background-color:#323a45;
			display: none;

	}


	#academicDescription h1{
		padding-top: 20px;
		font-family: 'Open Sans', sans-serif;
		font-weight: bold;
		margin-left: 40px;
		margin-right: 40px;
		color: #fff;
	}

	#academicDescription p{
		font-family: 'Open Sans', sans-serif;
		margin-left: 40px;
		margin-right: 40px;
		color: #fff;
		padding-bottom: 20px;
	}

	#recreationalDescription{
		background-color:#323a45;
		display: none;
	}

	#recreationalDescription h1{
		padding-top: 20px;
		font-family: 'Open Sans', sans-serif;
		font-weight: bold;
		margin-left: 40px;
		margin-right: 40px;
		color: #fff;
	}

	#recreationalDescription p{
		font-family: 'Open Sans', sans-serif;
		margin-left: 40px;
		margin-right: 40px;
		color: #fff;
		padding-bottom: 20px;
	}

	#personalDescription{
		background-color:#323a45;
		display: none;
	}

	#personalDescription h1{
		padding-top: 20px;
		font-family: 'Open Sans', sans-serif;
		font-weight: bold;
		margin-left: 40px;
		margin-right: 40px;
		color: #fff;
	}

	#personalDescription p{
		font-family: 'Open Sans', sans-serif;
		margin-left: 40px;
		margin-right: 40px;
		color: #fff;
		padding-bottom: 20px;
	}

	#communityDescription{
		background-color:#323a45;
		display: none;
	}

	#communityDescription h1{
		padding-top: 20px;
		font-family: 'Open Sans', sans-serif;
		font-weight: bold;
		margin-left: 40px;
		margin-right: 40px;
		color: #fff;
	}

	#communityDescription p{
		font-family: 'Open Sans', sans-serif;
		margin-left: 40px;
		margin-right: 40px;
		color: #fff;
		padding-bottom: 20px;
	}


	#section2{
		padding-top: 20px;
		padding-bottom: 20px;


	}

	#section3 h2{
		font-family: 'Open Sans', sans-serif;
		font-weight: bold;
		margin-bottom: 20px;
	}

	#aboutDavid {
		background: url("../images/headshots/photos/david.jpg");
		background-repeat: no-repeat;
		background-position: 55% 50%;
		border-style: solid;
		border-width: 2px;
		border-color: #fff;
		background-color: #000;
		background-size: cover;
	}

	#aboutDavid h1{
		color: #fff;
		-webkit-transition: color 0.5s;
		-moz-transition:    color 0.5s;
		-ms-transition:     color 0.5s;
		-o-transition:      color 0.5s;
		transition:         color 0.5s;
		margin-top: 350px;

	}

	#aboutDavid:hover{
		cursor: pointer;
	}

	#aboutDavid:hover h1{
		color: #FF4545;
	}

	#aboutDavid:hover h2{
		color: #424242;
	}


	#aboutDavid h2{
			color: #fff;
			-webkit-transition: color 0.5s;
			-moz-transition:    color 0.5s;
			-ms-transition:     color 0.5s;
			-o-transition:      color 0.5s;
			transition:         color 0.5s;

	}

	#aboutBryan {
		background: url("../images/headshots/photos/bryan.jpg");
    background-position: 40% 50%;
		background-repeat: no-repeat;
		border-style: solid;
		border-width: 2px;
		border-color: #fff;
		background-color: #000;
		background-size: cover;
	}

	#aboutBryan h1{
		color: #fff;
		-webkit-transition: color 0.5s;
		-moz-transition:    color 0.5s;
		-ms-transition:     color 0.5s;
		-o-transition:      color 0.5s;
		transition:         color 0.5s;
		margin-top: 350px;

	}

	#aboutBryan:hover{
		cursor: pointer;

	}

	#aboutBryan:hover h1{
		color: #FF4545;
	}

	#aboutBryan:hover h2{
		color: #424242;
	}

	#aboutBryan h2{
		color: #fff;
		-webkit-transition: color 0.5s;
		-moz-transition:    color 0.5s;
		-ms-transition:     color 0.5s;
		-o-transition:      color 0.5s;
		transition:         color 0.5s;
	}


	#aboutMichelle {
		background: url("../images/headshots/photos/michelle.jpg");
		background-repeat: no-repeat;
		background-position: 55% 50%;
		border-style: solid;
		border-width: 2px;
		border-color: #fff;
		background-color: #000;
		background-size: cover;
	}

	#aboutMichelle h1{
		color: #fff;
		-webkit-transition: color 0.5s;
		-moz-transition:    color 0.5s;
		-ms-transition:     color 0.5s;
		-o-transition:      color 0.5s;
		transition:         color 0.5s;
		margin-top: 350px;

	}

	#aboutMichelle:hover{
		cursor: pointer;
	}

	#aboutMichelle:hover h1{
		color: #FF4545;
	}

	#aboutMichelle:hover h2{
		color: #424242;
	}


	#aboutMichelle h2{
			color: #fff;
			-webkit-transition: color 0.5s;
			-moz-transition:    color 0.5s;
			-ms-transition:     color 0.5s;
			-o-transition:      color 0.5s;
			transition:         color 0.5s;

	}

	.modal-header{
		background-color: #323a45;
		color: #fff;
	}

	.modal-footer paper-button{
		background-color: #FF4545;
		color: #fff;
		width: 50px;
		float: right;
		margin-right: 10px;

	}

	#notificationToast{
		display: inline-block;
		position: fixed;
		background: #323232;
		color: #f1f1f1;
		min-height: 48px;
		min-width: 288px;
		/*padding: 16px 24px 12px;*/
		padding-left: 10px;
		padding-right: 10px;
		box-sizing: border-box;
		box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
		border-radius: 2px;
		bottom: -10px;
		left: 12px;
		text-align: left;
		font-size: 14px;
		cursor: default;
		visibility: hidden;
		-webkit-transition: visibility 0.3s, -webkit-transform 0.3s;
		-moz-transition:    visibility 0.3s, -moz-transform 0.3s;
		-ms-transition:     visibility 0.3s, -ms-transform 0.3s;
		-o-transition:      visibility 0.3s, -o-transform 0.3s;
		transition: visibility 0.3s, transform 0.3s;
		-webkit-transform: translateY(50px);
		transform: translateY(50px);
	}

	#notificationToast h2{
		font-size: 12px;

	}

	#notificationToast.notify{
		visibility: visible;
		-webkit-transform: translateY(-22px);
		transform: translateY(-22px);
	}

	#notificationToast.notify{
		visibility: visible;
		-webkit-transform: translateY(-22px);
		transform: translateY(-22px);
	}

	#notificationToast.notify{
		visibility: visible;
		-webkit-transform: translateY(-22px);
		transform: translateY(-22px);
	}

	#notificationToast.error{
		background: #e74c3c;
	}

	#notificationToast.success{
		background: #2ecc71;
	}





	.loading {

	  transform: translateY(-50%);
	  max-width: 240px;
	  margin: 0 auto;
	}
	.loading::after {
	  clear: both;
	  content: "";
	  display: table;
	}

	@-webkit-keyframes fadeIn {
	  0% {
	    -webkit-transform: translateY(0);
	  }
	  25% {
	    -webkit-transform: translateY(-100px);
	  }
	  50% {
	    -webkit-transform: translateY(0);
	  }
	  100% {
	    -webkit-transform: translateY(0);
	  }
	}
	@-moz-keyframes fadeIn {
	  0% {
	    -moz-transform: translateY(0);
	  }
	  25% {
	    -moz-transform: translateY(-100px);
	  }
	  50% {
	    -moz-transform: translateY(0);
	  }
	  100% {
	    -moz-transform: translateY(0);
	  }
	}
	@keyframes fadeIn {
	  0% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	  25% {
	    -webkit-transform: translateY(-100px);
	    -moz-transform: translateY(-100px);
	    -ms-transform: translateY(-100px);
	    -o-transform: translateY(-100px);
	    transform: translateY(-100px);
	  }
	  50% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	  100% {
	    -webkit-transform: translateY(0);
	    -moz-transform: translateY(0);
	    -ms-transform: translateY(0);
	    -o-transform: translateY(0);
	    transform: translateY(0);
	  }
	}
	.dot {
	  width: 8px;
	  height: 8px;
	  background: #FFF;
	  float: left;
	  margin-right: 12px;
	}
	.dot:nth-child(1) {
	  background-color: #FF4545;
	  -webkit-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -moz-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -webkit-animation-iteration-count: infinite;
	  -moz-animation-iteration-count: infinite;
	  animation-iteration-count: infinite;
	  -webkit-animation-fill-mode: forwards;
	  -moz-animation-fill-mode: forwards;
	  animation-fill-mode: forwards;
	  -webkit-animation-delay: 0.05s;
	  -moz-animation-delay: 0.05s;
	  animation-delay: 0.05s;
	}
	.dot:nth-child(2) {
	  background-color: #424242;
	  -webkit-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -moz-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -webkit-animation-iteration-count: infinite;
	  -moz-animation-iteration-count: infinite;
	  animation-iteration-count: infinite;
	  -webkit-animation-fill-mode: forwards;
	  -moz-animation-fill-mode: forwards;
	  animation-fill-mode: forwards;
	  -webkit-animation-delay: 0.1s;
	  -moz-animation-delay: 0.1s;
	  animation-delay: 0.1s;
	}
	.dot:nth-child(3) {
	  background-color: #FF4545;
	  -webkit-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -moz-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -webkit-animation-iteration-count: infinite;
	  -moz-animation-iteration-count: infinite;
	  animation-iteration-count: infinite;
	  -webkit-animation-fill-mode: forwards;
	  -moz-animation-fill-mode: forwards;
	  animation-fill-mode: forwards;
	  -webkit-animation-delay: 0.15s;
	  -moz-animation-delay: 0.15s;
	  animation-delay: 0.15s;
	}
	.dot:nth-child(4) {
	  background-color: #424242;
	  -webkit-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -moz-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -webkit-animation-iteration-count: infinite;
	  -moz-animation-iteration-count: infinite;
	  animation-iteration-count: infinite;
	  -webkit-animation-fill-mode: forwards;
	  -moz-animation-fill-mode: forwards;
	  animation-fill-mode: forwards;
	  -webkit-animation-delay: 0.2s;
	  -moz-animation-delay: 0.2s;
	  animation-delay: 0.2s;
	}
	.dot:nth-child(5) {
	  background-color: #FF4545;
	  -webkit-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -moz-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -webkit-animation-iteration-count: infinite;
	  -moz-animation-iteration-count: infinite;
	  animation-iteration-count: infinite;
	  -webkit-animation-fill-mode: forwards;
	  -moz-animation-fill-mode: forwards;
	  animation-fill-mode: forwards;
	  -webkit-animation-delay: 0.25s;
	  -moz-animation-delay: 0.25s;
	  animation-delay: 0.25s;
	}
	.dot:nth-child(6) {
	  background-color: #424242;
	  -webkit-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -moz-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -webkit-animation-iteration-count: infinite;
	  -moz-animation-iteration-count: infinite;
	  animation-iteration-count: infinite;
	  -webkit-animation-fill-mode: forwards;
	  -moz-animation-fill-mode: forwards;
	  animation-fill-mode: forwards;
	  -webkit-animation-delay: 0.3s;
	  -moz-animation-delay: 0.3s;
	  animation-delay: 0.3s;
	}
	.dot:nth-child(7) {
	  background-color: #FF4545;
	  -webkit-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -moz-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -webkit-animation-iteration-count: infinite;
	  -moz-animation-iteration-count: infinite;
	  animation-iteration-count: infinite;
	  -webkit-animation-fill-mode: forwards;
	  -moz-animation-fill-mode: forwards;
	  animation-fill-mode: forwards;
	  -webkit-animation-delay: 0.35s;
	  -moz-animation-delay: 0.35s;
	  animation-delay: 0.35s;
	}
	.dot:nth-child(8) {
	  background-color: #424242;
	  -webkit-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -moz-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -webkit-animation-iteration-count: infinite;
	  -moz-animation-iteration-count: infinite;
	  animation-iteration-count: infinite;
	  -webkit-animation-fill-mode: forwards;
	  -moz-animation-fill-mode: forwards;
	  animation-fill-mode: forwards;
	  -webkit-animation-delay: 0.4s;
	  -moz-animation-delay: 0.4s;
	  animation-delay: 0.4s;
	}
	.dot:nth-child(9) {
	  background-color: #FF4545;
	  -webkit-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -moz-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -webkit-animation-iteration-count: infinite;
	  -moz-animation-iteration-count: infinite;
	  animation-iteration-count: infinite;
	  -webkit-animation-fill-mode: forwards;
	  -moz-animation-fill-mode: forwards;
	  animation-fill-mode: forwards;
	  -webkit-animation-delay: 0.45s;
	  -moz-animation-delay: 0.45s;
	  animation-delay: 0.45s;
	}
	.dot:nth-child(10) {
	  background-color: #424242;
	  -webkit-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -moz-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -webkit-animation-iteration-count: infinite;
	  -moz-animation-iteration-count: infinite;
	  animation-iteration-count: infinite;
	  -webkit-animation-fill-mode: forwards;
	  -moz-animation-fill-mode: forwards;
	  animation-fill-mode: forwards;
	  -webkit-animation-delay: 0.5s;
	  -moz-animation-delay: 0.5s;
	  animation-delay: 0.5s;
	}
	.dot:nth-child(11) {
	  background-color: #FF4545;
	  -webkit-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -moz-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -webkit-animation-iteration-count: infinite;
	  -moz-animation-iteration-count: infinite;
	  animation-iteration-count: infinite;
	  -webkit-animation-fill-mode: forwards;
	  -moz-animation-fill-mode: forwards;
	  animation-fill-mode: forwards;
	  -webkit-animation-delay: 0.55s;
	  -moz-animation-delay: 0.55s;
	  animation-delay: 0.55s;
	}
	.dot:nth-child(12) {
	  background-color: #424242;
	  -webkit-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -moz-animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  animation: fadeIn 1.8s cubic-bezier(0.645, 0.045, 0.355, 1);
	  -webkit-animation-iteration-count: infinite;
	  -moz-animation-iteration-count: infinite;
	  animation-iteration-count: infinite;
	  -webkit-animation-fill-mode: forwards;
	  -moz-animation-fill-mode: forwards;
	  animation-fill-mode: forwards;
	  -webkit-animation-delay: 0.6s;
	  -moz-animation-delay: 0.6s;
	  animation-delay: 0.6s;
	}




	</style>

	<div id = "header">
		<ul id="headerNavlist">
			<li id="active"><a href="#signupSection" class = "signUP">SIGN UP</a></li>
			<li><a href="#section3">TEAM</a></li>
			<li><a href="#section2">SERVICES</a></li>
			<li><a href="#section1">VISION</a></li>
			<li><a href="#section0">HOME</a></li>
			<li style = "float: left; margin-left: 20px; top: -5px; position:relative"><a><span class="glyphicon glyphicon-heart-empty" style= "font-size: 30px" aria-hidden="true"></a></span></li>
		</ul>
	</div>

	<div id="fullpage">

		<div class="section " id="section0" name = "section0">

			<div id="large-header"></div>
			<div id ="large-header-blur"></div>
			<canvas id="demo-canvas" style = "position: absolute; margin-top: -600px;"></canvas>
			<div id = "large-header-title">
				<h1>AUDO Village</h1>
				<h2>A Community Connected</h2>
				<a href="#section1">Learn More</a>
			</div>


		</div>

		<div id = "attributeSection">
			<div class = "container">
			<div class="row">
				<div class="col-md-4">
					<div class = "moto">
					<div class="row text-center title">
						<h2>Educate</h2>
					</div>
				</div>
				</div>

			  <div class="col-md-4">
					<div class = "moto">
					<div class="row text-center title">
						<h2>Inspire</h2>
					</div>
				</div>
				</div>

			  <div class="col-md-4">
					<div class = "moto">
					<div class="row text-center title">
						<h2>Share</h2>
					</div>
				</div>
				</div>
			</div>
		</div>

		</div>




		<div class="section" name = "section1" id="section1">

			<div class="row">

				<div  id = "visionSection" class="col-md-12">
					<h1>Vision</h1>

					<p>Everyone has a talent to share, a passion that defines them, or a hobby that makes them exceptional. At AUDO Village, we want you to constantly develope and pass on your knowledge. We know AUDO Village lessons will help users cultivate their wisdom while also serving their communities. Empower Yourself and your Village by learning.</p>

					<p>In addition to being completely free, what makes AUDO Village unique is that we do not limit the lessons that can be provided through our platform. While we believe academic and standardized test tutoring is especially important for classroom and career success, we also understand that lessons and skills from non-academic experiences in concentrations such as sports, leadership and music can be just as important. Internally, our largest and most daunting regrets come from eluding an inspiration to try something new.  Have you ever wanted to skateboard? Wanted to learn how to play your favorite song on the guitar? Sign up and be surprised by where your curiosity leads you!</p>

				</div>
			</div>



		</div>

		<div class="section" name = "section1" id="section2">

			<section id="services" class="section section-padded">
				<div class="container">
					<div class="row text-center title">
						<h2>Services</h2>
						<h4 class="light muted">AUDO Village aims to provide a variety of mentor/mentee options</h4>
					</div>
					<div class="row services">
						<div class="col-md-3">
							<div class="service">
								<div class="icon-holder">
									<span style ="font-size: 30" class="glyphicon glyphicon-education" aria-hidden="true"></span>
								</div>
								<h4 class="heading">Academic</h4>
								<p class="description">Academic services description here Academic services description here Academic services description here Academic services description here Academic services description here</p>
								<paper-button id = "academicDescriptionButton">Learn More</paper-button>
							</div>
						</div>
						<div class="col-md-3">
							<div class="service">
								<div class="icon-holder">
									<span style = "font-size: 30" class="glyphicon glyphicon-knight" aria-hidden="true"></span>
								</div>
								<h4 class="heading">Recreational</h4>
								<p class="description">Recreational services description here Recreational services description here Recreational services description here Recreational services description here Recreational services description here</p>
								<paper-button id = "recreationalDescriptionButton">Learn More</paper-button>
							</div>
						</div>
						<div class="col-md-3">
							<div class="service">
								<div class="icon-holder">
									<span style = "font-size: 30" class="glyphicon glyphicon-search" aria-hidden="true"></span>
								</div>
								<h4 class="heading">Personal</h4>
								<p class="description">Personal services description here Personal request services description here Personal request services description here Personal request services description here Personal request services description here</p>
								<paper-button id = "personalDescriptionButton">Learn More</paper-button>
							</div>
						</div>
						<div class="col-md-3">
							<div class="service">
								<div class="icon-holder">
									<span style = "font-size: 30" class="glyphicon glyphicon-tree-conifer" aria-hidden="true"></span>
								</div>
								<h4 class="heading">Community</h4>
								<p class="description">Personal services description here Personal request services description here Personal request services description here Personal request services description here Personal request services description here</p>
								<paper-button id = "communityDescriptionButton">Learn More</paper-button>
							</div>
						</div>
					</div>
				</div>
				<div class="cut cut-bottom"></div>
			</section>
			<div class = "row">
			<div id = "academicDescription" class = "col-md-12">
				<h1>Academic</h1>
				<p>Everyone has a talent to share, a passion that defines them, or a hobby that makes them exceptional. At AUDO Village, we want you to constantly develope and pass on your knowledge. We know AUDO Village lessons will help users cultivate their wisdom while also serving their communities. Empower Yourself and your Village by learning.</p>
			</div>

			<div id = "recreationalDescription" class = "col-md-12">
				<h1>Recreational</h1>
				<p>Everyone has a talent to share, a passion that defines them, or a hobby that makes them exceptional. At AUDO Village, we want you to constantly develope and pass on your knowledge. We know AUDO Village lessons will help users cultivate their wisdom while also serving their communities. Empower Yourself and your Village by learning.</p>

			</div>

			<div id = "personalDescription" class = "col-md-12">
				<h1>Personal</h1>
				<p>Everyone has a talent to share, a passion that defines them, or a hobby that makes them exceptional. At AUDO Village, we want you to constantly develope and pass on your knowledge. We know AUDO Village lessons will help users cultivate their wisdom while also serving their communities. Empower Yourself and your Village by learning.</p>

			</div>


			<div id = "communityDescription" class = "col-md-12">
				<h1>Community</h1>
				<p>Everyone has a talent to share, a passion that defines them, or a hobby that makes them exceptional. At AUDO Village, we want you to constantly develope and pass on your knowledge. We know AUDO Village lessons will help users cultivate their wisdom while also serving their communities. Empower Yourself and your Village by learning.</p>

			</div>
		</div>
		</div>


		<div id = "section3" name = "section3">

			<div class="row text-center title">
				<h2>Meet The Team</h2>
			</div>


			<div class="modal fade" id="davidModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" style = "color: white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" stye = "color:">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">About Me</h4>
			      </div>
			      <div class="modal-body">
							<p>It is my honor to start Audo and to give back to the South Bay area. Even from a very young age, I was much aware of the importance of having effective and affordable tutoring. We look forward to developing a web platform where parents and students can list multiple tutoring requests and find mentors within a few clicks of the mouse.</p>
			      </div>
			      <div class="modal-footer">
			        <paper-button type="button" data-dismiss="modal">Close</paper-button>
			      </div>
			    </div>
			  </div>
			</div>

			<div class="modal fade" id="bryanModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" style = "color: white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">About Me</h4>
						</div>
						<div class="modal-body">
							<p>Hi, I am especially excited to launch this opportunity with Audo in 2015. This is an important achievement for me because I have long desired to help design an application that made academic tutoring affordable for all students. Here at Audo, we are going one step further and guaranteeing that our tutoring service is completely free! I hope Audo Village will inspire you to further pursue your interests and serve your community.</p>
						</div>
						<div class="modal-footer">
							<paper-button type="button" data-dismiss="modal">Close</paper-button>
						</div>
					</div>
				</div>
			</div>


			<div class="modal fade" id="michelleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" style = "color: white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">About Me</h4>
						</div>
						<div class="modal-body">
							<p>Hi, I am especially excited to launch this opportunity with Audo in 2015. This is an important achievement for me because I have long desired to help design an application that made academic tutoring affordable for all students. Here at Audo, we are going one step further and guaranteeing that our tutoring service is completely free! I hope Audo Village will inspire you to further pursue your interests and serve your community.</p>
						</div>
						<div class="modal-footer">
							<paper-button type="button" data-dismiss="modal">Close</paper-button>
						</div>
					</div>
				</div>
			</div>


			<div class="row">
				<div data-toggle="modal" data-target="#davidModal" id = "aboutDavid" class="col-md-4" style = "background-color: gray; height:600px">
					<div class="row text-center title">
						<h1>David Yuan</h1>
						<h2 class="light muted">Website Developer</h2>
					</div>
				</div>

				<div data-toggle="modal" data-target="#bryanModal" id = "aboutBryan" class="col-md-4" style = "background-color: gray; height:600px">
					<div class="row text-center title">
						<h1>Bryan Phan</h1>
						<h2 class="light muted">Operations Director</h2>
					</div>
				</div>

				<div data-toggle="modal" data-target="#michelleModal" id = "aboutMichelle" class="col-md-4" style = "background-color: gray; height:600px">
					<div class="row text-center title">
						<h1>Michelle Cho</h1>
						<h2 class="light muted">Graphic Designer</h2>
					</div>
				</div>

</div>



		</div>







		<div id = "signupSection" name = "signupSection">

			<paper-material elevation="3">

				<div id = "materialBackground">
					<div id = "signupHeader">
						<h1><span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span><h1>
						</div>
						<div id = "signupCaret"></div>
						<div id = "signupContent">
						<div id = "signupFree">
							<h2>Join the <span>Community<span><h2>
							</div>

							<div id = "signupBody">

								<div class="form-group">
									<!-- <label class="sr-only" for="u">First Name:</label> -->
									<div class="icon-addon addon-md">
										<label for="signupFirstName" id = "signupFirstNameGlyph" class="glyphicon glyphicon-user"></label>
										<input type="text" class="form-control" id="signupFirstName" placeholder="First Name">
									</div>
								</div>
								<div class="form-group">
									<div class="icon-addon addon-md">
										<label for="signupFirstName" id = "signupLastNameGlyph" class="glyphicon glyphicon-tag" rel="tooltip" title="email"></label>
										<input type="text" class="form-control" id="signupLastName" placeholder="Last Name">
									</div>
								</div>
								<div class="form-group">
									<div class="icon-addon addon-md">
										<label for="signupFirstName" id = "signupEmailGlyph" class="glyphicon glyphicon-envelope" rel="tooltip" title="email"></label>
										<input type="text" class="form-control" id="signupEmail" placeholder="Email">
									</div>
								</div>
								<div class="form-group">
									<div class="icon-addon addon-md">
										<label for="signupFirstName" id = "signupPasswordGlyph" class="glyphicon glyphicon-barcode" rel="tooltip" title="email"></label>
										<input type="password" class="form-control" id="signupPassword" placeholder="Password">
									</div>
								</div>
								<div class="form-group">
									<div class="icon-addon addon-md">
										<input type="password" class="form-control" id="signupRePassword" placeholder="Re-type Password">
									</div>
								</div>

								<div class="form-group">
									<div class="checkbox">
										<label style = "color:#999999">
											<input type="checkbox" id = "signupSubscribe" checked>
											Subscribe to Newsletters
										</label>
									</div>
								</div>
							</div>

							<div id = "signupBodyActivate"  style = "display: none">

								<div class="form-group">

                  <h6 id = "signupBodyActivateMessage"></h6>
									<div class="icon-addon addon-md">
										<label for="signupFirstName" id = "signupActivationGlyph" class="glyphicon glyphicon-user"></label>
										<input type="text" class="form-control" id="signupActivation" placeholder="Activation Code">
									</div>
								</div>

							</div>




							<paper-button id = "signupSubmit">Submit</paper-button>

							<div id = "signupTerms">By clicking "Submit", I agree to AUDOVillage's <a href = "#">Terms of Services</a></div>
						</div>

						<div id = "signupBodyFinal" style = "display: none">

							<div class="form-group">
								<div class = "comingSoon">
									<div class="row text-center title">
										<h2>Thank you for registering</h2>
										<h4 class="light muted">We appreciate you being blah blah blah. Come back later and stuff</h4>
									</div>

								</div>

								<section class="loading">
									 <div class="dot"></div>
									 <div class="dot"></div>
									 <div class="dot"></div>
									 <div class="dot"></div>
									 <div class="dot"></div>
									 <div class="dot"></div>
									 <div class="dot"></div>
									 <div class="dot"></div>
									 <div class="dot"></div>
									 <div class="dot"></div>
									 <div class="dot"></div>
									 <div class="dot"></div>
								</section>
							</div>


						</div>

					</div>
					</paper-material>




				</div>

				<div id = "notificationToast">
						<h2>cool</h2>
				</div>
			</div>

		</div>



	</body>
	</html>
<?php }
}
?>