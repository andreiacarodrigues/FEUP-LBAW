{include file='common/userHeader.tpl'}

<div class="addComplex">
    <div class="container">
        <div class="intro-add-complex text-center">
            <h2>Add Complex</h2>
            <br>
        </div>

        <hr class="divider"><br>
            <form id="addComplexForm" action="{$BASE_URL}actions/managers/addComplex.php" method="post" autocomplete="on">
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
                            {foreach $ERROR_MESSAGES as $error}
                                <div class="error">{$error}</div>
                            {/foreach}
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


{include file='common/footer.tpl'}