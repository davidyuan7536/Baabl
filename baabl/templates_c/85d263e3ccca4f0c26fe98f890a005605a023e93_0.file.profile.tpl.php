<?php /* Smarty version 3.1.27, created on 2016-05-14 13:57:09
         compiled from "C:\wamp\www\baabl\templates\profile.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1161957371295c9bf37_73925782%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85d263e3ccca4f0c26fe98f890a005605a023e93' => 
    array (
      0 => 'C:\\wamp\\www\\baabl\\templates\\profile.tpl',
      1 => 1463226969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1161957371295c9bf37_73925782',
  'variables' => 
  array (
    'profile_user_hash' => 0,
    'user_hash' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_57371295d128d7_12853047',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_57371295d128d7_12853047')) {
function content_57371295d128d7_12853047 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1161957371295c9bf37_73925782';
?>
<head>
  <title>Baabl Profile</title>
  <meta charset="UTF-8">
  <?php echo '<script'; ?>
 type="text/javascript" src="../bower_components/webcomponentsjs/webcomponents.js"><?php echo '</script'; ?>
>
  <link rel="stylesheet" type="text/css" href="../static/profile/profile.css" />
  <?php echo '<script'; ?>
 type="text/javascript" src="../static/profile/profile.js"><?php echo '</script'; ?>
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

  <?php echo '<script'; ?>
 src="../static/js/vendor/jquery.ui.widget.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../static/js/jquery.iframe-transport.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../static/js/jquery.fileupload.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../static/js/jquery.fileupload-ui.js"><?php echo '</script'; ?>
>



  <?php echo '<script'; ?>
 type="text/javascript" src="../static/ajax_uploader.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 type="text/javascript" src="../static/image_select.js"><?php echo '</script'; ?>
>
  <link rel="stylesheet" type="text/css" href="../static/image_select.css" />

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

      <div id = "profile_header_photo">
        <div id = "profile_header_photo_progress_mask"></div>
        <div id = "profile_header_photo_progress" class = "finished">100</div>
      </div>
      <div id = "profile_header_photo_edit">
        <paper-button id = "profile_header_photo_upload_button" raised><span class="fa fa-camera-retro"></span> Upload Photo</paper-button>
        <!-- <div>
        <span class="fa fa-pencil"></span>
        <div>Edit Background</div>
      </div> -->
    </div>
  </div>

  <div id = "profile_photo">
    <div id = "profile_photo_progress_mask"></div>
    <div id = "profile_photo_progress" class = "finished">100</div>
    <paper-button id = "profile_photo_upload_button" raised><span class="fa fa-camera-retro"></span> Upload</paper-button>


  </div>

  <div id = "profile_options">
    <paper-button class = "profile_options_button" id = "add_friend_button">Add Friend</paper-button>
    <paper-button class = "profile_options_button">Option 2</paper-button>
    <paper-button class = "profile_options_button">Option 3</paper-button>
  </div>

  <div id = "profile_body_wrap">

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




  <div class="modal fade" id="photo_upload_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="photo_upload_modal_title"></h4>
        </div>
        <div id = "photo_upload_modal_body" class="modal-body">



          <div class="box" method="post" enctype="multipart/form-data">
            <div class="box__input">
              <input class="box__file" type="file" id="file"/>
              <label for="file"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>Choose a file</span></label>
            </div>
            <div class="box__uploading">Uploading&hellip;</div>
            <div class="box__success">Done!</div>
            <div class="box__error">Error! <span></span>.</div>
          </div>
          <div id="parent" style="position:relative;">
            <img id="photo_upload_modal_preview" src="#" alt="your image" />
            <div id = "photo_upload_modal_preview_text">Please crop your picture to the desired ratio and submit when finished</div>
          </div>

          <!-- <img id="photo_upload_modal_preview" src="#" alt="your image" /> -->
          <!-- <div id="photo_upload_modal_preview"></div> -->


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