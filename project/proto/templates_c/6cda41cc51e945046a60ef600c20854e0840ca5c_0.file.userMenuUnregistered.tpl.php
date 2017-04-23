<?php
/* Smarty version 3.1.30, created on 2017-04-23 15:57:00
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/common/userMenuUnregistered.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fcc0bcedc650_64367717',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6cda41cc51e945046a60ef600c20854e0840ca5c' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/common/userMenuUnregistered.tpl',
      1 => 1492955126,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fcc0bcedc650_64367717 (Smarty_Internal_Template $_smarty_tpl) {
?>
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <!--<span class="sr-only">Toggle navigation</span>-->
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/home.php"> <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
/res/img/logo.png"></a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/authentication/login.php">Log in</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/authentication/signup.php">Sign up</a>
                </li>
            </ul>
        </div>
    </div>
</nav><?php }
}
