<?php /* Smarty version 3.1.27, created on 2015-09-11 03:24:22
         compiled from "C:\wamp\www\safety\templates\index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1287855f22d46e51e94_77322032%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d1e65f22e9be829ff3d35bc703cd23c6337fdb6' => 
    array (
      0 => 'C:\\wamp\\www\\safety\\templates\\index.tpl',
      1 => 1441934657,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1287855f22d46e51e94_77322032',
  'variables' => 
  array (
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_55f22d46ef0ac9_16880180',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55f22d46ef0ac9_16880180')) {
function content_55f22d46ef0ac9_16880180 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1287855f22d46e51e94_77322032';
?>



Hello <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
, welcome to Smarty!
<?php }
}
?>