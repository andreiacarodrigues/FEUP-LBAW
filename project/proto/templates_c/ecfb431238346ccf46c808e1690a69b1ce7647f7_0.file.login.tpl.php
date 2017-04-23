<?php
/* Smarty version 3.1.30, created on 2017-04-23 15:57:56
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/authentication/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fcc0f408fef4_45328042',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ecfb431238346ccf46c808e1690a69b1ce7647f7' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/authentication/login.tpl',
      1 => 1492955136,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/userHeader.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_58fcc0f408fef4_45328042 (Smarty_Internal_Template $_smarty_tpl) {
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
                    <div class="row errorMessage">
                      <span><?php echo $_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value;?>
</span>
                    </div>
                    <div class="row">
                      <input type="submit" class="btn btn-primary btn-lg gradient-blue" value="Login"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
