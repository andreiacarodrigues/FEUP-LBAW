<?php
/* Smarty version 3.1.30, created on 2017-04-20 10:21:13
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/users/manageRentals.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f87d89ec6303_75060370',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab5c9fc63499afdfbd8834a4d7d700485338da82' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/users/manageRentals.tpl',
      1 => 1492525591,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/userHeader.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_58f87d89ec6303_75060370 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/opt/lbaw/lbaw1653/public_html/proto/lib/smarty/plugins/modifier.date_format.php';
$_smarty_tpl->_subTemplateRender("file:common/userHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="userRentals">
    <div class="container">
        <?php $_smarty_tpl->_assignInScope('VALUE', 1);
?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['RENTALS']->value, 'RENTAL');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['RENTAL']->value) {
?>
            <?php if ($_smarty_tpl->tpl_vars['VALUE']->value <= count($_smarty_tpl->tpl_vars['RENTALS']->value)) {?><div class="rental well well-sm"><div class="row"><div class="container"><div class="col-md-8"><ul class="list-unstyled"><h4 class="mobileFixText">Rental #<span><?php echo $_smarty_tpl->tpl_vars['VALUE']->value;?>
</span></h4><li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Date: <span> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['RENTAL']->value['rentalDate'],"%e / %b / %Y");?>
 </span></label></li><li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Sports Complex: <span> <?php echo $_smarty_tpl->tpl_vars['RENTAL']->value['complexName'];?>
 </span></label></li><li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Space: <span> <?php echo $_smarty_tpl->tpl_vars['RENTAL']->value['spaceName'];?>
 </span></label></li><li> <label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Time of Start: <span> <?php echo $_smarty_tpl->tpl_vars['RENTAL']->value['rentalStartTime'];?>
 </span></label></li><li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Duration: <span> <?php echo $_smarty_tpl->tpl_vars['RENTAL']->value['rentalDurationInMinutes'];?>
 </span></label></li><li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  State: <span><?php if ($_smarty_tpl->tpl_vars['RENTAL']->value['rentalState'] == "RESERVED") {?>Reserved<?php }
if ($_smarty_tpl->tpl_vars['RENTAL']->value['rentalState'] == "RESERVEDBYMANAGER") {?>Reserved By Manager<?php }
if ($_smarty_tpl->tpl_vars['RENTAL']->value['rentalState'] == "CANCELEDBYUSER") {?>Canceled By User<?php }
if ($_smarty_tpl->tpl_vars['RENTAL']->value['rentalState'] == "CANCELEDBYMANAGER") {?>Canceled By Manager<?php }
if ($_smarty_tpl->tpl_vars['RENTAL']->value['rentalState'] == "WAITINGUSERFEEDBACK") {?>Waiting For User Feedback<?php }
if ($_smarty_tpl->tpl_vars['RENTAL']->value['rentalState'] == "SUSPENDEDBYADMIN") {?>Suspended By An Administrator<?php }
if ($_smarty_tpl->tpl_vars['RENTAL']->value['rentalState'] == "CONCLUDED") {?>Concluded<?php }?></span></label></li></ul></div><?php if ($_smarty_tpl->tpl_vars['RENTAL']->value['rentalState'] == "WAITINGUSERFEEDBACK") {?><div class="col-md-4 mobileFixButtons"><div class="stars"><input class="star star-5" id="star-5" type="radio" name="star"/><label class="star star-5" for="star-5"></label><input class="star star-4" id="star-4" type="radio" name="star"/><label class="star star-4" for="star-4"></label><input class="star star-3" id="star-3" type="radio" name="star"/><label class="star star-3" for="star-3"></label><input class="star star-2" id="star-2" type="radio" name="star"/><label class="star star-2" for="star-2"></label><input class="star star-1" id="star-1" type="radio" name="star"/><label class="star star-1" for="star-1"></label></div><br><button type="button" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#reportModal"><i class="fa fa-ban"> </i> Report Issue </button></div><?php } else {
if ($_smarty_tpl->tpl_vars['RENTAL']->value['rentalState'] == "CONCLUDED" || $_smarty_tpl->tpl_vars['RENTAL']->value['rentalState'] == "CANCELEDBYUSER" || $_smarty_tpl->tpl_vars['RENTAL']->value['rentalState'] == "SUSPENDEDBYADMIN" || $_smarty_tpl->tpl_vars['RENTAL']->value['rentalState'] == "CANCELEDBYMANAGER") {?><div class="col-md-4 mobileFixButtons"></div><?php } else { ?><div class="col-md-4 mobileFixButtons"><button type="button" class="btn btn-primary gradient-red"><i class="glyphicon glyphicon-remove"></i> Cancel</button></div><?php }
}?></div></div></div><?php }
$_smarty_tpl->_assignInScope('VALUE', $_smarty_tpl->tpl_vars['VALUE']->value+1);
?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


       <!-- <div class="rental well well-sm">
            <div class="row">
                <div class="container">
                    <div class="col-md-8">
                        <ul class="list-unstyled">
                            <h4 class="mobileFixText">Rental #<span>1</span></h4>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Date: <span> 2017/01/01 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Sports Complex: <span> Sport Complex 1 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Space: <span> Space 2 </span></label></li>
                            <li> <label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Time of Start: <span> 12:05 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Duration: <span> 00:30 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  State: <span> Reserved </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mobileFixButtons">
                            <button type="button" class="btn btn-primary gradient-red"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="rental well well-sm">
            <div class="row">
                <div class="container">
                    <div class="col-md-8">
                        <ul class="list-unstyled">
                            <h4 class="mobileFixText">Rental #<span>1</span></h4>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Date: <span> 2017/01/01 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Sports Complex: <span> Sport Complex 1 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Space: <span> Space 2 </span></label></li>
                            <li> <label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Time of Start: <span> 12:05 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Duration: <span> 00:30 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  State: <span> Reserved </span></label></li>
                        </ul>
                    </div>

                    <div class="col-md-4 mobileFixButtons">

                        <div class="stars">
                                <input class="star star-5" id="star-5" type="radio" name="star"/>
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star"/>
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star"/>
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star"/>
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" id="star-1" type="radio" name="star"/>
                                <label class="star star-1" for="star-1"></label>
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#reportModal"><i class="fa fa-ban"> </i> Report Issue </button>
                    </div>
                </div>
            </div>
        </div>
    </div>-->

        <!------------------------>

        <!-- Modal -->
        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel">
                            Report
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form id="reportForm" action="#" method="post" autocomplete="on" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Subject</span>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon primary">To</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Sport's Complex Manager</option>
                                                <option>Website Administrator</option>
                                                <option>Both</option>
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Category</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Category 1</option>
                                                <option>Category 2</option>
                                                <option>Category 3</option>
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Description</span>
                                            <textarea class="form-control" rows="5" id="comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                         <button type="submit" class="btn btn-primary gradient-blue">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
