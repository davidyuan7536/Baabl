<head>
  <title>Baabl Login</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../static/index/index.css" />
  <script type="text/javascript" src="../static/index/index.js"></script>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


</head>
<body>

  <div class="cont">

    <div id = "notificationToast">
        <h2>cool</h2>
    </div>


    <div class="form_cont">
      <div class="login">
        <div class="logo">
          <span>
            <div id = "logo_name">
              B A A B L
            </div>
          </span>
        </div>
        <div class="login_form">
          <div class="login_row">
            <span id = "login_email_icon" class="fa fa-envelope-o" style = "color: #ABA8AE"></span>
            <input type="text" id = "login_email" class="login_input name" placeholder="Email"/>
          </div>
          <div class="login_row">
            <span id = "login_password_icon" class="fa fa-key" style = "color: #ABA8AE"></span>
            <input type="password" id = "login_password" class="login_input pass" placeholder="Password"/>
          </div>
        </div>

        <div class = "login_bottom">
          <button type="button" class="submit">L o g i n</button>
          <p class="login_signup">
            <a class = "login_signup_button">Signup</a>
            <br>
            <a class = "login_forgot_button">Forgot Password</a>
          </p>
        </div>

      </div>

      <div class = "transition"></div>



      <div class = "signup">
        <div class = "signup_head">

        </div>

        <div class="signup_form">
          <div class="login_row">
            <input id = "signup_first" type="text" class="signup_input" placeholder="First Name"/>
          </div>
          <div class="login_row">
            <input id = "signup_last" type="text" class="signup_input" placeholder="Last Name"/>
          </div>
          <div class="login_row">
            <input id = "signup_email" type="text" class="signup_input" placeholder="Email"/>
          </div>
          <div class="login_row">
            <input id = "signup_password" type="password" class="signup_input" placeholder="Password"/>
          </div>
          <div class="login_row">
            <input id = "signup_password_confirm" type="password" class="signup_input" placeholder="Confirm Password"/>
          </div>


        </div>

        <div class = "login_bottom">
          <button type="button" class="submit">S i g n u p</button>

          <p class="login_signup">
            <a class = "login_signin_button">Signin</a>
          </p>
        </div>


      </div>





      <div class = "forgot">

        <div class = "signup_head">

        </div>

        <div class="signup_form">
          <div class = "forgot_text">
            Enter your email and press submit. A confirmation code will be sent.
          </div>
          <div class="login_row">
            <input type="text" class="signup_input" placeholder="Email"/>
          </div>
          <div id = "forgot_confirmation_code" class="login_row">
            <input type="text" class="signup_input" placeholder="Confirmation Code"/>
          </div>
          <div id = "forgot_reset" class="login_row">
            <input type="password" class="signup_input" placeholder="New Password"/>
          </div>
          <div id = "forgot_reset_confirm" class="login_row">
            <input type="password" class="signup_input" placeholder="Confirm New Password"/>
          </div>

        </div>

        <div class = "login_bottom">
          <button type="button" class="submit">S u b m i t</button>

          <p class="login_signup">
            <a class = "login_signin_button">Signin</a>
          </p>
        </div>

      </div>



      <div class="app">
        <div class="app_top">
          <div class="app_menu-btn">
            <span></span>
          </div>
          <svg class="app_icon search svg-icon" viewBox="0 0 20 20">
            <!-- yeap, its purely hardcoded numbers straight from the head :D (same for svg above) -->
            <path d="M20,20 15.36,15.36 a9,9 0 0,1 -12.72,-12.72 a 9,9 0 0,1 12.72,12.72" />
          </svg>
          <p class="app_hello">Good Morning!</p>
          <div class="app_user">
            <img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/142996/profile/profile-512_5.jpg" alt="" class="app_user-photo" />
            <span class="app_user-notif">3</span>
          </div>
          <div class="app_month">
            <span class="app_month-btn left"></span>
            <p class="app_month-name">March</p>
            <span class="app_month-btn right"></span>
          </div>
        </div>
        <div class="app_bot">
          <div class="app_days">
            <div class="app_day weekday">Sun</div>
            <div class="app_day weekday">Mon</div>
            <div class="app_day weekday">Tue</div>
            <div class="app_day weekday">Wed</div>
            <div class="app_day weekday">Thu</div>
            <div class="app_day weekday">Fri</div>
            <div class="app_day weekday">Sad</div>
            <div class="app_day date">8</div>
            <div class="app_day date">9</div>
            <div class="app_day date">10</div>
            <div class="app_day date">11</div>
            <div class="app_day date">12</div>
            <div class="app_day date">13</div>
            <div class="app_day date">14</div>
          </div>
          <div class="app_meetings">
            <div class="app_meeting">
              <img src="http://i.imgur.com/joyWJEY.jpg" alt="" class="app_meeting-photo" />
              <p class="app_meeting-name">Feed the cat</p>
              <p class="app_meeting-info">
                <span class="app_meeting-time">8 - 10am</span>
                <span class="app_meeting-place">Real-life</span>
              </p>
            </div>
            <div class="app_meeting">
              <img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/142996/profile/profile-512_5.jpg" alt="" class="app_meeting-photo" />
              <p class="app_meeting-name">Feed the cat!</p>
              <p class="app_meeting-info">
                <span class="app_meeting-time">1 - 3pm</span>
                <span class="app_meeting-place">Real-life</span>
              </p>
            </div>
            <div class="app_meeting">
              <img src="//s3-us-west-2.amazonaws.com/s.cdpn.io/142996/profile/profile-512_5.jpg" alt="" class="app_meeting-photo" />
              <p class="app_meeting-name">FEED THIS CAT ALREADY!!!</p>
              <p class="app_meeting-info">
                <span class="app_meeting-time">This button is just for demo ></span>
              </p>
            </div>
          </div>
        </div>
        <div class="app_logout">
          <svg class="app_logout-icon svg-icon" viewBox="0 0 20 20">
            <path d="M6,3 a8,8 0 1,0 8,0 M10,0 10,12"/>
          </svg>
        </div>
      </div>
    </div>
  </div>
</body>
