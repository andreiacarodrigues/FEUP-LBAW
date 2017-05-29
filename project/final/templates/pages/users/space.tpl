{include file='common/userHeader.tpl'}

<div class="sportComplex">
<div class="container">
    <div class="row">
        {if $SUCCESS_MESSAGES != ""}
            {foreach $SUCCESS_MESSAGES as $message}
                <div class="alert alert-info alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{$message}</strong>
                </div>
            {/foreach}
        {/if}
        {if $ERROR_MESSAGES != ""}
            {foreach $ERROR_MESSAGES as $message}
                <div class="alert alert-danger alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{$message}</strong>
                </div>
            {/foreach}
        {/if}
    </div>
    <div class="row">
        <div class="col-md-10">
            <h1><span id="infoName">Name</span></h1>
        </div>
        <div class="col-md-2">
            <a href="#" class="backToComplex btn btn-primary gradient-yellow">Back To Complex</a>
        </div>
    </div>
    <div class="row">
        <hr>
    </div>

    <div class="row">
        <div class="col-md-4" id="mainImage">
            <br>
            {assign var="filename" value="../../res/img/originals/space_{$spaceID}.jpg"}

            {if file_exists($filename)}
                <img class="img-responsive" src="{$BASE_URL}res/img/originals/space_{$spaceID}.jpg" alt="Image of the space">
            {else}
                <img class="img-responsive" src="http://placehold.it/750x500" alt="No image">
            {/if}
        </div>
        <div class="col-md-5">
            <h2>Informations:</h2>
            <ul class="list-group">
                <li class="list-group-item"><i class="glyphicon glyphicon-globe"></i> Location: <span id="infoLocation"></span> </li>
                <li class="list-group-item"> <i class="fa fa-envelope fa"></i> Email: <span id="infoEmail"></span> </li>
                <li class="list-group-item"> <i class="fa fa-phone"></i> Contact: <span id="infoContact"></span> </li>
                <li class="list-group-item"><i class="fa fa-cloud"></i> Coverage: <span id="infoCoverage"></span></li>
                <li class="list-group-item"><i class="fa fa-tree"></i> Surface: <span id="infoSurface"></span></li>
                <li class="list-group-item"> <i class="fa fa-eur"></i> Price: <span id="infoPrice"></span> <span> per hour </span></li>
                <li class="list-group-item"> <i class="fa fa-futbol-o"></i> Sports: <span id="infoSports"></span></li>
                <li class="list-group-item"> <i class="fa fa-clock-o"></i> Opening - Closing Hours: <span id="infoHours"></span> </li>
                <li class="list-group-item"> <i class="fa fa-calendar"></i> Open on Weekends? <span id="infoOpenOnWeekends"></span> </li>
            </ul>
        </div>

        <div class="col-md-3">
            <div class="row" id="spaceRating">
                <div class="ratingNum" id="rating">
                </div>
            </div>
        </div>
</div>
<br>
    <div class="container">
        <hr>
        {if $userID}
        <div class="spaceInfo">
            <span> Insert here your rental information: </span>
            <button type="button" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#guidanceModal"> <i class="fa fa-question-circle" aria-hidden="true"></i> </button>
        </div>
        <br>
        <form id="rentForm" action='{$BASE_URL}actions/managers/makeRental.php' method="post" autocomplete="on">
            <input name="spaceID" type="hidden" value="{$spaceID}">
            <input name="userID" type="hidden" value="{$userID}">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group checkInput">
                            <span class="input-group-addon primary">Date</span>
                            <input name="date" type="date" title="Date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group checkInput">
                            <span class="input-group-addon primary">Starting Time</span>
                            <input name="startingTime" title="Starting time" type="time" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group checkInput">
                            <span class="input-group-addon primary">Duration</span>
                            <input name="duration" title="Duration" type="time" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div id="rentalInfo">
            </div>
            <div id='paypal-button-container' style="visibility: hidden"></div>
        </form>
        {else}
            <span> To make a rental, please login with your username and password here:  <a href="{$BASE_URL}pages/authentication/login.php" style="color:black">Login Page</a> </span>
        {/if}

    </div>
</div>
    </div>



<!-- Modal -->
<div class="modal fade" id="guidanceModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelSpace" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h3 class="modal-title text-center" id="myModalLabelSpace">
                   How to make a rental?
                 </h3>
            </div>

            <!-- Modal Body -->
            <div class="modal-body text-justify">
                <p>Insert in the boxes below the date, start time and duration you wish you rent this space. <br> <br>
                After the insertion you will be presented with a table with the equipment you can rent at the selected time and date.<br> <br>
                If the equipment you are looking for isn't there, it is unavailable at that particular time.<br> <br>
                At the bottom, the total cost of your rental will be updated.<br> <br>
                    When you finish your rental just click on the "Rent Items" button so you can be redirected to the paypal page and proceed with the payment.</p>
            </div>
        </div>
    </div>
</div>


<script>
    $(function(){
        spacePage('{$BASE_URL}', {$spaceID});

        paypal.Button.render({

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'AbFTiI89tBcK3Tx0JP3l5IZn7ZPT2x9bnbRtqNmm_UImvOAZuQVsN9LhA-r4Fqkl0JGQ48aSD9Cvr-f5'
            },

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                var total = parseFloat($('#totalRentalCost').text());

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    transactions: [
                        {
                            amount: { total: total, currency: 'EUR' }
                        }
                    ]
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
                    $('#rentForm').submit();
                });
            }

        }, '#paypal-button-container');

    });
</script>

{include file='common/footer.tpl'}



