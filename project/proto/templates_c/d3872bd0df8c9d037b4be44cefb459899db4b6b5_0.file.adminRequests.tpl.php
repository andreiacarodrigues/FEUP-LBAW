<?php
/* Smarty version 3.1.30, created on 2017-04-18 13:07:51
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/admins/adminRequests.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f6019782c855_30255110',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd3872bd0df8c9d037b4be44cefb459899db4b6b5' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/admins/adminRequests.tpl',
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
function content_58f6019782c855_30255110 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/adminHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="admin-statistics-header">
    <div class="admin">
        <div class="container">
            <div class="row">
                <div class="container thumbnail">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <br><li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Username: <span> 123abc </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-right mobileFixButtons">
                        <br>
                        <button type="button" class="btn btn-primary gradient-blue">Accept</button>
                        <button type="button" class="btn btn-primary gradient-red">Remove</button>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="container thumbnail">
                    <div class="col-md-6">
                        <ul class="list-unstyled">
                            <br><li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Username: <span> 456abc </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-right mobileFixButtons">
                        <br>
                        <button type="button" class="btn btn-primary gradient-blue">Accept</button>
                        <button type="button" class="btn btn-primary gradient-red">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
