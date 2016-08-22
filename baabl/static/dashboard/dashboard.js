document.addEventListener("DOMContentLoaded", function(event) {

  var rootLocation = "http://localhost/baabl/htdocs/";

  var dynamicEl = document.createElement("navigation-header");
  dynamicEl.setAttribute("id", "header");
  dynamicEl.setAttribute("notification-number", "0");
  dynamicEl.setAttribute("friend-number", "3");
  document.getElementById("header_sidebar_container").appendChild(dynamicEl);

  $("#confirmationToastYes").hover(function(){
      $("#confirmationToastYes").attr("raised", "1");
  }, function(){
      $("#confirmationToastYes").removeAttr("raised");
  });

  $("#confirmationToastNo").hover(function(){
      $("#confirmationToastNo").attr("raised", "1");
  }, function(){
      $("#confirmationToastNo").removeAttr("raised");
  });


  $('html').click(function() {
      $('#confirmationToast').removeClass('notify');
  });





  var oReq = new XMLHttpRequest();
  oReq.onload = function() {
      var result = JSON.parse(this.responseText);
      for(i = 0; i < result['baablArray'].length; i++){
        // console.log(result['baablArray'][i]['baabl_message']);
        var totalVote = result['baablArray'][i]['baabl_upvote'] - result['baablArray'][i]['baabl_downvote'];
        var dynamicEl = document.createElement("baabl-container");
        dynamicEl.setAttribute("id", "baabl_"+result['baablArray'][i]['baabl_hash']);
        dynamicEl.setAttribute("baabl-message", result['baablArray'][i]['baabl_message']);
        dynamicEl.setAttribute("baabl-hash", result['baablArray'][i]['baabl_hash']);
        dynamicEl.setAttribute("baabl-totalvote", totalVote);
        if(result['baablArray'][i]['user_hash']){
            dynamicEl.setAttribute("baabl-editable", "true");
        }
        document.getElementById("baabl_container").appendChild(dynamicEl);
      }
      // console.log(result);
  };
  oReq.open("get", rootLocation + "dashboard/dashboard.php", true);
  oReq.send();




  $('#confirmationToastYes').click(function(){
    $('#confirmationToast').removeClass('notify');

    if($("#current_baabl_delete").val() == '' && $("#current_baabl_comment_delete").val() !=''){
      var data = {
        'Action': 'DeleteBaablComment',
        'comment_hash' : $("#current_baabl_comment_delete").val()
      };

      var location = rootLocation + "baabl_comments/baabl_comments.php"
      $.ajax({
        type:    "POST",
        url:     location,
        data:    data,
        success: function(resultPost) {
          var baablCommentById = "#baabl_comment_"+ $("#current_baabl_comment_delete").val();
          $(baablCommentById).slideUp('slow', function(){
            $(baablCommentById).remove();
          });
          var result = JSON.parse(resultPost);
          if(result['errorMessage']){
            $("#notificationToast").html('<h2>'+ result['errorMessage']+'</h2>');
            $("#notificationToast").attr('class', 'notify');
            setTimeout(function () {
              $("#notificationToast").removeClass('notify');
            }, 3000);
          }
        },
        error:   function(jqXHR, textStatus, errorThrown) {
          alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
        }
      });
    }

    else if($("#current_baabl_delete").val() != '' && $("#current_baabl_comment_delete").val() ==''){
      var data = {
        'Action': 'DeleteBaabl',
        'baabl_hash' : $("#current_baabl_delete").val()
      };

      var location = rootLocation + "baabl/baabl.php"
      $.ajax({
        type:    "POST",
        url:     location,
        data:    data,
        success: function(resultPost) {
          var baablById = "#baabl_"+ $("#current_baabl_delete").val();
          $(baablById).slideUp('slow', function(){
            $(baablById).remove();
          });

          var result = JSON.parse(resultPost);
          if(result['errorMessage']){
            $("#notificationToast").html('<h2>'+ result['errorMessage']+'</h2>');
            $("#notificationToast").attr('class', 'notify');
            setTimeout(function () {
              $("#notificationToast").removeClass('notify');
            }, 3000);
          }
        },
        error:   function(jqXHR, textStatus, errorThrown) {
          alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
        }
      });
    }
  });

  $('#confirmationToastNo').click(function(){

    $('#confirmationToast').removeClass('notify');
  });


  $(document).on("click", ".submit", function(){

        var data = {
        'Action': 'Baabl',
        'baabl' : $("#baabl_message").val()
        };

        var location = rootLocation + "baabl/baabl.php"
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
            },
            error:   function(jqXHR, textStatus, errorThrown) {
                  alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
            }
          });
          return;
  });



  $("#report_modal_submit").on("click", function(){
    if($(report_modal_report).val() == ""){
      $("#notificationToast").html('<h2>Must submit a reason for report</h2>');
      $("#notificationToast").attr('class', 'notify');
      setTimeout(function () {
        $("#notificationToast").removeClass('notify');
      }, 3000);
    }
    else{
      if($("#current_baabl_delete").val() != "" && $("#current_baabl_comment_delete").val() == ""){

        var data = {
          'Action': 'ReportBaabl',
          'baabl_hash' : $("#current_baabl_delete").val(),
          'report_message' : $("#report_modal_report").val()
        };


        var location = rootLocation + "baabl/baabl.php"
        $.ajax({
          type:    "POST",
          url:     location,
          data:    data,
          success: function(resultPost) {
            var result = JSON.parse(resultPost);
            if(result['success']){
              $(report_modal).modal('hide');
              $("#notificationToast").html('<h2>'+ result['success']+'</h2>');
              $("#notificationToast").attr('class', 'notify');
              setTimeout(function () {
                $("#notificationToast").removeClass('notify');
              }, 3000);
            }
          },
          error:   function(jqXHR, textStatus, errorThrown) {
            alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
          }
        });


      }
      else if($("#current_baabl_delete").val() == "" && $("#current_baabl_comment_delete").val() != ""){

        var data = {
          'Action': 'ReportBaablComment',
          'comment_hash' : $("#current_baabl_comment_delete").val(),
          'report_message' : $("#report_modal_report").val()
        };


        var location = rootLocation + "baabl_comments/baabl_comments.php"
        $.ajax({
          type:    "POST",
          url:     location,
          data:    data,
          success: function(resultPost) {
            var result = JSON.parse(resultPost);
            if(result['success']){
              $(report_modal).modal('hide');
              $("#notificationToast").html('<h2>'+ result['success']+'</h2>');
              $("#notificationToast").attr('class', 'notify');
              setTimeout(function () {
                $("#notificationToast").removeClass('notify');
              }, 3000);
            }
          },
          error:   function(jqXHR, textStatus, errorThrown) {
            alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
          }
        });



      }

    }

  });




  $(document).on("click", ".logout", function(){

        var data = {
        'Action': 'Logout'
        };

        var location = rootLocation + "login/login.php"
        $.ajax({
            type:    "POST",
            url:     location,
            data:    data,
            success: function(resultPost) {
              var result = JSON.parse(resultPost);
                var url = rootLocation + result['newPage'] + '.php';
                window.location.href = url;
            },
            error:   function(jqXHR, textStatus, errorThrown) {
                  alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
            }
          });
          return;
    });

});
