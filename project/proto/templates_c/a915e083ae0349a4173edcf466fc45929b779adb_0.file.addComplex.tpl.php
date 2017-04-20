<?php
/* Smarty version 3.1.30, created on 2017-04-20 10:28:35
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/addComplex.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f87f430e1aa0_55436535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a915e083ae0349a4173edcf466fc45929b779adb' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/addComplex.tpl',
      1 => 1492676920,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/userHeader.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_58f87f430e1aa0_55436535 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/userHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="addComplex">
    <div class="container">
        <div class="intro-add-complex text-center">
            <h2>Add Complex</h2>
            <br>
        </div>

        <hr class="divider"><br>
            <form id="addComplexForm" action="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
actions/managers/addComplex.php" method="post" autocomplete="on">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Complex Name </span>
                                <input type="text" class="form-control" name="name"  placeholder="Enter the sports complex name"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Location </span>
                                <input type="text" class="form-control" name="location"   placeholder="Enter the sports complex location"/>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Email </span>
                                <input type="email" class="form-control" name="email"  placeholder="Enter the sports complex email"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Contact </span>
                                <input type="tel" class="form-control" name="contact"  placeholder="Enter the sports complex contact"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary"> Description </span>
                                <textarea class="form-control" rows="2" name="description" placeholder="Enter a brief description of the sports complex services"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Opening Hours </span>
                                <input type="time" name="openingHour" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Closing Hours </span>
                                <input type="time" name="closingHour" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary"> Open on Weekends </span>
                                <select class="form-control"  name="openOnWeekends"  title="">
                                    <option>Yes</option>
                                    <option>No</option>
                                    <option>Only Saturday</option>
                                    <option>Only Sunday</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Paypal Account Nr </span>
                                <input type="tel" class="form-control" name="paypal" placeholder="Enter the sports complex paypal account"/>
                            </div>
                        </div>



                        <input type="submit" class="btn btn-primary gradient-yellow" value="Upload representative picture"/>
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
                        <br><br>
                        <div class="row errorMessage text-center">
                        <span>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['ERROR_MESSAGES']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
?>
                                <div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                        </span>
                        </div>
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
}
}
