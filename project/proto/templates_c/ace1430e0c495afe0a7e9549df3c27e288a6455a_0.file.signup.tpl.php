<?php
/* Smarty version 3.1.30, created on 2017-04-17 22:38:00
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/signup.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f535b8f3fb82_70151015',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ace1430e0c495afe0a7e9549df3c27e288a6455a' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/signup.tpl',
      1 => 1492452163,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/userHeader.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_58f535b8f3fb82_70151015 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/userHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="intro-header">
    <div class="container">
        <div class="row">
            <div class="intro-message">
                <h1>Sign Up</h1>
                <hr class="intro-divider">
                <form id="signupForm" class="searchForm" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/authentication/signup.php" method="post" autocomplete="on">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <input type="tel" class="form-control" name="tel" id="tel"  placeholder="Enter your Phone Number"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"> <i class="glyphicon glyphicon-globe"></i></span>
                                    <input type="text" class="form-control" name="location" id="location"  placeholder="Enter your Location"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-lg gradient-blue" value="Register"/>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
