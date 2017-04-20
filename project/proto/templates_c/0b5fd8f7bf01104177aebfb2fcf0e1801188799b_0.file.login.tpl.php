<?php
/* Smarty version 3.1.30, created on 2017-04-18 11:56:34
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f5f0e22ee820_52769808',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b5fd8f7bf01104177aebfb2fcf0e1801188799b' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/login.tpl',
      1 => 1492512545,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/userHeader.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_58f5f0e22ee820_52769808 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/userHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="intro-header">
    <div class="container">
        <div class="row">
            <div class="intro-message">
                <h1>Login</h1>
                <hr class="intro-divider">
                <form id="loginForm" class="searchForm" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/authentication/login.php" method="post" autocomplete="on">
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
