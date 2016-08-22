<!DOCTYPE html>
<html>
<head>
  <title>Baabl Profile</title>
  <meta charset="UTF-8">




  <!-- <link rel="stylesheet" type="text/css" href="../static/dropzone.css" /> -->

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <script type="text/javascript" src="../bower_components/webcomponentsjs/webcomponents.js"></script>
  <script type="text/javascript" src="../static/ajax_uploader.js"></script>
  <script type="text/javascript" src="../static/image_select.js"></script>
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

<script>
document.addEventListener("DOMContentLoaded", function(event) {
  var rootLocation = "http://localhost/baabl/htdocs/";
  var location = rootLocation + "baabl_profile/baabl_profile_photos.php";

   $('#image').imgAreaSelect({ aspectRatio: '4:3', handles: true });



});

</script>
</body>
</html>
