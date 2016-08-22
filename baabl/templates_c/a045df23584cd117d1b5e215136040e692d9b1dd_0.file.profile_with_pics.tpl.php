<?php /* Smarty version 3.1.27, created on 2016-04-17 00:15:35
         compiled from "C:\wamp\www\baabl\templates\profile_with_pics.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:280135712b987e93082_14042688%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a045df23584cd117d1b5e215136040e692d9b1dd' => 
    array (
      0 => 'C:\\wamp\\www\\baabl\\templates\\profile_with_pics.tpl',
      1 => 1460844900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280135712b987e93082_14042688',
  'variables' => 
  array (
    'profile_user_hash' => 0,
    'user_hash' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5712b987ed2db1_12746565',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5712b987ed2db1_12746565')) {
function content_5712b987ed2db1_12746565 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '280135712b987e93082_14042688';
?>
<head>
  <title>Baabl Profile</title>
  <meta charset="UTF-8">
  <?php echo '<script'; ?>
 type="text/javascript" src="../bower_components/webcomponentsjs/webcomponents.js"><?php echo '</script'; ?>
>
  <link rel="stylesheet" type="text/css" href="../static/profile/profile_With_photos.css" />
  <?php echo '<script'; ?>
 type="text/javascript" src="../static/profile/profile_With_photos.js"><?php echo '</script'; ?>
>

  <?php echo '<script'; ?>
 type="text/javascript" src="../static/dropzone.js"><?php echo '</script'; ?>
>
  <!-- <link rel="stylesheet" type="text/css" href="../static/dropzone.css" /> -->

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"><?php echo '</script'; ?>
>
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

  <input style = "display:none" id = "profile_user_hash"  value=<?php echo $_smarty_tpl->tpl_vars['profile_user_hash']->value;?>
>
  <input style = "display:none" id = "user_hash"  value=<?php echo $_smarty_tpl->tpl_vars['user_hash']->value;?>
>




  <div id = "header_sidebar_container">
    <message-sidebar></message-sidebar>
  </div>

  <div class="main_content">

    <div id = "profile_header">

      <div id = "profile_header_photo"></div>
      <div id = "profile_header_photo_edit">
        <paper-button id = "profile_header_photo_upload_button" raised><span class="fa fa-camera-retro"></span> Upload Photo</paper-button>
        <!-- <div>
        <span class="fa fa-pencil"></span>
        <div>Edit Background</div>
      </div> -->
    </div>
  </div>

  <div id = "profile_photo">

    <paper-button id = "profile_photo_upload_button" raised><span class="fa fa-camera-retro"></span> Upload</paper-button>


  </div>

  <div id = "profile_options">
    <paper-button class = "profile_options_button" id = "add_friend_button">Add Friend</paper-button>
    <paper-button class = "profile_options_button">Option 2</paper-button>
    <paper-button class = "profile_options_button">Option 3</paper-button>
  </div>

  <div id = "profile_body_wrap">
    <div id = "profile_description">
      <div id = "profile_description_name">David Yuan</div>

      <div id = "profile_description_about"></div>

      <div id = "profile_description_photos_text"></div>

      <div id = "profile_description_photos">

      </div>

      <div id = "profile_description_photos_arrow">
        <span id = "profile_description_photos_previous" class="fa fa-arrow-circle-o-left fa-3x"></span>
        <div id = "profile_description_photos_page_number"></div>
        <span id = "profile_description_photos_next" class="fa fa-arrow-circle-o-right fa-3x"></span>
      </div>

    </div>

    <div id = "profile_body">
        <div id = "profile_body_question_wrap">
            <div id = "profile_body_question_text">Ask David</div>
            <textarea id = "profile_body_question" maxlength="300" placeholder="What is your question?"></textarea>
            <div id="the-count">
              <span id="current">0</span>
              <span id="maximum">/ 300</span>
            </div>
            <paper-button id = "profile_body_question_submit">Submit</paper-button>
        </div>

        <!-- <profile-answer question="what is this" answer = "this is sparta"></profile-answer>
        <profile-answer></profile-answer> -->


    </div>



  </div>




<div id = "photo_viewer_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div id = "photo_viewer_modal_photo" >

        </div>

        <span id = "photo_viewer_modal_previous" class="fa fa-arrow-circle-o-left"></span>
        <div id = "photo_viewer_modal_photo_number">1/330</div>
        <span id = "photo_viewer_modal_next" class="fa fa-arrow-circle-o-right"></span>

      </div>
      <div id = "photo_viewer_modal_footer" class="modal-footer">
          <div id = "photo_viewer_modal_footer_profile_pic">

          </div>
          <div id = "photo_viewer_modal_footer_info_wrap">
            <div id = "photo_viewer_modal_footer_profile_name">
              David
            </div>
            <div id = "photo_viewer_modal_footer_post_date">
              December, 8th
            </div>
            <div id = "photo_viewer_modal_footer_post_caption">
              dasdsaddd dasaaaaaaaaaaaaaaadasdsaddd dasaaaaaaaaaaaaaaadasdsaddd dasaaaaaaaaaaaaaaadasdsaddd dasaaaaaaaaaaaaaaadasdsaddd dasaaaaaaaaaaaaaaadasdsaddd dasaaaaaaaaaaaaaaadasdsaddd dasaaaaaaaaaaaaaaadasdsaddd dasaaaaaaaaaaaaaaadasdsaddd
            </div>
          </div>
      </div>

    </div>

  </div>
</div>



  <!-- Button trigger modal -->
  <button style = "position:absolute; top:10rem;" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#photo_upload_modal">
    Launch demo modal
  </button>

  <div class="modal fade" id="photo_upload_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="photo_upload_modal_title">Modal title</h4>
        </div>
        <div id = "photo_upload_modal_body" class="modal-body">





          <form class = "dropzone" id = "dropzone">

          </form>






          <div class="table table-striped files" id="previews">

            <div id="template" class="file-row">
              <!-- This is used as the file preview template -->
              <div class = "preview_wrap">
                <div class = "preview-container">
                  <span class="preview"><img data-dz-thumbnail /></span>
                </div>
                <div>
                  <div class="preview_name" data-dz-name></div>
                </div>
                <div>
                  <div class="preview_size" data-dz-size></div>
                </div>
              </div>

              <div class ="caption_wrap">
                <textarea class = "caption_text"></textarea>
              </div>


              <!--
              <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
              <div class="progress-bar" style="width:0%;" data-dz-uploadprogress></div>
            </div> -->




          </div>

        </div>




      </div>
      <div id = "photo_upload_modal_footer" class="modal-footer">
        <paper-button type="button" data-dismiss="modal">Close</paper-button>
        <paper-button id = "photo_upload_modal_submit" type="button">Save changes</paper-button>
      </div>
    </div>
  </div>
</div>


</div>


</body>
<?php }
}
?>