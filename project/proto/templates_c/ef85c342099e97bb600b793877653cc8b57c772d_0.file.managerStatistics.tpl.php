<?php
/* Smarty version 3.1.30, created on 2017-04-18 12:48:42
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/managerStatistics.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f5fd1a92b365_57558757',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ef85c342099e97bb600b793877653cc8b57c772d' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/managerStatistics.tpl',
      1 => 1492515899,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/userHeader.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_58f5fd1a92b365_57558757 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/userHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="statistics">
    <div class="container">
        <div class="intro-add-complex text-center">
            <h2>Statistics for <span> Complex 1 </span></h2>
            <br><br><br>

        </div>
        <div class="thumbnail well">
        <ul class="list-unstyled list-statistics">
            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i> Total reservations over the current month: <span>50</span> reservations</label></li>
            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i> Total reservations over the current year: <span>80</span> reservations</label></li>
            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i> Medium reservation time length: <span>30</span> minutes</label></li>
            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i> Day of the week with most afluence: <span>Saturday</span></label></li>
            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i> User with most reservations: <span>Andreia Rodrigues</span></label></li>
            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i> Space with most reservations: <span> Space 1 </span></label></li>
        </ul>
        </div>
    </div>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php }
}
