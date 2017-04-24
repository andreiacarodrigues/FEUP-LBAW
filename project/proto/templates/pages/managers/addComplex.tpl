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
                                <input type="text" class="form-control" name="name"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidName"></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Location </span>
                                <input type="text" class="form-control" name="location"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidLocation"></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Municipality </span>
                                <select class="form-control"  name="municipality"  title="">
                                    <option value="" name="disabled" disabled selected></option>
                                    {html_options values=$municipalityIDs output=$municipalityNames}
                                </select>
                            </div>
                        </div>

                        <div class="innerErrorMessage">
                            <span id="invalidMunicipality"></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Email </span>
                                <input type="text" class="form-control" name="email"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidEmail"></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Contact </span>
                                <input type="text" class="form-control" name="contact"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidContact"></span>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary"> Description </span>
                                <textarea class="form-control" rows="2" name="description" placeholder="Describe what services your complex provides."></textarea>
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
                        <div class="innerErrorMessage">
                            <span id="invalidHours"></span> <!-- closing < que openning-->
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary"> Open on Weekends </span>
                                <select class="form-control"  name="openOnWeekends"  title="">
                                    <option value="true">Yes</option>
                                    <option value="false">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"> Paypal Account Nr </span>
                                <input type="text" class="form-control" name="paypal"/>
                            </div>
                        </div>
                        <div class="innerErrorMessage">
                            <span id="invalidPaypal"></span> <!-- closing < que openning-->
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


<script>
    $(function(){
        $('form').submit(function(){

            // Prevents from submiting

           var error = false;


           // Variables

           var name = $("input[name='name']").val();
           var location = $("input[name='location']").val();
           var email = $("input[name='email']").val();
           var contact = $("input[name='contact']").val();
           var municipality = $("select[name='municipality']").val();
           var openingHour = $("input[name='openingHour']").val();
           var closingHour = $("input[name='closingHour']").val();
           var paypal = $("input[name='paypal']").val();

           // Error Check

           if(name == "" || location == "" || email == "" || contact == "" || municipality == null || openingHour == "" || closingHour == "" || paypal == "") {
               $('#invalidName').text("");
               $('#invalidEmail').text("");
               $('#invalidLocation').text("");
               $('#invalidContact').text("");
               $('#invalidHours').text("");
               $('#invalidPaypal').text("");

               $('.errorMessage').text("Required field wasn't filled.");
                return false;
           }

            $('.errorMessage').text("");

           if(openingHour > closingHour) {
               error = true;
               $('#invalidHours').text("Invalid hours. Closing time must be after opening time.");
           }
           if(!is_name(name)) {
               error = true;
               $('#invalidName').text("Invalid name.");
           }

            if(!is_location(location)) {
               error = true;
               $('#invalidLocation').text("Invalid location.");
            }

            if(!is_email(email)){
                error = true;
                $('#invalidEmail').text("Invalid email. Should be in the form xxx@yyy.zzz.");
            }

            if(!is_contact(contact)){
                error = true;
                $('#invalidContact').text("Invalid phone number. It should be 9 digits in the form xxxxxxxxx or xxx-xxx-xxx.");
            }

            if(!is_email(paypal)){
                error = true;
                $('#invalidPaypal').text("Invalid paypal email. Should be in the form xxx@yyy.zzz.");
            }

            if(error)
                return false;

        });
    });

</script>