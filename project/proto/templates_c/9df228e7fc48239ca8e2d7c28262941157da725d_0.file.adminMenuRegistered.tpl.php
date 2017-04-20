<?php
/* Smarty version 3.1.30, created on 2017-04-18 13:08:15
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/common/adminMenuRegistered.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f601af16e3a6_81681745',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9df228e7fc48239ca8e2d7c28262941157da725d' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/common/adminMenuRegistered.tpl',
      1 => 1492517251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f601af16e3a6_81681745 (Smarty_Internal_Template $_smarty_tpl) {
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
res/img/logo.png" ></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admins/adminUsers.php">Users</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admins/adminComplexes.php">Sports Complexes</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admins/adminRentals.php">Rentals</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admins/adminStatistics.php">Statistics</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admins/adminRequests.php">Requests</a>
                </li>
                <li>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
pages/admins/admin.php">Log out</a>
                </li>
            </ul>
        </div>
    </div>
</nav><?php }
}
