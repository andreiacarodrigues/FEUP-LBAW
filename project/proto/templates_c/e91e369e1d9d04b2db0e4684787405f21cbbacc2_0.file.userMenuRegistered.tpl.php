<?php
/* Smarty version 3.1.30, created on 2017-04-23 15:58:19
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/common/userMenuRegistered.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fcc10be51fd1_68894334',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e91e369e1d9d04b2db0e4684787405f21cbbacc2' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/common/userMenuRegistered.tpl',
      1 => 1492955125,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58fcc10be51fd1_68894334 (Smarty_Internal_Template $_smarty_tpl) {
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
res/img/logo.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/profile.php">Profile</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/users/manageRentals.php">Manage Rentals</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/managers/manageComplexes.php">Manage Complexes</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/authentication/logout.php">Log out</a>
                </li>

            </ul>

        </div>
    </div>
</nav><?php }
}
