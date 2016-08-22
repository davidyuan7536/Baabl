document.addEventListener("DOMContentLoaded", function(event) {


  $("#loginEmail").keyup(function(event){
      if(event.keyCode == 13){
          $("#loginButton").click();
      }
  });

  $("#loginPassword").keyup(function(event){
    if(event.keyCode == 13){
        $("#loginButton").click();
    }
});


  $('#loginButton').click(function(){

    if($('#loginBody').is(':visible')){

        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
        if(re.test($('#loginEmail').val()) == false){

          $('#loginEmail').focus();
          $('#notificationToast').html('<h2>Please Enter a Valid Email</h2>');
          $('#notificationToast').attr('class', 'notify');
          setTimeout(function () {
            $('#notificationToast').removeClass('notify');
          }, 3000);

        }

      else if($('#loginPassword').val() == ''){
        $('#loginPassword').focus();
        $('#notificationToast').html('<h2>Please Enter a Valid Password</h2>');
        $('#notificationToast').attr('class', 'notify');
        setTimeout(function () {
          $('#notificationToast').removeClass('notify');
        }, 3000);
      }
      else {
        var data = {
        'Action': 'Authenticate',
        'email': $('#loginEmail').val(),
        'password': $('#loginPassword').val()
        };

        $.ajax({
            type:    "POST",
            url:     "http://localhost/audovillage/htdocs/login/login.php",
            data:    data,
            success: function(resultPost) {
              var result = JSON.parse(resultPost);
              if(result['errorMessage']){
                $('#notificationToast').html('<h2>'+ result['errorMessage']+'</h2>');
                $('#notificationToast').attr('class', 'notify');
                setTimeout(function () {
                  $('#notificationToast').removeClass('notify');
                }, 3000);

                if(result['notActivated']){
                  $('#loginBody').slideUp('slow', function(){
                    $('#loginBody2').show('slow');
                  });
                }

              }
              else if(result['newPage']){
                var url = '../../audovillage/htdocs/' + result['newPage'] + '.php';
                window.location.href = url;

              }
              else{

              }
            },
            error:   function(jqXHR, textStatus, errorThrown) {
                  alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
            }
          });
      }
    }
    else{
      if($('#loginActivation').val() == ''){
        $('#loginActivation').focus();
        $('#notificationToast').html('<h2>Please Enter the Activation Code</h2>');
        $('#notificationToast').attr('class', 'notify');
        setTimeout(function () {
          $('#notificationToast').removeClass('notify');
        }, 3000);
      }
      else{

        var data = {
        'Action': 'Activate',
        'email': $('#loginEmail').val(),
        'activationCode': $('#loginActivation').val()
        };

        $.ajax({
            type:    "POST",
            url:     "http://localhost/audovillage/htdocs/login/login.php",
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
                var url = '../../audovillage/htdocs/' + result['newPage'] + '.php';
                window.location.href = url;

              }
              else{

              }
            },
            error:   function(jqXHR, textStatus, errorThrown) {
                  alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
            }
          });

      }

    }

  });


  $('#loginEmail').on('input', function() {
    if($(this).val() != ""){
      $('#loginEmailGlyph').show('300');
    }
    else{
      $('#loginEmailGlyph').hide();
    }
  });

  $('#loginPassword').on('input', function() {
    if($(this).val() != ""){
      $('#loginPasswordGlyph').show('300');
    }
    else{
      $('#loginPasswordGlyph').hide();
    }
  });

  $('#loginActivation').on('input', function() {
    if($(this).val() != ""){
      $('#loginActivationGlyph').show('300');
    }
    else{
      $('#loginActivationGlyph').hide();
    }
  });


});
