<?php /* Smarty version 3.1.27, created on 2015-12-02 07:56:21
         compiled from "C:\wamp\www\baabl\templates\profile.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13596565e9615b28041_42450125%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85d263e3ccca4f0c26fe98f890a005605a023e93' => 
    array (
      0 => 'C:\\wamp\\www\\baabl\\templates\\profile.tpl',
      1 => 1449039378,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13596565e9615b28041_42450125',
  'variables' => 
  array (
    'profile_user_hash' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565e9615b51335_54382602',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565e9615b51335_54382602')) {
function content_565e9615b51335_54382602 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13596565e9615b28041_42450125';
?>
<input value =<?php echo $_smarty_tpl->tpl_vars['profile_user_hash']->value;?>
>
<?php }
}
?>