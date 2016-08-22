document.addEventListener("DOMContentLoaded", function(event) {

  var generalImages = "http://localhost/baabl/images/";

  var rootLocation = "http://localhost/baabl/htdocs/";

  var uploading = false;
  var isProfilePhoto = false;
  var isHeaderPhoto = false;

  var editable = false;

  var profilePhotoPath;


  /*******************************************************************************************************************
  PAGE STUFF
  *******************************************************************************************************************/

  if($("#user_hash").val() == $("#profile_user_hash").val()){
    editable = true;
  }

  if(!editable){
    $("#profile_header_photo_upload_button").remove();
    $("#profile_photo_upload_button").remove();
  }
  else{
    // $("#profile_body_question_wrap").remove();
  }


  // var rem = function rem() {
  //        var html = document.getElementsByTagName('html')[0];
  //
  //        return function () {
  //            return parseInt(window.getComputedStyle(html)['fontSize']);
  //        }
  //    }();
  //
  //
  //  function toRem(length) {
  //      return (parseInt(length) / rem());
  //  }
  //
  //
  // var currentHeight = 0;
  // $(window).load(function() {
  //     //get the natural page height -set it in variable above.
  //
  //     currentHeight = $('#profile_description').outerHeight();
  //     currentHeight = toRem(currentHeight);
  //     currentHeight = currentHeight - 50;
  //     $(".main_content").css({"border-bottom": "solid "+currentHeight+"rem #E0E0E0"});
  // });


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


  function loadProfilePhoto(){
    var data = {
      'Action': 'GetProfilePicture',
      'user_hash' : $("#profile_user_hash").val()
    };

    var location = rootLocation + "baabl_profile/baabl_profile.php"
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
        if(result['userProfilePicture'] != "no profile picture"){
          var name = result['userProfilePicture'][0]['user_picture_hash'];
          name = name + "thumbnail" + "." + result['userProfilePicture'][0]['user_picture_ext'];
          // name = "profilePicture" + "thumbnail" + "." + result['userProfilePicture'][0]['user_picture_ext'];
          var picturePath = rootLocation + "user_pictures/" + $("#profile_user_hash").val() + "/" + name;
          profilePhotoPath = picturePath;
          $("#profile_photo").css("background-image", "url("+picturePath+")");

        }
        else{
          var picturePath = generalImages + "blank_profile_photo.png";
          $("#profile_photo").css("background-image", "url("+picturePath+")");
        }
      },
      error:   function(jqXHR, textStatus, errorThrown) {
        alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
      }
    });
  }

  loadProfilePhoto();


  // function loadQuestion(questionHash){
  //   var data = {
  //     'Action': 'LoadQuestion',
  //     'question_hash': questionHash
  //   };
  //   var location = rootLocation + "baabl_profile/baabl_profile.php"
  //   $.ajax({
  //     type:    "POST",
  //     url:     location,
  //     data:    data,
  //     success: function(resultPost) {
  //       var result = JSON.parse(resultPost);
  //       if(result['errorMessage']){
  //         $("#notificationToast").html('<h2>'+ result['errorMessage']+'</h2>');
  //         $("#notificationToast").attr('class', 'notify');
  //         setTimeout(function () {
  //           $("#notificationToast").removeClass('notify');
  //         }, 3000);
  //       }
  //       if(result['question']){
  //         console.log(result['question'][0]['question_text']);
  //       }
  //     },
  //     error:   function(jqXHR, textStatus, errorThrown) {
  //       alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
  //     }
  //   });
  // }


  function loadAnswers(){
    var data = {
      'Action': 'LoadAnswers',
      'user_hash': $('#profile_user_hash').val()
    };

    var location = rootLocation + "baabl_profile/baabl_profile.php"
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
        if(result['answerArray']){
          var data = {
            'Action': 'GetProfilePicture',
            'user_hash' : $("#profile_user_hash").val()
          };
          var location = rootLocation + "baabl_profile/baabl_profile.php"
          $.ajax({
            type:    "POST",
            url:     location,
            data:    data,
            success: function(resultPost) {
              var result2 = JSON.parse(resultPost);
              if(result2['errorMessage']){
                $("#notificationToast").html('<h2>'+ result2['errorMessage']+'</h2>');
                $("#notificationToast").attr('class', 'notify');
                setTimeout(function () {
                  $("#notificationToast").removeClass('notify');
                }, 3000);
                return false;
              }
              if(result2['userProfilePicture'] != "no profile picture"){
                var name = result2['userProfilePicture'][0]['user_picture_hash'];
                name = name + "thumbnail" + "." + result2['userProfilePicture'][0]['user_picture_ext'];
                // name = "profilePicture" + "thumbnail" + "." + result['userProfilePicture'][0]['user_picture_ext'];
                var picturePath = rootLocation + "user_pictures/" + $("#profile_user_hash").val() + "/" + name;
                profilePhotoPath = picturePath;

              }
              else{
                var picturePath = generalImages + "blank_profile_photo.png";
                profilePhotoPath = picturePath;
              }

              var answer_text;
              var answer_time;

              var i = 0;
              var loopArray = function(arr) {
                customLoadAnswers(arr[i],function(){
                    // set x to next item
                    i++;

                    // any more items in array? continue loop
                    if(i < arr.length) {
                        loopArray(arr);
                    }
                });
              }

              function customLoadAnswers(msg,callback) {

                answer_text = result['answerArray'][i]['answer_text'];
                answer_time = result['answerArray'][i]['answer_time'];
                answer_hash = result['answerArray'][i]['answer_hash'];
                answer_edited = result['answerArray'][i]['answer_edited'];
                console.log(answer_edited);
                var data = {
                  'Action': 'LoadQuestion',
                  'question_hash': result['answerArray'][i]['question_hash']
                };
                var location = rootLocation + "baabl_profile/baabl_profile.php"
                $.ajax({
                  type:    "POST",
                  url:     location,
                  data:    data,
                  success: function(resultPost) {
                    var result2 = JSON.parse(resultPost);
                    if(result2['errorMessage']){
                      $("#notificationToast").html('<h2>'+ result2['errorMessage']+'</h2>');
                      $("#notificationToast").attr('class', 'notify');
                      setTimeout(function () {
                        $("#notificationToast").removeClass('notify');
                      }, 3000);
                    }
                    if(result2['question']){
                      var dynamicEl = document.createElement("profile-answer");
                      dynamicEl.setAttribute("question", result2['question'][0]['question_text']);
                      dynamicEl.setAttribute("answer", answer_text);
                      dynamicEl.setAttribute("answer-time", answer_time);
                      dynamicEl.setAttribute("picture-thumbnail", profilePhotoPath);
                      dynamicEl.setAttribute("answer-hash", answer_hash);
                      dynamicEl.setAttribute("answer-edited", answer_edited);
                      document.getElementById("profile_body").appendChild(dynamicEl);
                      callback();

                    }
                  },
                  error:   function(jqXHR, textStatus, errorThrown) {
                    alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
                  }
                });
              }
              loopArray( result['answerArray']);
            },
            error:   function(jqXHR, textStatus, errorThrown) {
              alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
            }
          });
        }
      },
      error:   function(jqXHR, textStatus, errorThrown) {
        alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
      }
    });
  }

  loadAnswers();

  function newNotification(user_hash, notification_type, notification_trigger_hash){
    var data = {
      'Action': 'NewNotification',
      'user_hash' : user_hash,
      'notification_type' : notification_type,
      'notification_trigger_hash' : notification_trigger_hash
    };

    var location = rootLocation + "baabl_notifications/baabl_notifications.php"
    $.ajax({
      type:    "POST",
      url:     location,
      data:    data,
      success: function(resultPost) {
        var result = JSON.parse(resultPost);
        if(result['errorMessage']){
          console.log(result['errorMessage']);
        }
        if(result['success']){
          console.log(result['success']);
        }
      },
      error:   function(jqXHR, textStatus, errorThrown) {
        alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
      }
    });
  }



  $("#profile_photo_upload_button").on("click", function(e){
    if (!e) var e = window.event
    e.cancelBubble = true;
    if (e.stopPropagation) e.stopPropagation();
    if(isHeaderPhoto){
      isHeaderPhoto = false;
    }
    isProfilePhoto = true;
    $("#photo_upload_modal_title").html("New Profile Photo");
    $("#photo_upload_modal").modal('show');

  });




  $("#profile_photo").on("click", function(){
      $("#photo_viewer_modal").modal('show');
  });

  $("#profile_header_photo_upload_button").on("click", function(){
    if (!e) var e = window.event
    e.cancelBubble = true;
    if (e.stopPropagation) e.stopPropagation();
    if(isProfilePhoto){
      isProfilePhoto = false;
    }
    isHeaderPhoto = true;
    $("#photo_upload_modal_title").html("New Header Photo");
    $("#photo_upload_modal").modal('show');
  });


    $("#profile_body_question_submit").on("click", function(){
      var data = {
        'Action': 'SubmitQuestion',
        'user_hash' : $("#profile_user_hash").val(),
        'question': $("#profile_body_question").val()
      };

      var location = rootLocation + "baabl_profile/baabl_profile.php"
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

            newNotification($("#profile_user_hash").val(), "question", result['question_hash']);
          }
        },
        error:   function(jqXHR, textStatus, errorThrown) {
          alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
        }
      });


    });



    function loadHeaderPhoto(){
      var data = {
        'Action': 'GetHeaderPicture',
        'user_hash' : $("#profile_user_hash").val()
      };

      var location = rootLocation + "baabl_profile/baabl_profile.php"
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
          if(result['userHeaderPicture'] != "no header picture"){
            var name = result['userHeaderPicture'][0]['user_picture_hash'];
            name = name + "." + result['userHeaderPicture'][0]['user_picture_ext'];
            var picturePath = rootLocation + "user_pictures/" + $("#profile_user_hash").val() + "/" + name;
            $("#profile_header_photo").css("background-image", "url("+picturePath+")");

          }
        },
        error:   function(jqXHR, textStatus, errorThrown) {
          alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
        }
      });
    }

    // loadHeaderPhoto();


  // function setPageNumber(){
  //   var data = {
  //     'Action': 'GetCountOfUserPictures',
  //     'user_hash' : $("#profile_user_hash").val()
  //   };
  //
  //   var location = rootLocation + "baabl_profile/baabl_profile.php"
  //   $.ajax({
  //     type:    "POST",
  //     url:     location,
  //     data:    data,
  //     success: function(resultPost) {
  //       var result = JSON.parse(resultPost);
  //       if(result['errorMessage']){
  //         $("#notificationToast").html('<h2>'+ result['errorMessage']+'</h2>');
  //         $("#notificationToast").attr('class', 'notify');
  //         setTimeout(function () {
  //           $("#notificationToast").removeClass('notify');
  //         }, 3000);
  //       }
  //       if(result['countOfUserPictures']){
  //         $("#profile_description_photos_text").html(result['countOfUserPictures'][0]['COUNT(*)'] + " Photos");
  //         var totalPages = Math.ceil(parseInt(result['countOfUserPictures'][0]['COUNT(*)'], 10)/6);
  //         $("#profile_description_photos_page_number").html("1/" + totalPages);
  //       }
  //     },
  //     error:   function(jqXHR, textStatus, errorThrown) {
  //       alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
  //     }
  //   });
  // }
  //
  // setPageNumber();
  //
  // function loadPhotoPreview(limit, offset){
  //
  //   var data = {
  //     'Action': 'GetUserPictures',
  //     'user_hash' : $("#profile_user_hash").val(),
  //     'page_offset' : offset,
  //     'limit' : limit
  //   };
  //
  //   var location = rootLocation + "baabl_profile/baabl_profile.php"
  //   $.ajax({
  //     type:    "POST",
  //     url:     location,
  //     data:    data,
  //     success: function(resultPost) {
  //       var result = JSON.parse(resultPost);
  //       if(result['errorMessage']){
  //         $("#notificationToast").html('<h2>'+ result['errorMessage']+'</h2>');
  //         $("#notificationToast").attr('class', 'notify');
  //         setTimeout(function () {
  //           $("#notificationToast").removeClass('notify');
  //         }, 3000);
  //       }
  //       if(result['baablUserPicturesArray'] != "no pictures" && result['baablUserPicturesArray']){
  //         for (i = 0; i < result['baablUserPicturesArray'].length; i++) {
  //           var name = result['baablUserPicturesArray'][i]['user_picture_hash'];
  //           name = name + "." + result['baablUserPicturesArray'][i]['user_picture_ext'];
  //           var picturePath = rootLocation + "user_pictures/" + $("#profile_user_hash").val() + "/" + name;
  //           $("#profile_description_photos").append("<div class = profile_description_photos_box style = background-image:url("+picturePath+")></div>");
  //         }
  //       }
  //     },
  //     error:   function(jqXHR, textStatus, errorThrown) {
  //       alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
  //     }
  //   });
  // }
  //
  // var page_offset = $("#profile_description_photos_arrow").text();
  // page_offset = page_offset.split("/");
  // page_offset = parseInt(page_offset[0], 10) - 1;
  //
  // loadPhotoPreview(6, page_offset);
  //
  //
  // $("#profile_description_photos_previous").on("click", function(){
  //   var currentPage = $("#profile_description_photos_page_number").html();
  //   currentPage = currentPage.split("/");
  //   if(currentPage[0] == "1"){
  //     currentPage[0] = currentPage[1];
  //     $("#profile_description_photos_page_number").html(currentPage[0] + "/" + currentPage[1]);
  //   }
  //   else{
  //     currentPage[0] = parseInt(currentPage[0], 10) - 1;
  //     $("#profile_description_photos_page_number").html(currentPage[0] + "/" + currentPage[1]);
  //   }
  //   $("#profile_description_photos").empty();
  //   console.log(parseInt(currentPage[0], 10) - 1);
  //   loadPhotoPreview(6, (parseInt(currentPage[0], 10) - 1)*6);
  // });
  //
  // $("#profile_description_photos_next").on("click", function(){
  //   var currentPage = $("#profile_description_photos_page_number").html();
  //   currentPage = currentPage.split("/");
  //   if(currentPage[0] == currentPage[1]){
  //     currentPage[0] = 1;
  //     $("#profile_description_photos_page_number").html(currentPage[0] + "/" + currentPage[1]);
  //   }
  //   else{
  //     currentPage[0] = parseInt(currentPage[0], 10) + 1;
  //     $("#profile_description_photos_page_number").html(currentPage[0] + "/" + currentPage[1]);
  //   }
  //
  //   $("#profile_description_photos").empty();
  //   console.log(parseInt(currentPage[0], 10) - 1);
  //   loadPhotoPreview(6, (parseInt(currentPage[0], 10) - 1)*6);
  // });
  //
  //
  // $(document).on("click", ".profile_description_photos_box", function(){
  //
  //   var img = new Image();
  //
  //   img.onload = function(){
  //     var height = img.height;
  //     var width = img.width;
  //
  //     if(height > width){
  //       $('#photo_viewer_modal_photo').removeClass('fillwidth');
  //       $('#photo_viewer_modal_photo').addClass('fillheight');
  //     }
  //     else{
  //       $('#photo_viewer_modal_photo').removeClass('fillheight');
  //       $('#photo_viewer_modal_photo').addClass('fillwidth');
  //     }
  //
  //   }
  //
  //   var source = $(this).css("background-image");
  //   source = source.trim(" ");
  //   source = source.substring(5, source.length-2);
  //   img.src = source
  //
  //   $("#photo_viewer_modal").modal('show');
  //   $("#photo_viewer_modal_photo").css("background-image", $(this).css("background-image"));
  // });
  //

  /*******************************************************************************************************************
  PHOTO UPLOAD STUFF
  *******************************************************************************************************************/

  var isAdvancedUpload = function() {
    var div = document.createElement('div');
    return (('draggable' in div) || ('ondragstart' in div && 'ondrop' in div)) && 'FormData' in window && 'FileReader' in window;
  }();

  var uploadCounter = 0;
  var uploadTracker = [];

  function em(input) {
    var emSize = parseFloat($("body").css("font-size"));
    return (emSize * input);
  }

  var cropSelectionObj = {final_x1: "", final_y1: "", final_x2: "", final_y1: "", scaled_width: "", scaled_height: ""};
  function cropSelection(obj) {
    if(isProfilePhoto){
      if($('#photo_upload_modal_preview').height() > $('#photo_upload_modal_preview').width()){
          obj.final_x1 = 0;
          obj.final_x2 = $('#photo_upload_modal_preview').width();
          var deltaHeight = ($('#photo_upload_modal_preview').height() - $('#photo_upload_modal_preview').width())/2;
          obj.final_y1 = deltaHeight;
          obj.final_y2 = $('#photo_upload_modal_preview').height() - deltaHeight;

      }
      else{
        obj.final_y1 = 0;
        obj.final_y2 = $('#photo_upload_modal_preview').height();
        var deltaWidth = ($('#photo_upload_modal_preview').width() - $('#photo_upload_modal_preview').height())/2;
        obj.final_x1 = deltaWidth;
        obj.final_x2 = $('#photo_upload_modal_preview').width() - deltaWidth;
      }
    }

    else if(isHeaderPhoto){
      if($('#photo_upload_modal_preview').height()*2 >= $('#photo_upload_modal_preview').width())
      {
        obj.final_x1 = 0;
        obj.final_x2 = $('#photo_upload_modal_preview').width();
        obj.final_y1 = $('#photo_upload_modal_preview').height()/2 - $('#photo_upload_modal_preview').width()/4;
        obj.final_y2 = $('#photo_upload_modal_preview').height()/2 + $('#photo_upload_modal_preview').width()/4;
      }
      else{
        obj.final_y1 = 0;
        obj.final_y2 = $('#photo_upload_modal_preview').height();
        obj.final_x1 = $('#photo_upload_modal_preview').width()/2 - $('#photo_upload_modal_preview').height();
        obj.final_x2 = $('#photo_upload_modal_preview').width()/2 + $('#photo_upload_modal_preview').height();
      }
    }

    obj.scaled_width = $('#photo_upload_modal_preview').width();
    obj.scaled_height = $('#photo_upload_modal_preview').height();
  }


  var $form = $('.box');

  if(isAdvancedUpload){
    $('.box > .box__input > label > span').html('Choose a file or drop it here!');

    var droppedFiles = false;

    $form.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
      e.preventDefault();
      e.stopPropagation();
    })
    .on('dragover dragenter', function() {
      $form.addClass('is-dragover');
    })
    .on('dragleave dragend drop', function() {
      $form.removeClass('is-dragover');
    })
    .on('drop', function(e) {
      console.log(e.originalEvent.dataTransfer.files[e.originalEvent.dataTransfer.files.length-1]);
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#photo_upload_modal_preview').attr('src', e.target.result);
          $('#photo_upload_modal_preview').css('display', 'inline-block');
          $('#photo_upload_modal_preview_text').css('display', 'inline-block');
          $('#photo_upload_modal_body').animate({ scrollTop: em(17.65) }, 'slow');
          cropSelection(cropSelectionObj);
          var cropRatio = "";
          if(isProfilePhoto){
            cropRatio = "2:1";
          }
          else if(isHeaderPhoto){
            cropRatio = "3:!"
          }
          $('#photo_upload_modal_preview').imgAreaSelect({
            aspectRatio: cropRatio,
            handles: true,
            parent: '#parent',
            x1: cropSelectionObj.final_x1,
            y1: cropSelectionObj.final_y1,
            x2: cropSelectionObj.final_x2,
            y2: cropSelectionObj.final_y2,

            onSelectEnd: function (img, selection) {
              cropSelectionObj.final_x1 = selection.x1;
              cropSelectionObj.final_x2 = selection.x2;
              cropSelectionObj.final_y1 = selection.y1;
              cropSelectionObj.final_y2 = selection.y2;

            }

          });

      }
      reader.readAsDataURL(e.originalEvent.dataTransfer.files[e.originalEvent.dataTransfer.files.length-1]);
    });

  }




  function readURL(input) {
      var dfrd1 = $.Deferred();
      if (input.files && input.files[0]) {


          var reader = new FileReader();

          reader.onload = function (e) {
              $('#photo_upload_modal_preview').attr('src', e.target.result);
              $('#photo_upload_modal_preview').css('display', 'inline-block');
              $('#photo_upload_modal_preview_text').css('display', 'inline-block');
              dfrd1.resolve();

          }
          reader.readAsDataURL(input.files[0]);
      }
      return $.when(dfrd1).promise();

  }




  $("#file").change(function(){

      readURL(this).done(function(){
        var cropRatio = "";
        if(isProfilePhoto){
          cropRatio = "1:1";
        }
        else if(isHeaderPhoto){
          cropRatio = "2:1"
        }
        $('#photo_upload_modal_body').animate({ scrollTop: em(17.65) }, 'slow');
        cropSelection(cropSelectionObj);
        $('#photo_upload_modal_preview').imgAreaSelect({
          aspectRatio: cropRatio,
          handles: true,
          parent: '#parent',
          x1: cropSelectionObj.final_x1,
          y1: cropSelectionObj.final_y1,
          x2: cropSelectionObj.final_x2,
          y2: cropSelectionObj.final_y2,

          onSelectEnd: function (img, selection) {
            cropSelectionObj.final_x1 = selection.x1;
            cropSelectionObj.final_x2 = selection.x2;
            cropSelectionObj.final_y1 = selection.y1;
            cropSelectionObj.final_y2 = selection.y2;

          }

        });


      });
  });


  $('.box').fileupload({
        dataType: 'json',
        url: rootLocation + "baabl_profile/baabl_profile.php",
        maxFileSize: 10000000,
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        dropZone: $('.box'),
        autoUpload: false,
        progressall: function (e, data) {
          var progress = parseInt(data.loaded / data.total * 100, 10);
          $("#profile_photo_progress").html(progress);
          if(progress == 100){

            if(isProfilePhoto){
              $('#profile_photo_progress').addClass("processing");
              setTimeout(function() {
                $('#profile_photo_progress').addClass("success");

                setTimeout(function() {
                  $('#profile_photo_progress').addClass("finish");
                  $("#profile_photo_progress_mask").css('visibility','hidden');
                  $("#profile_photo_upload_button").css('display', 'block');

                  $("#profile_photo_progress").css('visibility', 'hidden');
                  setTimeout(function() {
                    $('#profile_photo_progress').removeClass("finish");
                    $('#profile_photo_progress').removeClass("processing");
                    $('#profile_photo_progress').removeClass("success");
                  }, 500);

                }, 500);
              }, 1500);
            }

            if(isHeaderPhoto){
              $('#profile_header_photo_progress').addClass("processing");
              setTimeout(function() {
                $('#profile_header_photo_progress').addClass("success");

                setTimeout(function() {
                  $('#profile_header_photo_progress').addClass("finish");
                  $("#profile_header_photo_progress_mask").css('visibility','hidden');
                  $("#profile_header_photo_upload_button").css('display', 'block');

                  $("#profile_header_photo_progress").css('visibility', 'hidden');
                  setTimeout(function() {
                    $('#profile_header_photo_progress').removeClass("finish");
                    $('#profile_header_photo_progress').removeClass("processing");
                    $('#profile_header_photo_progress').removeClass("success");
                  }, 500);

                }, 500);
              }, 1500);
            }


          }
        },
        send: function (e, data) {
          if(isProfilePhoto){
            $("#profile_photo_progress").css('visibility', 'visible');
            $("#profile_photo_upload_button").css('display', 'none');
            $("#profile_photo_progress_mask").css('visibility','visible');
          }
          else if(isHeaderPhoto){
            console.log("header photo");
            $("#profile_header_photo_progress").css('visibility', 'visible');
            $("#profile_header_photo_upload_button").css('display', 'none');
            $("#profile_header_photo_progress_mask").css('visibility','visible');
          }
        },
        add: function (e, data) {

          var ext = data.files[0].name.split('.').pop().toLowerCase();
          if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
            alert('invalid extension!');
          }
            uploadCounter++;
            uploadTracker.push(data.files[0]);
            $("#photo_upload_modal_submit").on("click", function(){
                data.submit();
                $('#photo_upload_modal').modal('hide');
            });
        },
        done: function(e, data) {

            if(data.result['errorMessage']){
              $("#notificationToast").html('<h2>'+ data.result['errorMessage']+'</h2>');
              $("#notificationToast").attr('class', 'notify');
              setTimeout(function () {
                $("#notificationToast").removeClass('notify');
              }, 3000);
            }
            if(data.result['success']){
              $("#notificationToast").html('<h2>'+ data.result['success']+'</h2>');
              $("#notificationToast").attr('class', 'notify');
              setTimeout(function () {
                $("#notificationToast").removeClass('notify');
              }, 3000);


              var name = data.result['user_picture_hash'];
              name = name + "." + data.result['user_picture_ext'];
              var picturePath = rootLocation + "user_pictures/" + $("#profile_user_hash").val() + "/" + name;
              if(isProfilePhoto){
                setTimeout(function () {
                  $("#profile_photo").css("background-image", "url("+picturePath+")");
                }, 1500);

              }
              else if (isHeaderPhoto){
                setTimeout(function () {
                    $("#profile_header_photo").css("background-image", "url("+picturePath+")");
                }, 1500);

              }
            }
        }
    });

    $('.box').bind('fileuploadsubmit', function (e, data) {

      data.formData =  [{name:'x1',value:cropSelectionObj.final_x1}, {name:'x2',value:cropSelectionObj.final_x2}, {name:'y1',value:cropSelectionObj.final_y1}, {name:'y2',value:cropSelectionObj.final_y2}, {name:'scaled_width',value:cropSelectionObj.scaled_width}, {name:'scaled_height',value:cropSelectionObj.scaled_height}, {name:'Action',value:"SavePhoto"}, {name:'is_profile_photo',value:isProfilePhoto}, {name:'is_header_photo' ,value:isHeaderPhoto}];

    });

    $('.box').bind('fileuploadsend', function (e, data) {
      if ($.inArray(data.files[0], uploadTracker) != uploadCounter-1) {
                return false;
      }
    });


    $('#photo_upload_modal').on('hidden.bs.modal', function () {
      $('.box.box__file').empty();
      $('#photo_upload_modal_preview').css('display', 'none');
      $('#photo_upload_modal_preview_text').css('display', 'none');
      var ias = $('#photo_upload_modal_preview').imgAreaSelect({ instance: true });
      ias.setOptions({ hide: true });
    });


    // var counter = 0;
    // var id;
    //
    // id = setInterval(function() {
    //     counter += 20;
    //     $("#profile_header_photo_progress").html(counter);
    //     if(counter == 100) {
    //       $('#profile_header_photo_progress').addClass("processing");
    //       setTimeout(function() {
    //         $('#profile_header_photo_progress').addClass("success");
    //
    //         setTimeout(function() {
    //           $('#profile_header_photo_progress').addClass("finish");
    //
    //
    //         }, 500);
    //       }, 1500);
    //     }
    // }, 1000);





  $("paper-button").hover(function(){

    $(this).attr("raised", "true");
    $(this).attr("elevation", "1");

  }, function(){
    $(this).removeAttr("raised");
    $(this).removeAttr("elevation");
  });


  $('#profile_body_question').keyup(function() {

    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');

    current.text(characterCount);

  });


  /*******************************************************************************************************************
   STUFF
  *******************************************************************************************************************/





});
