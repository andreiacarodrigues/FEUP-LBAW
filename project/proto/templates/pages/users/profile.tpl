{include file='common/userHeader.tpl'}

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


{include file='common/footer.tpl'}