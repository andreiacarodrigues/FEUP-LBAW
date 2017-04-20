<?php
/* Smarty version 3.1.30, created on 2017-04-18 15:10:45
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/editComplex.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f61e66005602_04270343',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9e80297551401167ca8db5a30c78fe314bb17e1' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/editComplex.tpl',
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
function content_58f61e66005602_04270343 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/userHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="editComplex">
    <div class="container">
        <div class="intro-add-complex text-center">
            <h2>Edit Complex Information</h2>
            <br>
        </div>

        <hr class="divider"><br>
            <form id="addComplexForm" action="../users/sportComplex.php" method="post" autocomplete="on">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><!--<i class="fa fa-info" aria-hidden="true"></i>--> Complex Name </span>
                                <input type="text" class="form-control" name="name" id="name"  placeholder="Enter the sports complex name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><!--<i class="glyphicon glyphicon-globe"></i>--> Location </span>
                                <input type="text" class="form-control" name="email" id="email"  placeholder="Enter the sports complex location"/>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><!--<i class="fa fa-at" aria-hidden="true"></i>--> Email </span>
                                <input type="text" class="form-control" name="username" id="username"  placeholder="Enter the sports complex email"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><!--<i class="fa fa-phone" aria-hidden="true"></i>--> Contact </span>
                                <input type="tel" class="form-control" name="tel" id="tel"  placeholder="Enter the sports complex contact"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary"><!--<i class="material-icons md-18">help</i>--> Description </span>
                                <textarea class="form-control" rows="2" id="comment" placeholder="Enter a brief description of the sports complex services"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><!--<i class="fa fa-clock-o" aria-hidden="true"></i>--> Opening Hours </span>
                                <input type="time" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><!--<i class="fa fa-clock-o" aria-hidden="true"></i>--> Closing Hours </span>
                                <input type="time" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary"> Open on Weekends </span>
                                <select class="form-control" title="">
                                    <option>Yes</option>
                                    <option>No</option>
                                    <option>Only Saturday</option>
                                    <option>Only Sunday</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><!--<i class="fa fa-credit-card" aria-hidden="true"></i>--> Paypal Account Nr </span>
                                <input type="tel" class="form-control" name="tel" id="tel"  placeholder="Enter the sports complex paypal account"/>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary gradient-yellow" value="Upload representative picture"/>
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
                        <br><br>
                        <div style="text-align: center;">
                            <input type="submit" class="btn btn-primary gradient-blue" value="Register Complex"/>
                            <input type="submit" class="btn btn-primary gradient-blue" value="Cancel"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

	
<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php }
}
