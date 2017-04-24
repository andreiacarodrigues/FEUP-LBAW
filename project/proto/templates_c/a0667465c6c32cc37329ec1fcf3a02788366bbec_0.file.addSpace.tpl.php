<?php
/* Smarty version 3.1.30, created on 2017-04-24 18:40:51
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/addSpace.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58fe38a33f9080_92222715',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a0667465c6c32cc37329ec1fcf3a02788366bbec' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/managers/addSpace.tpl',
      1 => 1493055402,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/userHeader.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_58fe38a33f9080_92222715 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/userHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div class="addSpace">
    <div class="container">
        <div class="intro-add-complex text-center">
            <h2>Add Space to: Complex<span> 1 </span></h2>
            <br>
        </div>
        <hr class="divider"><br>
            <form id="addSpaceForm" action="../users/sportComplex.php" method="post" autocomplete="on">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Name</span>
                                <input type="text" class="form-control" name="name" id="name"  placeholder=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Surface</span>
                                <select class="form-control" title="">
                                    <option value="" disabled selected></option>
                                    <option>Artificial Grass</option>
                                    <option>Carpet</option>
                                    <option>Asphalt</option>
                                    <option>Acrylic</option>
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
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Dimensions</span>
                                <select class="form-control" title="">
                                    <option value="" disabled selected></option>
                                    <option >Small</option>
                                    <option>Normal</option>
                                    <option>Big</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Price / hour</span>
                                <input class="form-control" type="number" name="points" min="0" max="20" step="1" value="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Sports</span>
                                <select class="form-control" name="sports" multiple>
                                    <option value="football">Football</option>
                                    <option value="basketball">Basketball</option>
                                    <option value="tenis">Tenis</option>
                                </select>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary gradient-yellow" value="Upload representative picture"/>
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
                        <br><br>
                        <div style="text-align: center;">
                            <input type="submit" class="btn btn-primary gradient-blue" value="Register Space"/>
                            <input type="submit" class="btn btn-primary gradient-blue" value="Cancel"/>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
	
<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/bootstrap-multiselect.css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['BASE_URL']->value;?>
js/bootstrap-multiselect.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $(document).ready(function() {
        $('#addSpaceForm')
            .find('[name="sports"]')
            .multiselect({
                includeSelectAllOption: true,
                onChange: function(element, checked) {
                    adjustByScrollHeight();
                },
                onDropdownShown: function(e) {
                    adjustByScrollHeight();
                },
                onDropdownHidden: function(e) {
                    adjustByHeight();
                }
            })
            .end();

        function adjustByHeight() {
            var $body   = $('body'),
                $iframe = $body.data('iframe.fv');
            if ($iframe) {
                // Adjust the height of iframe when hiding the picker
                $iframe.height($body.height());
            }
        }

        function adjustByScrollHeight() {
            var $body  = $('body'),
                $iframe = $body.data('iframe.fv');
            if ($iframe) {
                // Adjust the height of iframe when showing the picker
                $iframe.height($body.get(0).scrollHeight);
            }
        }
    });
<?php echo '</script'; ?>
><?php }
}
