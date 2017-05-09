<style>
    DIV.table
    {
        display:table;

    }
    FORM.tr, DIV.tr
    {

        display:table-row;
    }
    SPAN.td
    {

        display:table-cell;
    }

    DIV.thead
    {
        display: table-header-group;
        background-color: rgba(99, 99, 99, 0.13);
    }

    DIV.tbody
    {
        display: table-row-group;

        background-color: rgba(99, 99, 99, 0.02);
    }
    DIV.tbody .td{
        border-top: solid;
        border-top-width:thin;
        border-color: #dedede;
        padding: 10px;
    }

</style>


{include file='common/userHeader.tpl'}

<div class="manageEquipment">
    <div class="container">
        <div class="row errorMessage">
                        <span>
                            {foreach $ERROR_MESSAGES as $error}
                                <div class="error">{$error}</div>
                            {/foreach}
                        </span>
        </div>
        <button type="button" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#equipmentModal">Add New Equipment <i class="fa fa-plus-circle" aria-hidden="true"></i></button>

        <br><br><br><br>

        <div class=" table-responsive ">
        <div class="table text-center">
            <div class="thead thead-default">
                <span class="td"><h4>Item</h4></span>
                <span class="td"><h4>Name</h4></span>
                <span class="td"><h4>Stock</h4></span>
                <span class="td"><h4>Price/h(€)</h4></span>
                <span class="td"><h4>Details</h4></span>
                <span class="td"><h4>Sports</h4></span>
                <span class="td"><h4>Unavailable</h4></span>
                <span class="td"><h4>Available</h4></span>
                <span class="td"><h4>  </h4></span>
            </div>
            <div class="tbody">

              {foreach $EQUIPMENT_INFORMATION as $INFORMATION}

            <form class="tr equipmentForm" action="../users/home.php" method="post" autocomplete="on">
                <span class="td">
                    <img class="img-responsive" src="http://placehold.it/200x200" style="width:100px" alt=""><br>
                    <input type="submit" class="btn btn-primary gradient-yellow" value="Change picture"/>
                </span>
                <span class="td">
                    <div class="form-group">
                        <div class="input-group">
                            <input class="form-control" type="text" name="itemName" value="{$INFORMATION.name}">
                        </div>
                    </div>
                </span>
                <span class="td">
                     <div class="form-group">
                         <div class="input-group">
                             <input class="form-control" type="number" name="quantity" min="0" step="1" value="{$INFORMATION.quantity}">
                         </div>
                     </div>
                </span>
                <span class="td">
                     <div class="form-group">
                              <div class="input-group">
                                  <input class="form-control" type="number" name="price" min="0" step="0.01" value="{$INFORMATION.price}">
                              </div>
                          </div>
                </span>
                <span class="td">
                     <div class="form-group">
                              <div class="input-group">
                                  <textarea class="form-control" rows="5" name="comment">{$INFORMATION.details}</textarea>
                              </div>
                          </div>
                </span>
                <span class="td">
                    <div class="form-group ">
                              <div class="input-group dropdownSports">
                                  <select class="form-control " name="sports[]" multiple>
                                      {foreach $SPORTS as $SPORT}
                                          <option value="{$SPORT.sportID}"
                                                  {foreach $INFORMATION.sports as $EQUIPMENT_SPORT}
                                                      {if $EQUIPMENT_SPORT eq $SPORT.sportID}
                                                          selected
                                                      {/if}
                                                  {/foreach}
                                          >{$SPORT.sportName}</option>
                                      {/foreach}
                                  </select>
                              </div>
                            </div>

                </span>
                <span class="td">
                       <div class="form-group">
                              <div class="input-group">
                                  <input class="form-control" type="number" name="points" min="0" step="1" value="{$INFORMATION.quantityUnavailable}">
                              </div>
                          </div>
                </span>
                <span class="td">
                      <div class="form-group">
                              <div class="input-group">
                                  <select class="form-control" name="available">
                                      <option value="true">Yes</option>
                                      <option value="false">No</option>
                                  </select>
                              </div>
                          </div>
                </span>
                <span class="td">

                       <input type="submit" class="saveEquipmentBtn subBtn btn btn-primary gradient-blue" value="Save"/>

                </span>
            </form>



              {/foreach}
            </div>

        </div></div>

            </div>



    <!-- /.row -->




<!------------------------>

<!-- Modal -->
<div class="modal fade" id="equipmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabel">
                    New Equipment
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="equipmentForm" action="{$BASE_URL}actions/managers/addEquipment.php" method="post" autocomplete="on" class="form-horizontal" role="form">
                    <input type="hidden" name="complexID" value="{$COMPLEX_ID}">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon primary">Name</span>
                                    <input type="text" class="form-control" name="name">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon primary">Stock</span>
                                    <input type="number" class="form-control" name="quantity">
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon primary">Details</span>
                                    <textarea class="form-control" rows="5" id="comment" name="details"></textarea>
                                </div>


                                    <div class="input-group">
                                        <span class="input-group-addon primary">Price/h</span>
                                        <input class="form-control" type="number" name="price" min="0" step="0.01" value="0">
                                    </div>



                                    <div class="input-group">
                                        <span class="input-group-addon primary">Sports</span>
                                        <select class="form-control" name="sports[]" multiple>
                                            {foreach $SPORTS as $SPORT}
                                                <option value="{$SPORT.sportID}">{$SPORT.sportName}</option>
                                            {/foreach}
                                        </select>
                                    </div>



                                <div class="input-group">
                                    <input type="submit" class="btn btn-primary gradient-yellow" value="Upload representative picture"/>
                                    <img class="img-responsive" src="http://placehold.it/400x400" style="width:200px" alt=""><br>
                                </div>
                            </div>
                            <br>
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

	
{include file='common/footer.tpl'}



<link rel="stylesheet" href="../../js/bootstrap-multiselect.css" />
<script src="../../js/bootstrap-multiselect.js"></script>

<script>
    $(document).ready(function() {
        $('.modal-body #equipmentForm')
            .find('[name="sports[]"]')
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
            var $body   = $('body'),
                $iframe = $body.data('iframe.fv');
            if ($iframe) {
                // Adjust the height of iframe when showing the picker
                $iframe.height($body.get(0).scrollHeight);
            }
        }
        $('.equipmentForm')
            .find('[name="sports[]"]')
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
            var $body   = $('body'),
                $iframe = $body.data('iframe.fv');
            if ($iframe) {
                // Adjust the height of iframe when showing the picker
                $iframe.height($body.get(0).scrollHeight);
            }
        }
    });
</script>