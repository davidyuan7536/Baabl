<head>
  <title>Baabl notification</title>
  <meta charset="UTF-8">
  <script type="text/javascript" src="../bower_components/webcomponentsjs/webcomponents.js"></script>
  <link rel="stylesheet" type="text/css" href="../static/notification/notification.css" />
  <script type="text/javascript" src="../static/notification/notification.js"></script>


  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="import" href="../polymer/header.html">
  <link rel="import" href="../polymer/sidebar.html">
  <link rel="import" href="../polymer/notification.html">
  <link rel="import" href="../polymer/profile_answers.html">


  <link rel="import" href="../bower_components/paper-button/paper-button.html">


</head>
<body>

  <div id = "notificationToast">
    <h2>cool</h2>
  </div>

  <div id = "confirmationToast">
    <div id = "confirmationMessage">
    </div>
    <a id = "confirmationToastYes" class="btn paper-raise">Yes</a>
    <a id = "confirmationToastNo" class="btn paper-raise">No</a>
  </div>

  <input style = "display:none" id = "notification_hash"  value={$notification_hash}>
  <input style = "display:none" id = "user_hash"  value={$user_hash}>




  <div id = "header_sidebar_container">
    <message-sidebar></message-sidebar>
  </div>

  <div class="main_content">

    <div id = "question_answer_wrap">
      <div id = "question_wrap">
        <div id = "question"></div>

        <div id = "question_report">
          <span class="fa fa-gavel"></span> Report
        </div>

        <div id = "question_delete">
          <span class="fa fa-eraser"></span> Delete
        </div>

      </div>

      <div id = "answer_wrap">
        <textarea id = "answer" maxlength="1000" placeholder="Write your response here..."></textarea>

        <div id="the-count-answer">
          <span id="current-answer">0</span>
          <span id="maximum-answer">/ 1000</span>
        </div>

        <div id = "answer_display"></div>
      </div>


      <div id = "answer_report">
        <span class="fa fa-gavel"></span> Report
      </div>

      <paper-button id = "answer_submit">Submit</paper-button>
      <paper-button id = "answer_edit">Edit</paper-button>
      <paper-button id = "answer_cancel">Cancel</paper-button>
    </div>


    <div id = "baabl_wrap">
      <div id = "baabl_description">
        Submit a Baabl
      </div>
      <textarea id = "baabl" maxlength="1000"></textarea>
      <div id="the-count">
        <span id="current">0</span>
        <span id="maximum">/ 1000</span>
      </div>
      <paper-button id = "baabl_submit">Submit</paper-button>
    </div>
  </div>






  <div class="modal fade" id="report_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="report_modal_title">Reason for report</h4>
        </div>
        <div class="modal-body">
          <textarea id = "report_modal_report"></textarea>
        </div>
        <div class="modal-footer">
          <paper-button data-dismiss="modal">Close</paper-button>
          <paper-button id = "report_modal_submit">Submit</paper-button>
        </div>
      </div>
    </div>
  </div>


</body>
