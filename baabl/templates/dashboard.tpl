<head>
  <title>Baabl Dashboard</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../static/dashboard/dashboard.css" />
  <script type="text/javascript" src="../static/dashboard/dashboard.js"></script>

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="import" href="../polymer/header.html">
  <link rel="import" href="../polymer/sidebar.html">
  <link rel="import" href="../polymer/notification.html">
  <link rel="import" href="../polymer/baabl.html">

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

<div id = "header_sidebar_container">
  <message-sidebar></message-sidebar>

</div>

  <div class="main_content">
    <textarea maxlength="1000" id = "baabl_message" placeholder="Add your baabl!"></textarea>
    <button class = "submit">submit</button>



  <paper-button class = "logout">logout</paper-button>


  <input id = "current_baabl_delete">
  <input id = "current_baabl_comment_delete">

  <input id = "current_user_first"  value={$current_user_first}>

  <input id = "current_user_last"  value={$current_user_last}>
  <input id = "current_user_email"  value={$current_user_email}>
  <input id = "current_user_hash"  value={$current_user_hash}>

  <br>
  <div id = "baabl_container">
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



</div>


</body>
