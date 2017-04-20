<?php
/* Smarty version 3.1.30, created on 2017-04-18 13:08:15
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/admins/adminStatistics.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f601af0c0609_10130912',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd27e1a9ad5687b170c323ecacc154cf7f4e77c0f' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/admins/adminStatistics.tpl',
      1 => 1492517252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/adminHeader.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_58f601af0c0609_10130912 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/adminHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="admin-statistics-header">
    <div class="admin">

    <div class="container">
        <div class="intro-add-complex text-center">
            <h2>Statistics</h2>
            <br><br><br>

        </div>
        <div class="thumbnail">
        <ul class="list-unstyled list-statistics">
            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Total users registered over the current month: <span>100</span> users</label></li>
            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Total users registered over the current year: <span>200</span> users</label></li>
            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Total users registered: <span>300</span> users</label></li>
            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Total complexes registered: <span>50</span></label></li>
            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Total reservations made: <span>550</span></label></li>

        </ul>
        </div>
    </div>

</div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
