<?php
/* Smarty version 3.1.30, created on 2017-04-18 13:08:15
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/common/adminHeader.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f601af1066d7_90316976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '90bfc47a3965d977fa473ff7231c08accdbf1a2b' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/common/adminHeader.tpl',
      1 => 1492517251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/header.tpl' => 1,
    'file:common/adminMenuRegistered.tpl' => 1,
    'file:common/adminMenuUnregistered.tpl' => 1,
  ),
),false)) {
function content_58f601af1066d7_90316976 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--<?php if ($_smarty_tpl->tpl_vars['USERNAME']->value) {?>-->
<?php $_smarty_tpl->_subTemplateRender("file:common/adminMenuRegistered.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!--<?php } else {
$_smarty_tpl->_subTemplateRender("file:common/adminMenuUnregistered.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }?>--><?php }
}
