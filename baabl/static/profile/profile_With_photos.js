document.addEventListener("DOMContentLoaded", function(event) {

  var rootLocation = "http://localhost/baabl/htdocs/";

  var dropZoneAnimating = false;
  var isMainPhoto = false;
  var isProfilePhoto = false;
  var isHeaderPhoto = false;

  var editable = false;


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


  var rem = function rem() {
         var html = document.getElementsByTagName('html')[0];

         return function () {
             return parseInt(window.getComputedStyle(html)['fontSize']);
         }
     }();


   function toRem(length) {
       return (parseInt(length) / rem());
   }


  var currentHeight = 0;
  $(window).load(function() {
      //get the natural page height -set it in variable above.

      currentHeight = $('#profile_description').outerHeight();
      currentHeight = toRem(currentHeight);
      currentHeight = currentHeight - 50;
      $(".main_content").css({"border-bottom": "solid "+currentHeight+"rem #E0E0E0"});
  });


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

  function loadQuestion(questionHash){
    var data = {
      'Action': 'LoadQuestion',
      'question_hash': questionHash
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
        if(result['question']){
          console.log(result['question'][0]['question_text']);
        }
      },
      error:   function(jqXHR, textStatus, errorThrown) {
        alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
      }
    });
  }

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
          var answer_text;
          var answer_time;
          for (i = 0; i < result['answerArray'].length; i++) {

            answer_text = result['answerArray'][i]['answer_text'];
            answer_time = result['answerArray'][i]['answer_time'];

            var data = {
              'Action': 'LoadQuestion',
              'question_hash': result['answerArray'][i]['question_hash'],
              'answer_text' : answer_text,
              'answer_time' : answer_time
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
                  dynamicEl.setAttribute("answer", result2['answer_text']);
                  dynamicEl.setAttribute("answer-time", result2['answer_time']);
                  dynamicEl.setAttribute("picture-thumbnail", "409e4413/1acc63f9c3.jpg");
                  document.getElementById("profile_body").appendChild(dynamicEl);

                }
              },
              error:   function(jqXHR, textStatus, errorThrown) {
                alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
              }
            });


          }
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


  $("#profile_photo_upload_button").on("click", function(){
    isMainPhoto = true;
    isProfilePhoto = true;
    $("#photo_upload_modal").modal('show');
  });

  $("#profile_header_photo_upload_button").on("click", function(){
    isMainPhoto = true;
    isHeaderPhoto = true;
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
            name = name + "." + result['userProfilePicture'][0]['user_picture_ext'];
            var picturePath = rootLocation + "user_pictures/" + $("#profile_user_hash").val() + "/" + name;
            $("#profile_photo").css("background-image", "url("+picturePath+")");

          }
        },
        error:   function(jqXHR, textStatus, errorThrown) {
          alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
        }
      });
    }

    // loadProfilePhoto();

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


  function setPageNumber(){
    var data = {
      'Action': 'GetCountOfUserPictures',
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
        if(result['countOfUserPictures']){
          $("#profile_description_photos_text").html(result['countOfUserPictures'][0]['COUNT(*)'] + " Photos");
          var totalPages = Math.ceil(parseInt(result['countOfUserPictures'][0]['COUNT(*)'], 10)/6);
          $("#profile_description_photos_page_number").html("1/" + totalPages);
        }
      },
      error:   function(jqXHR, textStatus, errorThrown) {
        alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
      }
    });
  }

  setPageNumber();

  function loadPhotoPreview(limit, offset){

    var data = {
      'Action': 'GetUserPictures',
      'user_hash' : $("#profile_user_hash").val(),
      'page_offset' : offset,
      'limit' : limit
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
        if(result['baablUserPicturesArray'] != "no pictures" && result['baablUserPicturesArray']){
          for (i = 0; i < result['baablUserPicturesArray'].length; i++) {
            var name = result['baablUserPicturesArray'][i]['user_picture_hash'];
            name = name + "." + result['baablUserPicturesArray'][i]['user_picture_ext'];
            var picturePath = rootLocation + "user_pictures/" + $("#profile_user_hash").val() + "/" + name;
            $("#profile_description_photos").append("<div class = profile_description_photos_box style = background-image:url("+picturePath+")></div>");
          }
        }
      },
      error:   function(jqXHR, textStatus, errorThrown) {
        alert("Error, status = " + textStatus + ", " + "error thrown: " + errorThrown);
      }
    });
  }

  var page_offset = $("#profile_description_photos_arrow").text();
  page_offset = page_offset.split("/");
  page_offset = parseInt(page_offset[0], 10) - 1;

  loadPhotoPreview(6, page_offset);


  $("#profile_description_photos_previous").on("click", function(){
    var currentPage = $("#profile_description_photos_page_number").html();
    currentPage = currentPage.split("/");
    if(currentPage[0] == "1"){
      currentPage[0] = currentPage[1];
      $("#profile_description_photos_page_number").html(currentPage[0] + "/" + currentPage[1]);
    }
    else{
      currentPage[0] = parseInt(currentPage[0], 10) - 1;
      $("#profile_description_photos_page_number").html(currentPage[0] + "/" + currentPage[1]);
    }
    $("#profile_description_photos").empty();
    console.log(parseInt(currentPage[0], 10) - 1);
    loadPhotoPreview(6, (parseInt(currentPage[0], 10) - 1)*6);
  });

  $("#profile_description_photos_next").on("click", function(){
    var currentPage = $("#profile_description_photos_page_number").html();
    currentPage = currentPage.split("/");
    if(currentPage[0] == currentPage[1]){
      currentPage[0] = 1;
      $("#profile_description_photos_page_number").html(currentPage[0] + "/" + currentPage[1]);
    }
    else{
      currentPage[0] = parseInt(currentPage[0], 10) + 1;
      $("#profile_description_photos_page_number").html(currentPage[0] + "/" + currentPage[1]);
    }

    $("#profile_description_photos").empty();
    console.log(parseInt(currentPage[0], 10) - 1);
    loadPhotoPreview(6, (parseInt(currentPage[0], 10) - 1)*6);
  });


  $(document).on("click", ".profile_description_photos_box", function(){

    var img = new Image();

    img.onload = function(){
      var height = img.height;
      var width = img.width;

      if(height > width){
        $('#photo_viewer_modal_photo').removeClass('fillwidth');
        $('#photo_viewer_modal_photo').addClass('fillheight');
      }
      else{
        $('#photo_viewer_modal_photo').removeClass('fillheight');
        $('#photo_viewer_modal_photo').addClass('fillwidth');
      }

    }

    var source = $(this).css("background-image");
    source = source.trim(" ");
    source = source.substring(5, source.length-2);
    img.src = source

    $("#photo_viewer_modal").modal('show');
    $("#photo_viewer_modal_photo").css("background-image", $(this).css("background-image"));
  });


  /*******************************************************************************************************************
  DROPZONE STUFF
  *******************************************************************************************************************/

  Dropzone.autoDiscover = false;


  // Get the template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);


  var myDropzone = new Dropzone("#dropzone", {
    url: rootLocation + "baabl_profile/baabl_profile.php",
    dictDefaultMessage: "Please drop files or click here to upload",
    previewTemplate: previewTemplate,
    autoProcessQueue: false,
    previewsContainer: "#previews",
    clickable: true,
    maxFilesize: 640,
    acceptedFiles: "image/*",
    resize: function(file) {
      var targetWidth;
      var targetHeight;
      if(file.width > file.height){
        targetWidth = 300;
        targetHeight = file.height * 300 / file.width;
      }
      else if(file.width < file.height ){
        targetHeight = 300;
        targetWidth = file.width * 300 / file.height;
      }
      else{
        targetHeight = 300;
        targetWidth = 300;
      }
      var resizeInfo = {
        srcX: 0,
        srcY: 0,
        trgX: 0,
        trgY: 0,
        srcWidth: file.width,
        srcHeight: file.height,
        trgWidth: targetWidth,
        trgHeight: targetHeight
      };

      return resizeInfo;
    },
    init: function() {
      this.on("success", function(file, responseText) {
        console.log(responseText);
      });

      this.on("error", function(file, errorMessage) {
        console.log(errorMessage);
      });

      this.on("processing", function(file){
        if(!isMainPhoto){
          this.options.autoProcessQueue = true;
        }
      });


      this.on('sending', function(file, xhr, formData){
        caption = file.previewTemplate.querySelector('.caption_text');
        formData.append('caption', $(caption).val());

        if(isMainPhoto){
          if(isProfilePhoto){
            formData.append('Action', "UploadProfilePicture");
          }
          else if(isHeaderPhoto){
            formData.append('Action', "UploadHeaderPicture");
          }
        }
        else{
          formData.append('Action', "DropzonePictures");
        }

      });

      this.on("complete", function() {
        // If all files have been uploaded
        if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
          var _this = this;
          // Remove all files
          _this.removeAllFiles();
        }
      });


      this.on("addedfile", function(file) {
        this.options.autoProcessQueue = false;
        if (this.files[1]!=null && isMainPhoto){
          this.removeFile(this.files[0]);

          var removeButton = Dropzone.createElement("<paper-button class = photo_remove_button>Remove</paper-button>");

          var _this = this;

          removeButton.addEventListener("click", function(e) {
            dropZoneAnimating = true;
            e.preventDefault();
            e.stopPropagation();


            $(this).parent().hide('300', function(){
              dropZoneAnimating = false;
              _this.removeFile(file);
            });


          });


          file.previewElement.appendChild(removeButton);
        }


        else{

          var removeButton = Dropzone.createElement("<paper-button class = photo_remove_button>Remove</paper-button>");

          var _this = this;

          removeButton.addEventListener("click", function(e) {

            dropZoneAnimating = true;
            e.preventDefault();
            e.stopPropagation();


            $(this).parent().hide('300', function(){
              dropZoneAnimating = false;
              _this.removeFile(file);
            });

          });

          file.previewElement.appendChild(removeButton);

        }

      });

    }

  });




  $("#photo_upload_modal_submit").on("click", function(){
    if(dropZoneAnimating){
      setTimeout(function(){
        myDropzone.processQueue();

      }, 300);
    }
    else{
      myDropzone.processQueue();
    }

  });





  $(document).on("mouseover", ".photo_remove_button", function(){
    $(this).attr("raised", "true");
    $(this).attr("elevation", "1");
  });

  $(document).on("mouseout", ".photo_remove_button", function(){
    $(this).removeAttr("raised");
    $(this).removeAttr("elevation");
  });



  $('#photo_upload_modal').on('hidden.bs.modal', function () {
    isMainPhoto = false;
    isHeaderPhoto = false;
    isProfilePhoto = false;
    myDropzone.removeAllFiles();
  })



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
