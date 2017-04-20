<?php
/* Smarty version 3.1.30, created on 2017-04-18 13:07:47
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/admins/adminRentals.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f601930354e3_62602608',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd4f45e95cb1c0308325604f1876393712b35f12' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/admins/adminRentals.tpl',
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
function content_58f601930354e3_62602608 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/adminHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


 <div class="admin-statistics-header">
    <div class="admin adminRentals">

    <div class="container">
        <div class="form-group">
        <div class="input-group">
            <div class="checkbox checkbox-info">
                <label>
                    <input type="checkbox" value="">
                    <span>Show only rentals with issue reports</span>
                </label>

            </div>
        </div>
        </div>
        <br>
        <div class="rental thumbnail">
            <div class="row">
                <div class="container">
                    <div class="col-md-10">
                        <ul class="list-unstyled">
                            <h4>Rental #<span>1</span></h4>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Name: <span> Andreia Rodrigues </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Contact: <span> 912345678 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Email: <span> andreiacarodrigues@gmail.com </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Date: <span> 2017/01/01 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Sports Complex: <span> Sport Complex 1 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Sports Complex Contact: <span> 919876543 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Sports Complex Email: <span> sc1@gmail.com </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Space: <span> Space 2 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Time of Start: <span> 12:05 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Duration: <span> 00:30 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  State: <span> Reserved </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-2 text-right mobileFixButtons">
                            <br>
                        <div class="row rentalTabletBtns">
                            <button type="button" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#issuesModal">Issue</button>
                            <button type="button" class="btn btn-primary gradient-yellow">Suspend</button>
                            <button type="button" class="btn btn-primary gradient-red">Remove</button>
                            <button type="button" class="btn btn-primary gradient-blue">Conclude</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rental thumbnail">
            <div class="row">
                <div class="container">
                    <div class="col-md-10">
                        <ul class="list-unstyled">
                            <h4>Rental #<span>2</span></h4>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Name: <span> Andreia Rodrigues </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Contact: <span> 912345678 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Email: <span> andreiacarodrigues@gmail.com </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Date: <span> 2017/01/01 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Sports Complex: <span> Sport Complex 1 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Sports Complex Contact: <span> 919876543 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Sports Complex Email: <span> sc1@gmail.com </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Space: <span> Space 2 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Time of Start: <span> 12:05 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Duration: <span> 00:30 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  State: <span> Reserved </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-2 text-right mobileFixButtons">
                        <br>
                        <div class="row rentalTabletBtns">
                            <button type="button" class="btn btn-primary gradient-yellow">Suspend</button>
                            <button type="button" class="btn btn-primary gradient-red">Remove</button>
                            <button type="button" class="btn btn-primary gradient-blue">Conclude</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rental thumbnail">
            <div class="row">
                <div class="container">
                    <div class="col-md-10">
                        <ul class="list-unstyled">
                            <h4>Rental #<span>3</span></h4>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Name: <span> Andreia Rodrigues </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Contact: <span> 912345678 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  User Email: <span> andreiacarodrigues@gmail.com </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Date: <span> 2017/01/01 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Sports Complex: <span> Sport Complex 1 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Sports Complex Contact: <span> 919876543 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Sports Complex Email: <span> sc1@gmail.com </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Space: <span> Space 2 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Time of Start: <span> 12:05 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Duration: <span> 00:30 </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  State: <span> Reserved </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-2 text-right mobileFixButtons">
                        <br>
                        <div class="row rentalTabletBtns">
                            <button type="button" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#issuesModal">Issue</button>
                            <button type="button" class="btn btn-primary gradient-yellow">Suspend</button>
                            <button type="button" class="btn btn-primary gradient-red">Remove</button>
                            <button type="button" class="btn btn-primary gradient-blue">Conclude</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>

        <div class="modal fade" id="issuesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel">
                            Issue
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="rental">
                            <div class="row">
                                <div class="container">

                                        <ul class="list-unstyled">
                                            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i> Date: <span> 2017/01/01 </span></label></li>
                                            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  Subject: <span> Equipment </span></label></li>
                                            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  Category: <span> Others </span></label></li>
                                            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Description: <span> O relvado estava em mau estado </span></label></li>
                                        </ul>


                                </div>
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
