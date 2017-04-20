<?php
/* Smarty version 3.1.30, created on 2017-04-18 12:46:51
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/manageSpaces.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f5fcab41d307_39407895',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a99cf13a77c5a40f13c56dbb3140a96e44428c53' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/manageSpaces.tpl',
      1 => 1492515899,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/userHeader.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_58f5fcab41d307_39407895 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/userHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="manageSpaces">
    <div class="container">
        <a href="addSpace.php" class="btn btn-primary gradient-red">Add Space <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
        <hr>
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="#">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                    <div class="caption ">
                        <h5 class="text-center">Space 1</h5><br>
                        <div class="row">
                            <div class="col-md-7">
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Covered: <span> Yes </span></label></li>
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Surface: <span> Syntetic grass </span></label></li>
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Dimensions: <span> Normal </span></label></li>
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Price / hour: <span> 36€ </span></label></li>
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports: <span> Tenis, Basketball </span></label></li>
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Available: <span> Yes </span></label></li>
                                </ul>
                            </div>
                            <div class="mobileFixButtons col-md-5">
                                <button type="button" class="btn btn-primary gradient-yellow" data-toggle="modal" data-target="#editSpaceModal">Edit<br>Information</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="#">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                    <div class="caption ">
                        <h5 class="text-center">Space 2</h5><br>
                        <div class="row">
                            <div class="col-md-7">
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Covered: <span> Yes </span></label></li>
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Surface: <span> Syntetic grass </span></label></li>
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Dimensions: <span> Normal </span></label></li>
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Price / hour: <span> 36€ </span></label></li>
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports: <span> Tenis, Basketball </span></label></li>
                                    <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Available: <span> Yes </span></label></li>
                                </ul>
                            </div>
                            <div class="mobileFixButtons col-md-5">
                                <button type="button" class="btn btn-primary gradient-yellow" data-toggle="modal" data-target="#editSpaceModal">Edit<br>Information</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <!-- Modal -->
        <div class="modal fade" id="editSpaceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel">
                            Edit Space 1
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form id="editSpaceForm" action="#" method="post" autocomplete="on" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Surface</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Grass</option>
                                                <option>Syntetic Grass </option>
                                                <option>Dirt</option>
                                            </select>
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon primary">Coverage</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Covered</option>
                                                <option>Uncovered</option>
                                            </select>
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon primary">Dimensions</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Big</option>
                                                <option>Small</option>
                                                <option>Medium</option>
                                            </select>
                                        </div>

                                            <div class="input-group">
                                                <span class="input-group-addon primary">Price / hour</span>
                                                <input class="form-control" type="number" name="points" min="0" max="20" step="1" value="0">
                                            </div>

                                        <div class="input-group">
                                            <span class="input-group-addon primary">Availability</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Available</option>
                                                <option>Unavailable</option>
                                            </select>
                                        </div>

                                            <div class="input-group">
                                                <span class="input-group-addon primary">Sports</span>
                                                <select class="form-control" name="sports" multiple>
                                                    <option value="football">Football</option>
                                                    <option value="basketball">Basketball</option>
                                                    <option value="tenis">Tenis</option>
                                                </select>
                                            </div>


                                        <div class="input-group">
                                            <input type="submit" class="btn btn-primary gradient-yellow" value="Upload representative picture"/>
                                            <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
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


<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php }
}
