<?php
/* Smarty version 3.1.30, created on 2017-04-24 18:40:51
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/common/userHeader.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fe38a343f1b1_00407567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd853a2530c726c83eb23f2b145fb6b1cd83e1801' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/common/userHeader.tpl',
      1 => 1493055389,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/header.tpl' => 1,
    'file:common/userMenuRegistered.tpl' => 1,
    'file:common/userMenuUnregistered.tpl' => 1,
  ),
),false)) {
function content_58fe38a343f1b1_00407567 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {
$_smarty_tpl->_subTemplateRender("file:common/userMenuRegistered.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php } else {
$_smarty_tpl->_subTemplateRender("file:common/userMenuUnregistered.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
}