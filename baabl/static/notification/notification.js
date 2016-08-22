document.addEventListener("DOMContentLoaded", function(event) {

  var rootLocation = "http://localhost/baabl/htdocs/";

  var currentDelete;
  var currentReport;
  var editAnswer = false;
  var currentAnswer;
  var currentQuestion;
  var answerHash;
  var questionHash;

  var dynamicEl = document.createElement("navigation-header");
  dynamicEl.setAttribute("id", "header");
  dynamicEl.setAttribute("notification-number", "0");
  dynamicEl.setAttribute("friend-number", "3");
  document.getElementById("header_sidebar_container").appendChild(dynamicEl);


/*******************************************************************************************************************
CONFIRMATION STUFF
*******************************************************************************************************************/
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


  $('#confirmationToastYes').click(function(event){
    event.stopPropagation();
    $('#confirmationToast').removeClass('notify');

    if(currentDelete == "question" && questionHash != ''){
      var data = {
        'Action': 'DeleteQuestion',
        'question_hash' : questionHash
      };

      var location = rootLocation + "baabl_notifications/baabl_notifications.php"
      $.ajax({
        type:    "POST",
        url:     location,
        data:    data,
        success: function(resultPost) {
          var result = JSON.parse(resultPost);
          if(result['errorMessage']){
            $("#notificationToast").html('<h2>'+ result['errorMessage']+'</h2>');
            $("#notificationToast").attr('class', 'notify');
            setTimeout(function () {
              $("#notificationToast").removeClass('notify');
            }, 3000);
          }
          if(result['success']){
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
  });


  /*******************************************************************************************************************
  REPORT STUFF
  *******************************************************************************************************************/


  $("#report_modal_submit").on("click", function(){
    if($("#report_modal_report").val() == ""){
      $("#notificationToast").html('<h2>Must submit a reason for report</h2>');
      $("#notificationToast").attr('class', 'notify');
      setTimeout(function () {
        $("#notificationToast").removeClass('notify');
      }, 3000);
    }
    else{
      var data;
      if(currentReport == "question" && questionHash != ''){
        data = {
          'Action': 'ReportQuestion',
          'question_hash' : questionHash,
          'report': $("#report_modal_report").val()
        };
      }
      else if(currentReport == "answer" && answerHash != ''){
        data = {
          'Action': 'ReportAnswer',
          'answer_hash' : answerHash,
          'report': $("#report_modal_report").val()
        };

      }


      var location = rootLocation + "baabl_notifications/baabl_notifications.php"
      $.ajax({
        type:    "POST",
        url:     location,
        data:    data,
        success: function(resultPost) {
          var result = JSON.parse(resultPost);
          if(result['errorMessage']){
            $(report_modal).modal('hide');
            $("#notificationToast").html('<h2>'+ result['errorMessage']+'</h2>');
            $("#notificationToast").attr('class', 'notify');
            setTimeout(function () {
              $("#notificationToast").removeClass('notify');
            }, 3000);
          }
          if(result['success']){
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

  });


  /*******************************************************************************************************************
  QUESTION/ANSWER STUFF
  *******************************************************************************************************************/


  $('#answer').keyup(function() {
    var characterCount = $(this).val().length,
        current = $('#current-answer'),
        maximum = $('#maximum-answer'),
        theCount = $('#the-count-answer');
    current.text(characterCount);
  });

  $('#question_report').on("click", function(){
      $('#report_modal').modal('show');
      currentReport = "question";
  });

  $('#answer_report').on("click", function(){
      $('#report_modal').modal('show');
      currentReport = "answer";
  });

  $('#question_delete').on("click", function(event){
    event.stopPropagation();
    $('#confirmationMessage').html('Are you sure you want to delete this question?');
    $('#confirmationToast').addClass('notify');
    currentDelete = "question";
  });


  $("#answer_edit").on("click", function(){
    if(currentAnswer != "" && $("#current-answer").html() == "0"){
      $("#current-answer").html(currentAnswer.length);
    }
    $("#answer_submit").show();
    $("#answer_cancel").show();
    $("#the-count-answer").show();
    $("#answer").show().focus();;
    $("#answer").val("").val(currentAnswer);
    $("#answer_display").hide();
    $("#answer_edit").hide();
  });


  $("#answer_cancel").on("click", function(){
    $("#answer_submit").hide();
    $("#answer_cancel").hide();
    $("#the-count-answer").hide();
    $("#answer").hide();
    $("#answer_display").show();
    $("#answer_edit").show();
  });

  $("#answer_submit").on("click", function(){
    if($("#answer").val() == ""){
      $("#notificationToast").html('<h2>Cannot submit a blank answer</h2>');
      $("#notificationToast").attr('class', 'notify');
      setTimeout(function () {
        $("#notificationToast").removeClass('notify');
      }, 3000);
    }
    else{
      if(editAnswer){
        if(currentAnswer == $("#answer").val()){
          $("#answer_submit").hide();
          $("#answer_cancel").hide();
          $("#answer_display").html(currentAnswer);
          $("#the-count-answer").hide();
          $("#answer").hide();
          $("#answer_display").show();
          $("#answer_edit").show();
          editAnswer = true;
        }
        else{
          currentAnswer = $("#answer").val();
          var data = {
            'Action': 'UpdateAnswer',
            'answer_text' : $("#answer").val(),
            'answer_hash' : answerHash
          };

          var location = rootLocation + "baabl_notifications/baabl_notifications.php"
          $.ajax({
            type:    "POST",
            url:     location,
            data:    data,
            success: function(resultPost) {
              var result = JSON.parse(resultPost);
              if(result['errorMessage']){
                $(report_modal).modal('hide');
                $("#notificationToast").html('<h2>'+ result['errorMessage']+'</h2>');
                $("#notificationToast").attr('class', 'notify');
                setTimeout(function () {
                  $("#notificationToast").removeClass('notify');
                }, 3000);
              }
              if(result['success']){
                $("#notificationToast").html('<h2>'+ result['success']+'</h2>');
                $("#notificationToast").attr('class', 'notify');
                setTimeout(function () {
                  $("#notificationToast").removeClass('notify');
                }, 3000);

                $("#answer_submit").hide();
                $("#answer_cancel").hide();
                $("#answer_display").html(currentAnswer);
                $("#the-count-answer").hide();
                $("#answer").hide();
                $("#answer_display").show();
                $("#answer_edit").show();
                editAnswer = true;

              }
            },
            error:   function(jqXHR, textStatus, errorThrown) {
              alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
            }
          });

        }

      }
      else{
        currentAnswer = $("#answer").val();
        var data = {
          'Action': 'NewAnswer',
          'answer_text' : $("#answer").val(),
          'question_hash': questionHash
        };


        var location = rootLocation + "baabl_notifications/baabl_notifications.php"
        $.ajax({
          type:    "POST",
          url:     location,
          data:    data,
          success: function(resultPost) {
            var result = JSON.parse(resultPost);
            if(result['errorMessage']){
              $(report_modal).modal('hide');
              $("#notificationToast").html('<h2>'+ result['errorMessage']+'</h2>');
              $("#notificationToast").attr('class', 'notify');
              setTimeout(function () {
                $("#notificationToast").removeClass('notify');
              }, 3000);
            }
            if(result['success']){
              $("#notificationToast").html('<h2>'+ result['success']+'</h2>');
              $("#notificationToast").attr('class', 'notify');
              setTimeout(function () {
                $("#notificationToast").removeClass('notify');
              }, 3000);

              answerHash = result['answer_hash'];
              $("#answer_submit").hide();
              $("#answer_cancel").hide();
              $("#answer_display").html(currentAnswer);
              $("#the-count-answer").hide();
              $("#answer").hide();
              $("#answer_display").show();
              $("#answer_edit").show();
              editAnswer = true;

            }
          },
          error:   function(jqXHR, textStatus, errorThrown) {
            alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
          }
        });
      }

    }

  });


  /*******************************************************************************************************************
  BAABL STUFF
  *******************************************************************************************************************/

  $('#baabl').keyup(function() {
    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');
    current.text(characterCount);
  });

  $('#baabl_submit').on("click", function(){
    if($("#baabl").val() == ""){
      $("#notificationToast").html('<h2>Cannot submit a blank baabl</h2>');
      $("#notificationToast").attr('class', 'notify');
      setTimeout(function () {
        $("#notificationToast").removeClass('notify');
      }, 3000);
    }
    else{

      var data = {
        'Action': 'Baabl',
        'baabl' : $("#baabl").val()
      };


      var location = rootLocation + "baabl/baabl.php"
      $.ajax({
        type:    "POST",
        url:     location,
        data:    data,
        success: function(resultPost) {
          var result = JSON.parse(resultPost);
          if(result['errorMessage']){
            $(report_modal).modal('hide');
            $("#notificationToast").html('<h2>'+ result['errorMessage']+'</h2>');
            $("#notificationToast").attr('class', 'notify');
            setTimeout(function () {
              $("#notificationToast").removeClass('notify');
            }, 3000);
          }
          if(result['success']){
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
  });


  /*******************************************************************************************************************
  OVERALL PAGE STUFF
  *******************************************************************************************************************/

  $("paper-button").hover(function(){

    $(this).attr("raised", "true");
    $(this).attr("elevation", "1");

  }, function(){
    $(this).removeAttr("raised");
    $(this).removeAttr("elevation");
  });


  function getNotification(notification_hash, user_hash){
    var data = {
      'Action': 'GetNotification',
      'notification_hash' : notification_hash,
      'user_hash' : user_hash
    };

    var location = rootLocation + "baabl_notifications/baabl_notifications.php"
    $.ajax({
      type:    "POST",
      url:     location,
      data:    data,
      success: function(resultPost) {
        var result = JSON.parse(resultPost);
        if(result['errorMessage']){
          $("#notificationToast").html('<h2>'+ result['errorMessage']+'</h2>');
          $("#notificationToast").attr('class', 'notify');
          setTimeout(function () {
            $("#notificationToast").removeClass('notify');
          }, 3000);
        }
        else if(result['notification_type'] == "question"){
          $("#question").text(result['question_text']);
          questionHash = result['question_hash'];

        }
        else if(result['notification_type'] == "question answered"){
          $("#question").text(result['question_text']);
          questionHash = result['question_hash'];
          currentAnswer = result['answer_text'];
          editAnswer = true;
          answerHash = result['answer_hash'];
          $("#answer_display").html(result['answer_text']);
          $("#answer_submit").hide();
          $("#answer_cancel").hide();
          $("#the-count-answer").hide();
          $("#answer").hide();
          $("#answer_display").show();
          $("#answer_edit").show();
        }
        else if(result['notification_type'] == "answer"){
          questionHash = result['question_hash'];
          currentAnswer = result['answer_text'];
          answerHash = result['answer_hash'];
          currentQuestion = result['question_text'];
          $("#question").html(result['question_text']);
          $("#answer_display").html(result['answer_text']);
          $("#question_report").hide();
          $("#question_delete").hide();
          $("#answer_submit").hide();
          $("#answer_cancel").hide();
          $("#the-count-answer").hide();
          $("#answer").hide();
          $("#answer_display").show();
          $("#answer_edit").hide();
          $("#answer_report").show();


        }
      },
      error:   function(jqXHR, textStatus, errorThrown) {
        alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
      }
    });
  }

  getNotification($("#notification_hash").val(), $("#user_hash").val());

  $('html').click(function() {
      $('#confirmationToast').removeClass('notify');
  });

});
