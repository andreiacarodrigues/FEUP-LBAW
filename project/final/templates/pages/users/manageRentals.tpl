{include file='common/userHeader.tpl'}

<div class="userRentals">
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

        {if count($RENTALS) == 0}
            <div class="emptyRentals">
                <h4> You haven't made any rentals so far. <br><br> You can make a rental by choosing a space from your
                    selected
                    sports complex, type in the date, time of start and duration you want your rental to be and select
                    the equipment you'll need. </h4>
            </div>
        {else}

            {$VALUE = 1 + ($PAGE * 10)}

            {foreach $RENTALS as $RENTAL}
                {strip}
                    {if $VALUE <= (count($RENTALS) +  ($PAGE * 10))}
                        <div class="rental well well-sm">
                            <div class="row">
                                <div class="container">
                                    <div class="col-md-8">
                                        <ul class="list-unstyled">
                                            <h4 class="mobileFixText">Rental #<span>{$VALUE}</span></h4>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Date:
                                                    <span> {$RENTAL.rentalDate|date_format:"%e / %b / %Y"} </span></label>
                                            </li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Sport
                                                    Complex:
                                                    <a href="{$BASE_URL}pages/users/sportComplex.php?complexID={$RENTAL.complexID}"> {$RENTAL.complexName} </a></label>
                                            </li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Space: <a
                                                            href="{$BASE_URL}pages/users/space.php?spaceID={$RENTAL.spaceID}"> {$RENTAL.spaceName} </a></label>
                                            </li>
                                            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Time of
                                                    Start: <span> {$RENTAL.rentalStartTime} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Duration:
                                                    <span> {$RENTAL.rentalDuration} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Equipment:
                                                    <span>  {$RENTAL.equipment} </span></label></li>
                                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> State:
                                                    <span>
                                                    {if $RENTAL.rentalState == "RESERVED"}
                                                        Reserved
                                                    {/if}
                                                        {if $RENTAL.rentalState == "RESERVEDBYMANAGER"}
                                                            Reserved By Manager
                                                        {/if}
                                                        {if $RENTAL.rentalState == "CANCELEDBYUSER"}
                                                            Canceled By User
                                                        {/if}
                                                        {if $RENTAL.rentalState == "CANCELEDBYMANAGER"}
                                                            Canceled By Manager
                                                        {/if}
                                                        {if $RENTAL.rentalState == "WAITINGUSERFEEDBACK"}
                                                            Waiting For User Feedback
                                                        {/if}
                                                        {if $RENTAL.rentalState == "SUSPENDEDBYADMIN"}
                                                            Suspended By An Administrator
                                                        {/if}
                                                        {if $RENTAL.rentalState == "CONCLUDED"}
                                                            Concluded
                                                        {/if}
                                                </span></label></li>
                                        </ul>
                                    </div>
                                    {if $RENTAL.rentalState == "WAITINGUSERFEEDBACK"}
                                        <div class="col-md-4 mobileFixButtons">
                                            {if $RENTAL.rentalRating != NULL}
                                                <div class="stars">
                                                    {if $RENTAL.rentalRating == 5}
                                                        <input class="star star-5" id="star{$RENTAL.rentalID}-5"
                                                               type="radio" title="5 stars"
                                                               onclick="submitRating('{$BASE_URL}',{$RENTAL.rentalID}, 5)"
                                                               name="star" checked/>
                                                    {else}
                                                        <input class="star star-5" id="star{$RENTAL.rentalID}-5"
                                                               type="radio" title="5 stars"
                                                               onclick="submitRating('{$BASE_URL}',{$RENTAL.rentalID}, 5)"
                                                               name="star"/>
                                                    {/if}
                                                    <label class="star star-5" for="star{$RENTAL.rentalID}-5"></label>
                                                    {if $RENTAL.rentalRating == 4}
                                                        <input class="star star-4" id="star{$RENTAL.rentalID}-4"
                                                               type="radio" title="4 stars"
                                                               onclick="submitRating('{$BASE_URL}', {$RENTAL.rentalID}, 4)"
                                                               name="star" checked/>
                                                    {else}
                                                        <input class="star star-4" id="star{$RENTAL.rentalID}-4"
                                                               type="radio" title="4 stars"
                                                               onclick="submitRating('{$BASE_URL}', {$RENTAL.rentalID}, 4)"
                                                               name="star"/>
                                                    {/if}
                                                    <label class="star star-4" for="star{$RENTAL.rentalID}-4"></label>
                                                    {if $RENTAL.rentalRating == 3}
                                                        <input class="star star-3" id="star{$RENTAL.rentalID}-3"
                                                               type="radio" title="3 stars"
                                                               onclick="submitRating('{$BASE_URL}', {$RENTAL.rentalID}, 3)"
                                                               name="star" checked/>
                                                    {else}
                                                        <input class="star star-3" id="star{$RENTAL.rentalID}-3"
                                                               type="radio" title="3 stars"
                                                               onclick="submitRating('{$BASE_URL}', {$RENTAL.rentalID}, 3)"
                                                               name="star"/>
                                                    {/if}
                                                    <label class="star star-3" for="star{$RENTAL.rentalID}-3"></label>
                                                    {if $RENTAL.rentalRating == 2}
                                                        <input class="star star-2" id="star{$RENTAL.rentalID}-2"
                                                               type="radio" title="2 stars"
                                                               onclick="submitRating('{$BASE_URL}', {$RENTAL.rentalID}, 2)"
                                                               name="star" checked/>
                                                    {else}
                                                        <input class="star star-2" id="star{$RENTAL.rentalID}-2"
                                                               type="radio" title="2 stars"
                                                               onclick="submitRating('{$BASE_URL}', {$RENTAL.rentalID}, 2)"
                                                               name="star"/>
                                                    {/if}
                                                    <label class="star star-2" for="star{$RENTAL.rentalID}-2"></label>
                                                    {if $RENTAL.rentalRating == 1}
                                                        <input class="star star-1" id="star{$RENTAL.rentalID}-1"
                                                               type="radio" title="1 star"
                                                               onclick="submitRating('{$BASE_URL}', {$RENTAL.rentalID}, 1)"
                                                               name="star" checked/>
                                                    {else}
                                                        <input class="star star-1" id="star{$RENTAL.rentalID}-1"
                                                               type="radio" title="1 star"
                                                               onclick="submitRating('{$BASE_URL}', {$RENTAL.rentalID}, 1)"
                                                               name="star"/>
                                                    {/if}
                                                    <label class="star star-1" for="star{$RENTAL.rentalID}-1"></label>
                                                </div>
                                            {else}
                                                <div class="stars">
                                                    <input class="star star-5" id="star{$RENTAL.rentalID}-5"
                                                           type="radio" title="5 stars"
                                                           onclick="submitRating('{$BASE_URL}',{$RENTAL.rentalID}, 5)"
                                                           name="star"/>
                                                    <label class="star star-5" for="star{$RENTAL.rentalID}-5"></label>
                                                    <input class="star star-4" id="star{$RENTAL.rentalID}-4"
                                                           type="radio" title="4 stars"
                                                           onclick="submitRating('{$BASE_URL}', {$RENTAL.rentalID}, 4)"
                                                           name="star"/>
                                                    <label class="star star-4" for="star{$RENTAL.rentalID}-4"></label>
                                                    <input class="star star-3" id="star{$RENTAL.rentalID}-3"
                                                           type="radio" title="3 stars"
                                                           onclick="submitRating('{$BASE_URL}', {$RENTAL.rentalID}, 3)"
                                                           name="star"/>
                                                    <label class="star star-3" for="star{$RENTAL.rentalID}-3"></label>
                                                    <input class="star star-2" id="star{$RENTAL.rentalID}-2"
                                                           type="radio" title="2 stars"
                                                           onclick="submitRating('{$BASE_URL}', {$RENTAL.rentalID}, 2)"
                                                           name="star"/>
                                                    <label class="star star-2" for="star{$RENTAL.rentalID}-2"></label>
                                                    <input class="star star-1" id="star{$RENTAL.rentalID}-1"
                                                           type="radio" title="1 star"
                                                           onclick="submitRating('{$BASE_URL}', {$RENTAL.rentalID}, 1)"
                                                           name="star"/>
                                                    <label class="star star-1" for="star{$RENTAL.rentalID}-1"></label>
                                                </div>
                                            {/if}

                                            <br>
                                            <button type="button" class="btn btn-primary gradient-yellow"
                                                    data-toggle="modal" onclick="setIssueRentalID({$RENTAL.rentalID})"
                                                    data-target="#reportModal"><i class="fa fa-ban"> </i> Report Issue
                                            </button>
                                            <br><br>
                                            <form class="equipmentForm"
                                                  action="{$BASE_URL}actions/admin/changeStateRental.php" method="post"
                                                  autocomplete="on">
                                                <input type="hidden" value="{$RENTAL.rentalID}" name="rentalID"/>
                                                <input type="hidden" value="conclude" name="type"/>
                                                <input type="submit" class="btn btn-primary gradient-blue" value="Conclude"/>
                                            </form>
                                        </div>
                                    {else}
                                        {if $RENTAL.rentalState == "CONCLUDED" || $RENTAL.rentalState == "CANCELEDBYUSER" || $RENTAL.rentalState == "SUSPENDEDBYADMIN" || $RENTAL.rentalState == "CANCELEDBYMANAGER"}
                                            <div class="col-md-4 mobileFixButtons">
                                            </div>
                                        {else}
                                            <div class="col-md-4 mobileFixButtons">
                                                <form action="{$BASE_URL}actions/users/cancelRental.php" method="get"
                                                      class="form-horizontal">
                                                    <input type="hidden" name="rentalID" value="{$RENTAL.rentalID}">
                                                    <button type="submit" class="btn btn-primary gradient-red"><i
                                                                class="glyphicon glyphicon-remove"></i> Cancel
                                                    </button>
                                                </form>
                                            </div>
                                        {/if}
                                    {/if}
                                </div>
                            </div>
                        </div>
                    {/if}
                    {$VALUE = $VALUE + 1}
                {/strip}
            {/foreach}
        {/if}
        <br><br>
        {if count($RENTALS) != 0}
            {$COUNT = 0}
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <ul class="pagination">
                        {while $COUNT  < count($PAGINATION)}
                            {$VALUE = $PAGINATION[$COUNT]}
                            {if $VALUE == ($PAGE + 1)}
                                <li class="active">
                                    <a href="{$BASE_URL}pages/users/manageRentals.php?page={$VALUE - 1}">{$VALUE}</a>
                                </li>
                            {else}
                                <li>
                                    <a href="{$BASE_URL}pages/users/manageRentals.php?page={$VALUE - 1}">{$VALUE}</a>
                                </li>
                            {/if}
                            {$COUNT = $COUNT + 1}

                        {/while}

                    </ul>
                </div>
            </div>
        {/if}

        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelRentals"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabelRentals">
                            Report
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form id="reportForm" action="{$BASE_URL}actions/users/newIssue.php" method="post"
                              autocomplete="on" class="form-horizontal">
                            <input type="hidden" name="id">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Subject</span>
                                            <input type="text" name="subject" title="Issue subject"
                                                   class="form-control">
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon primary">To</span>
                                            <select class="form-control" name="to" title="Receivers">
                                                <option value="" disabled selected>Please select a receiver</option>
                                                <option value="forManager">Sport's Complex Manager</option>
                                                <option value="forAdmin">Website Administrator</option>
                                                <option value="forBoth">Both</option>
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Category</span>
                                            <select class="form-control" name="category" title="Issue category">
                                                <option value="" disabled selected>Please select a category</option>
                                                <option value="COMPLEXISSUES">Complex Issues</option>
                                                <option value="REFUNDS">Refund</option>
                                                <option value="LASTMINUTECANCELLATION">Last Minute Cancelation</option>
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Description</span>
                                            <textarea class="form-control" rows="5" title="Description"
                                                      name="description"></textarea>
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

{include file='common/footer.tpl'}