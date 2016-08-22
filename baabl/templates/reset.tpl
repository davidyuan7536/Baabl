<header>

  <link rel="stylesheet" type="text/css" href="../static/reset/reset.css" />

  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Lato:400,300,100' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>


  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="../static/reset/reset.js"></script>
  <script src="../static/jssor.slider.min.js"></script>


  <script src="../bower_components/webcomponentsjs/webcomponents-lite.js"></script>

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
