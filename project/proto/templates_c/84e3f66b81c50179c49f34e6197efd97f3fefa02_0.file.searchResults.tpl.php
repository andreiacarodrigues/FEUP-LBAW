<?php
/* Smarty version 3.1.30, created on 2017-04-19 21:18:18
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/users/searchResults.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f7c60ad1c155_92939202',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84e3f66b81c50179c49f34e6197efd97f3fefa02' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/users/searchResults.tpl',
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
function content_58f7c60ad1c155_92939202 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/userHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="container">
<div class="row">
    <div class="col-md-4">
    <div id="searchResultsForm">
        <form role="form">
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Name</span>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Location</span>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Sport</span>
                    <select class="form-control" title="">
                        <option value="" disabled selected></option>
                        <option>Football</option>
                        <option>Basketball</option>
                        <option>Tenis</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Date</span>
                    <input type="date" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Starting Time</span>
                    <input type="time" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Duration</span>
                    <input type="time" class="form-control">
                </div>
            </div>
           <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Surface</span>
                    <select class="form-control" title="">
                        <option value="" disabled selected></option>
                        <option>Grass</option>
                        <option>Syntetic Grass</option>
                        <option>Dirt</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Coverage</span>
                    <select class="form-control" title="">
                        <option value="" disabled selected></option>
                        <option>Covered</option>
                        <option>Uncovered</option>
                        <option>Indiferent</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon primary">Dimensions</span>
                    <select class="form-control" title="">
                        <option value="" disabled selected></option>
                        <option>Big</option>
                        <option>Small</option>
                        <option>Medium</option>
                        <option>Indiferent</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-primary btn-lg gradient-blue" value="Search"/>
            </div>
        </form>
        </div>
    </div>

    <div class="col-md-8">
<div class="searchResults">
        <div class="searchResultsComplexes">
        <h1 class="page-header">Search Results: <small> 2 complexes found </small></h1>
    <div class="row">
        <div class="col-md-4">
            <a href="#">
                <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
            </a>
        </div>
        <div class="col-md-8">
            <h4> Complex 1 ⭐⭐⭐⭐</h4>
            <ul class="list-group">
                <li class="list-group-item"><i class="glyphicon glyphicon-globe"></i> Here goes the location </li>
                <li class="list-group-item"> <i class="fa fa-envelope fa"></i> Here goes the email </li>
                <li class="list-group-item"> <i class="fa fa-phone"></i> Here goes the phone number </li>
                <li class="list-group-item"> Description </li>
            </ul>
            <a class="btn btn-primary btn-lg gradient-blue" href="sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div>

    <!-- /.row -->
    <hr>
        <div class="row">
            <div class="col-md-4">
                <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
                </a>
            </div>
            <div class="col-md-8">
                <h4> Complex 2 ⭐⭐⭐ </h4>
                <ul class="list-group">
                    <li class="list-group-item"><i class="glyphicon glyphicon-globe"></i> Here goes the location </li>
                    <li class="list-group-item"> <i class="fa fa-envelope fa"></i> Here goes the email </li>
                    <li class="list-group-item"> <i class="fa fa-phone"></i> Here goes the phone number </li>
                    <li class="list-group-item"> Description </li>
                </ul>
                <a class="btn btn-primary btn-lg gradient-blue" href="sportComplex.php">Check Complex<span class="glyphicon glyphicon-chevron-right"></span></a>
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
