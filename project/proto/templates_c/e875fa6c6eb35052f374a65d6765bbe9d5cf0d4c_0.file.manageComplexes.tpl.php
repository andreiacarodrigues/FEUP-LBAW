<?php
/* Smarty version 3.1.30, created on 2017-04-23 15:58:19
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/manageComplexes.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fcc10bdc4589_75898963',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e875fa6c6eb35052f374a65d6765bbe9d5cf0d4c' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/manageComplexes.tpl',
      1 => 1492955145,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/userHeader.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_58fcc10bdc4589_75898963 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/userHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="manageComplexes">
    <div class="container">
        <a href="../managers/addComplex.php" class="addComplexBtn btn btn-primary gradient-red">Add Complex <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
        <hr>
        <?php $_smarty_tpl->_assignInScope('ROW_COUNT', 0);
?>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['COMPLEXES']->value, 'COMPLEX');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['COMPLEX']->value) {
?>
            <?php if ($_smarty_tpl->tpl_vars['ROW_COUNT']->value == 0) {?><div class="row"><?php }
$_smarty_tpl->_assignInScope('ROW_COUNT', $_smarty_tpl->tpl_vars['ROW_COUNT']->value+1);
?><div class="col-md-4"><div class="thumbnail"><a href="sportComplex.php"><img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt=""></a><div class="caption text-center"><h5><?php echo $_smarty_tpl->tpl_vars['COMPLEX']->value['complexName'];?>
</h5><div class="row"><div class="col-6 btn-group-vertical"><a href="../users/sportComplex.php/?complexID=<?php echo $_smarty_tpl->tpl_vars['COMPLEX']->value['complexID'];?>
"  class="btn btn-primary gradient-blue">View Information  </a><a href="../managers/editComplex.php/?complexID=<?php echo $_smarty_tpl->tpl_vars['COMPLEX']->value['complexID'];?>
" class="btn btn-primary gradient-blue">Edit Information  </a><a href="../managers/manageRentalsManager.php/?complexID=<?php echo $_smarty_tpl->tpl_vars['COMPLEX']->value['complexID'];?>
" class="btn btn-primary gradient-blue">Manage Rentals </a><a href="../managers/manageSpaces.php/?complexID=<?php echo $_smarty_tpl->tpl_vars['COMPLEX']->value['complexID'];?>
" class="btn btn-primary gradient-blue">Manage Spaces  </a></div><div class="col-6 btn-group-vertical"><a href="../managers/manageEquipment.php/?complexID=<?php echo $_smarty_tpl->tpl_vars['COMPLEX']->value['complexID'];?>
" class="btn btn-primary gradient-blue">Manage Equipment  </a><a href="../managers/issuesManagement.php/?complexID=<?php echo $_smarty_tpl->tpl_vars['COMPLEX']->value['complexID'];?>
" class="btn btn-primary gradient-blue">Issue Reports  </a><a href="../managers/complexManagers.php/?complexID=<?php echo $_smarty_tpl->tpl_vars['COMPLEX']->value['complexID'];?>
" class="btn btn-primary gradient-blue">Manage Managers  </a><a href="../managers/managerStatistics.php/?complexID=<?php echo $_smarty_tpl->tpl_vars['COMPLEX']->value['complexID'];?>
" class="btn btn-primary gradient-blue">Statistics  </a></div></div></div></div></div><?php if ($_smarty_tpl->tpl_vars['ROW_COUNT_AUX']->value == 3) {?></div><?php echo $_smarty_tpl->tpl_vars['ROW_COUNT']->value == 0;
}
$_smarty_tpl->_assignInScope('VALUE', $_smarty_tpl->tpl_vars['VALUE']->value+1);
?>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>




           <!-- <div class="col-md-4">
                <div class="thumbnail">
                    <a href="sportComplex.php">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                    <div class="caption text-center">
                        <h5>Complex 2</h5>
                        <div class="row">
                            <div class="col-6 btn-group-vertical">
                                <a href="../users/sportComplex.php" class="btn btn-primary gradient-blue">View Information  </a>
                                <a href="../managers/editComplex.php" class="btn btn-primary gradient-blue">Edit Information  </a>
                                <a href="../managers/manageRentalsManager.php" class="btn btn-primary gradient-blue">Manage Rentals </a>
                                <a href="../managers/manageSpaces.php" class="btn btn-primary gradient-blue">Manage Spaces  </a>
                            </div>
                            <div class="col-6 btn-group-vertical">
                                <a href="../managers/manageEquipment.php" class="btn btn-primary gradient-blue">Manage Equipment  </a>
                                <a href="../managers/issuesManagement.php" class="btn btn-primary gradient-blue">Issue Reports  </a>
                                <a href="../managers/complexManagers.php" class="btn btn-primary gradient-blue">Manage Managers  </a>
                                <a href="../managers/managerStatistics.php" class="btn btn-primary gradient-blue">Statistics  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="sportComplex.php">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                    <div class="caption text-center">
                        <h5>Complex 3</h5>
                        <div class="row">
                            <div class="col-6 btn-group-vertical">
                                <a href="../users/sportComplex.php" class="btn btn-primary gradient-blue">View Information  </a>
                                <a href="../managers/editComplex.php" class="btn btn-primary gradient-blue">Edit Information  </a>
                                <a href="../managers/manageRentalsManager.php" class="btn btn-primary gradient-blue">Manage Rentals </a>
                                <a href="../managers/manageSpaces.php" class="btn btn-primary gradient-blue">Manage Spaces  </a>
                            </div>
                            <div class="col-6 btn-group-vertical">
                                <a href="../managers/manageEquipment.php" class="btn btn-primary gradient-blue">Manage Equipment  </a>
                                <a href="../managers/issuesManagement.php" class="btn btn-primary gradient-blue">Issue Reports  </a>
                                <a href="../managers/complexManagers.php" class="btn btn-primary gradient-blue">Manage Managers  </a>
                                <a href="../managers/managerStatistics.php" class="btn btn-primary gradient-blue">Statistics  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>

        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="sportComplex.php">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                    <div class="caption text-center">
                        <h5>Complex 4</h5>
                        <div class="row">
                            <div class="col-6 btn-group-vertical">
                                <a href="../users/sportComplex.php" class="btn btn-primary gradient-blue">View Information  </a>
                                <a href="../managers/editComplex.php" class="btn btn-primary gradient-blue">Edit Information  </a>
                                <a href="../managers/manageRentalsManager.php" class="btn btn-primary gradient-blue">Manage Rentals </a>
                                <a href="../managers/manageSpaces.php" class="btn btn-primary gradient-blue">Manage Spaces  </a>
                            </div>
                            <div class="col-6 btn-group-vertical">
                                <a href="../managers/manageEquipment.php" class="btn btn-primary gradient-blue">Manage Equipment  </a>
                                <a href="../managers/issuesManagement.php" class="btn btn-primary gradient-blue">Issue Reports  </a>
                                <a href="../managers/complexManagers.php" class="btn btn-primary gradient-blue">Manage Managers  </a>
                                <a href="../managers/managerStatistics.php" class="btn btn-primary gradient-blue">Statistics  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="sportComplex.php">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                    <div class="caption text-center">
                        <h5>Complex 5</h5>
                        <div class="row">
                            <div class="col-6 btn-group-vertical">
                                <a href="../users/sportComplex.php" class="btn btn-primary gradient-blue">View Information  </a>
                                <a href="../managers/editComplex.php" class="btn btn-primary gradient-blue">Edit Information  </a>
                                <a href="../managers/manageRentalsManager.php" class="btn btn-primary gradient-blue">Manage Rentals </a>
                                <a href="../managers/manageSpaces.php" class="btn btn-primary gradient-blue">Manage Spaces  </a>
                            </div>
                            <div class="col-6 btn-group-vertical">
                                <a href="../managers/manageEquipment.php" class="btn btn-primary gradient-blue">Manage Equipment  </a>
                                <a href="../managers/issuesManagement.php" class="btn btn-primary gradient-blue">Issue Reports  </a>
                                <a href="../managers/complexManagers.php" class="btn btn-primary gradient-blue">Manage Managers  </a>
                                <a href="../managers/managerStatistics.php" class="btn btn-primary gradient-blue">Statistics  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
