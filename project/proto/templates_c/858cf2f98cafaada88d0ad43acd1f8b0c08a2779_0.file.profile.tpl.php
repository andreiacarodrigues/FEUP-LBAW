<?php
/* Smarty version 3.1.30, created on 2017-04-18 12:12:36
  from "/opt/lbaw/lbaw1653/public_html/proto/templates/pages/profile.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58f5f4a4519915_31722324',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '858cf2f98cafaada88d0ad43acd1f8b0c08a2779' => 
    array (
      0 => '/opt/lbaw/lbaw1653/public_html/proto/templates/pages/profile.tpl',
      1 => 1492513951,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:common/userHeader.tpl' => 1,
    'file:common/footer.tpl' => 1,
  ),
),false)) {
function content_58f5f4a4519915_31722324 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:common/userHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="profile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
				<div class="row">
					<div class="col-md-offset-1 col-sm-6 col-md-2">
                        <!-- <img src="http://placehold.it/150" alt="" class="img-circle img-responsive" />-->
                        <img src="../../res/img/doge.jpeg" alt="" class="img-circle img-responsive" style="width:150px;height:150px;" />
                     </div>
                    <div class="col-sm-6 col-md-9">
                        <h4><i class="fa fa-user fa" aria-hidden="true"></i> <strong>Andreia Cristina de Almeida Rodrigues</strong></h4>
                        <p>
                            <i class="fa fa-users fa"></i> xCutePsycho <br />
                            <i class="fa fa-envelope fa"></i> andreiacarodrigues@gmail.com <br />
                            <i class="fa fa-phone"></i> 912345678 <br>
                            <i class="glyphicon glyphicon-globe"></i> Chamusca, Portugal
                        </p>
                     </div>
                     <div class="btn-group">
                         <!--  <button type="button" class="btn btn-primary gradient-yellow">Edit Profile <i class="glyphicon glyphicon-edit"></i></button>
                         <br><br>-->
                         <button type="button" class="btn btn-primary gradient-red">Set as Inactive <i class="glyphicon glyphicon-remove"></i></button>
                     </div>
                </div>
             </div>
         </div>
     </div>
	 
     <br><br>
     <div class="container">
        <hr class="divider"><br>
            <form id="editForm" action=" " method="post" autocomplete="on">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="name" id="name"  placeholder="Andreia Cristina de Almeida Rodrigues"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="email" id="email"  placeholder="andreiacarodrigues@gmail.com "/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="username" id="username"  placeholder="xCutePsycho"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <input type="tel" class="form-control" name="tel" id="tel"  placeholder="912345678"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="glyphicon glyphicon-globe"></i></span>
                                <input type="text" class="form-control" name="location" id="location"  placeholder="Chamusca, Portugal"/>
                            </div>
                        </div>
                        <div class="form-group">
                          <input type="submit" class="btn btn-primary gradient-yellow" value="Change representative picture"/>
                          <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
                        </div>
                        <br><br>
                        <div style="text-align: center;">
                            <input type="submit" class="btn btn-primary gradient-blue" value="Submit"/>
                            <input type="submit" class="btn btn-primary gradient-blue" value="Cancel"/>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <a href="#newPasswordForm" style="display:block;text-align:center;">Change Password</a>
        </div>
	</div>


       <!-- <div class="container">
            <hr class="divider">
            <br>

            <form id="newPasswordForm" action=" " method="post" autocomplete="on">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> <i class="fa fa-lock fa-lg"></i></span>
                                <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                            </div>
                        </div>

                       <div class="form-group">
                           <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                              <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                          </div>
                        </div>

                   <div style="text-align: center;">
                       <input type="submit" class="btn btn-primary gradient-blue" value="Change Password"/>
                       <input type="submit" class="btn btn-primary gradient-blue" value="Cancel"/>
                   </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
-->


<?php $_smarty_tpl->_subTemplateRender("file:common/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
