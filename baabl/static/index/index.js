document.addEventListener("DOMContentLoaded", function(event) {

    var rootLocation = "http://localhost/baabl/htdocs/";
    var current = "signin";
    var forgot_stage = "first";

    var animating = false,
        submitPhase1 = 1100,
        submitPhase2 = 500,
        logoutPhase1 = 800,
        $login = $(".login"),
        $app = $(".app"),
        $transition = $(".transition"),
        $signup = $(".signup"),
        $forgot = $(".forgot");

    $("#login_email").focus(function(){
      $("#login_email_icon").addClass("active");
      setTimeout(function(){
        $("#login_email_icon").removeClass("active");
      }, 200);
    });

    $("#login_password").focus(function(){
      $("#login_password_icon").addClass("active");
      setTimeout(function(){
        $("#login_password_icon").removeClass("active");
      }, 200);
    });

    function ripple(elem, e) {
      $(".ripple").remove();
      var elTop = elem.offset().top,
          elLeft = elem.offset().left,
          x = e.pageX - elLeft,
          y = e.pageY - elTop;
      var $ripple = $("<div class='ripple'></div>");
      $ripple.css({top: y, left: x});
      elem.append($ripple);
    };

    $(document).on("click", ".submit", function(){

      if(current == "signin"){
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(re.test($('#login_email').val()) == false){

          $('#login_email').focus();
          $('#notificationToast').html('<h2>Please Enter a Valid Email</h2>');
          $('#notificationToast').attr('class', 'notify');
          setTimeout(function () {
            $('#notificationToast').removeClass('notify');
          }, 3000);
          return;
        }
        else if($('#login_password').val() == ''){
          $('#login_password').focus();
          $('#notificationToast').html('<h2>Please Enter a Valid Password</h2>');
          $('#notificationToast').attr('class', 'notify');
          setTimeout(function () {
            $('#notificationToast').removeClass('notify');
          }, 3000);
          return;
        }
        else {
          var data = {
          'Action': 'Authenticate',
          'email': $('#login_email').val(),
          'password': $('#login_password').val()
          };

          var location = rootLocation + "login/login.php"

          $.ajax({
              type:    "POST",
              url:     location,
              data:    data,
              success: function(resultPost) {
                var result = JSON.parse(resultPost);
                if(result['errorMessage']){
                  $('#notificationToast').html('<h2>'+ result['errorMessage']+'</h2>');
                  $('#notificationToast').attr('class', 'notify');
                  setTimeout(function () {
                    $('#notificationToast').removeClass('notify');
                  }, 3000);
                }
                else if(result['newPage']){
                  var url = rootLocation + result['newPage'] + '.php';
                  window.location.href = url;
                }
                else{

                }
              },
              error:   function(jqXHR, textStatus, errorThrown) {
                    alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
              }
            });
            return;
        }
      }



      else if(current == "signup"){

        var nm = /^[a-z ,.'-]+$/i;
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

        if(nm.test($('#signup_first').val()) == false){
          $('#signup_first').focus();
          $('#notificationToast').html('<h2>Please Enter a Valid First Name</h2>');
          $('#notificationToast').attr('class', 'notify');
          setTimeout(function () {
            $('#notificationToast').removeClass('notify');
          }, 3000);
          return;
        }

        else if(nm.test($('#signup_last').val()) == false){
          $('#signup_last').focus();
          $('#notificationToast').html('<h2>Please Enter a Valid Last Name</h2>');
          $('#notificationToast').attr('class', 'notify');
          setTimeout(function () {
            $('#notificationToast').removeClass('notify');
          }, 3000);
          return;
        }


        else if(re.test($('#signup_email').val()) == false){
          $('#signup_email').focus();
          $('#notificationToast').html('<h2>Please Enter a Valid Email</h2>');
          $('#notificationToast').attr('class', 'notify');
          setTimeout(function () {
            $('#notificationToast').removeClass('notify');
          }, 3000);
          return;
        }

        else if($('#signup_password').val() == ''){
          $('#signup_password').focus();
          $('#notificationToast').html('<h2>Please Enter a Valid Password</h2>');
          $('#notificationToast').attr('class', 'notify');
          setTimeout(function () {
            $('#notificationToast').removeClass('notify');
          }, 3000);
          return;
        }

        else if($('#signup_password').val() != $('#signup_password_confirm').val()){
          $('#signup_password').focus();
          $('#notificationToast').html('<h2>Passwords Do Not Match</h2>');
          $('#notificationToast').attr('class', 'notify');
          setTimeout(function () {
            $('#notificationToast').removeClass('notify');
          }, 3000);
          return;
        }

        else {
          var data = {
          'Action': 'Signup',
          'firstName': $('#signup_first').val(),
          'lastName': $('#signup_last').val(),
          'email': $('#signup_email').val(),
          'password': $('#signup_password').val()
          };

          var location = rootLocation + "login/login.php"

          $.ajax({
              type:    "POST",
              url:     location,
              data:    data,
              success: function(resultPost) {
                var result = JSON.parse(resultPost);
                if(result['errorMessage']){
                  $('#notificationToast').html('<h2>'+ result['errorMessage']+'</h2>');
                  $('#notificationToast').attr('class', 'notify');
                  setTimeout(function () {
                    $('#notificationToast').removeClass('notify');
                  }, 3000);
                }
                else if(result['newPage']){
                  var url = rootLocation + result['newPage'] + '.php';
                  window.location.href = url;
                }
                else{

                }
              },
              error:   function(jqXHR, textStatus, errorThrown) {
                    alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
              }
            });
            return;
        }

      }


      else if(current == "forgot"){
        if(forgot_stage == "first"){
          $("#forgot_confirmation_code").css("visibility", "visible");
          $("#forgot_confirmation_code").css("opacity", "1");
          $(".forgot_text").css("opacity", "0");
          setTimeout(function(){
              $(".forgot_text").text("Please enter the confirmation code and press submit.");
              $(".forgot_text").css("opacity","1");
          },300)
          forgot_stage = "second";
          animating = false;
        }
        else if (forgot_stage == "second"){
            $("#forgot_reset").css("visibility", "visible");
            $("#forgot_reset").css("opacity","1");
            $("#forgot_reset_confirm").css("visibility", "visible");
            $("#forgot_reset_confirm").css("opacity","1");
            $(".forgot_text").css("opacity", "0");
            setTimeout(function(){
                $(".forgot_text").text("Please enter your new desired password and press submit.");
                $(".forgot_text").css("opacity","1");
            },300)
            forgot_stage = "third";
            animating = false;
        }
        else{

          animating = false;
        }
      }

    });


      // else{
      //   var that = this;
      //   ripple($(that), e);
      //   $(that).addClass("processing");
      //   setTimeout(function() {
      //     $(that).addClass("success");
      //     setTimeout(function() {
      //       $app.show();
      //       $app.css("top");
      //       $app.addClass("active");
      //     }, submitPhase2 - 70);
      //     setTimeout(function() {
      //       $login.hide();
      //       $login.addClass("inactive");
      //       animating = false;
      //       $(that).removeClass("success processing");
      //     }, submitPhase2);
      //   }, submitPhase1);
      // }



    $(document).on("click", ".login_signup_button", function(e) {

        current = "signup";
        $transition.show("slide", { direction: "down" }, 300);
        setTimeout(function(){
          $transition.hide("slide", { direction: "down" }, 300);
        },300);
        setTimeout(function(){
          $login.css("z-index", "1");
          $(".forgot").css("z-index", "1");
          $(".forgot").removeClass("active");
          $signup.css("z-index", "2");
          $signup.addClass("active");
        }, 300);
        });

    $(document).on("click", ".login_forgot_button", function(e) {

        current = "forgot";
        $transition.show("slide", { direction: "down" }, 300);
        setTimeout(function(){
          $transition.hide("slide", { direction: "down" }, 300);
        },300);
        setTimeout(function(){
          $login.css("z-index", "1");
          $signup.css("z-index", "1");
          $signup.removeClass("active");
          $(".forgot").css("z-index", "2");
          $(".forgot").addClass("active");
        }, 300);
        });

    $(document).on("click", ".login_signin_button", function(e) {

        current = "signin"
        $transition.show("slide", { direction: "down" }, 300);
        setTimeout(function(){
          $transition.hide("slide", { direction: "down" }, 300);
        },300);
        setTimeout(function(){
          $(".forgot").css("z-index", "1");
          $(".forgot").removeClass("active");
          $signup.css("z-index", "1");
          $signup.removeClass("active");
          $login.css("z-index", "2");
        }, 300);
        });

    $(document).on("click", ".app_logout", function(e) {
      if (animating) return;
      $(".ripple").remove();
      animating = true;
      var that = this;
      $(that).addClass("clicked");
      setTimeout(function() {
        $app.removeClass("active");
        $login.show();
        $login.css("top");
        $login.removeClass("inactive");
      }, logoutPhase1 - 120);
      setTimeout(function() {
        $app.hide();
        animating = false;
        $(that).removeClass("clicked");
      }, logoutPhase1);
    });


});
