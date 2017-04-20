<?php
/* Smarty version 3.1.30, created on 2017-04-19 21:18:53
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/manageRentalsManager.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f7c62db29483_89350631',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df1ec352a4d457eefa0445655a332cb5891c2f80' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/manageRentalsManager.tpl',
      1 => 1492517253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/userHeader.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_58f7c62db29483_89350631 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/userHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="userRentals">
    <div class="container">
        <a href="../users/sportComplex.php" class="btn btn-primary gradient-blue">Add Rental <i class="fa fa-plus-circle" aria-hidden="true"></i>  </a>

        <hr>
        <div class="rental well well-sm">
            <div class="row">
                <div class="container">
                    <div class="col-md-2">
                        <h4>Rental #<span>1</span></h4>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <p> User Information: </p>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User: <span> xCutePsycho </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Name: <span> Andreia Cristina de Almeida Rodrigues </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Contact: <span> 912345678 </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <p> Reservation Information: </p>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Date: <span> 2017/01/02 </span></label></li>
                            <li> <label><i class="fa fa-chevron-right" aria-hidden="true"></i> Space: <span> Space 1 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Time of Start: <span> 12:05 </span></label></li>
                            <li> <label><i class="fa fa-chevron-right" aria-hidden="true"></i> Duration: <span> 00:30 </span></label></li>
                            <li> <label><i class="fa fa-chevron-right" aria-hidden="true"></i> State: <span> Reserved </span></label></li>
                        </ul>
                    </div>

                    <div class="col-md-2 mobileFixButtons">

                            <button type="button" class="btn btn-primary gradient-red"><i class="glyphicon glyphicon-remove"></i>Cancel</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="rental well well-sm">
            <div class="row">
                <div class="container">
                    <div class="col-md-2">
                        <h4>Rental #<span>2</span></h4>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <p> User Information: </p>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User: <span> xCutePsycho </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Name: <span> Andreia Cristina de Almeida Rodrigues </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Contact: <span> 912345678 </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <p> Reservation Information: </p>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Date: <span> 2017/01/02 </span></label></li>
                            <li> <label><i class="fa fa-chevron-right" aria-hidden="true"></i> Space: <span> Space 1 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Time of Start: <span> 12:05 </span></label></li>
                            <li> <label><i class="fa fa-chevron-right" aria-hidden="true"></i> Duration: <span> 00:30 </span></label></li>
                            <li> <label><i class="fa fa-chevron-right" aria-hidden="true"></i> State: <span> Reserved </span></label></li>
                        </ul>
                    </div>

                    <div class="col-md-2 mobileFixButtons">

                            <button type="button" class="btn btn-primary gradient-red"><i class="glyphicon glyphicon-remove"></i>Cancel</button>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
	
<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php }
}
