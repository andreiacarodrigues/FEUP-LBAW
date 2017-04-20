<?php
/* Smarty version 3.1.30, created on 2017-04-18 13:08:13
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/admins/admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f601ad21ffd3_79600004',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc99b8fcd55ea3764dcc4ea08ecbb2eeed9e3b93' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/admins/admin.tpl',
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
function content_58f601ad21ffd3_79600004 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/adminHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


  <div class="admin-intro-header">
        <div class="container">
            <div class="row">
                <div class="intro-message">
                    <h1>Login</h1>
                    <hr class="intro-divider">
                    <form id="loginForm" class="searchForm" action="adminStatistics.php" method="post" autocomplete="on">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                        <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-lg gradient-blue" value="Login"/>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
