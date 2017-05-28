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
        <button type="button" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#equipmentModal">Add New Equipment <i class="fa fa-plus-circle" aria-hidden="true"></i></button>

        <br><br><br><br>
            <div class="table-responsive">
                <table class="table table-striped table-sm" >
                    <thead class="thead-default">
                    <tr>
                        <th><h4>Item</h4></th>
                        <th><h4>Name</h4></th>
                        <th><h4>Stock</h4></th>
                        <th><h4>Price/h(€)</h4></th>
                        <th><h4>Details</h4></th>
                        <th><h4>Sports</h4></th>
                        <th><h4>Unavailable</h4></th>
                        <th><h4>Available</h4></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    {foreach $EQUIPMENT_INFORMATION as $INFORMATION}
                        <tr>
                            <td class="centered">
                                {assign var="filename" value="../../res/img/thumbs_small/equipment_{$INFORMATION.id}.jpg"}

                                {if file_exists($filename)}
                                    <img class="img-responsive" src="{$BASE_URL}res/img/thumbs_small/equipment_{$INFORMATION.id}.jpg" style="width:100px" alt="">
                                {else}
                                    <img class="img-responsive" src="http://placehold.it/200x200" style="width:100px" alt="">
                                {/if}
                            </td>
                            <td>{$INFORMATION.name}</td>
                            <td>{$INFORMATION.quantity}</td>
                            <td>{$INFORMATION.price} </td>
                            <td>{$INFORMATION.details}</td>
                            <td>
                                {$COUNT = 0}
                                            {foreach $SPORTS as $SPORT}
                                                {foreach $INFORMATION.sports as $EQUIPMENT_SPORT}
                                                    {if $EQUIPMENT_SPORT eq $SPORT.sportID}
                                                        {if $COUNT == 0}
                                                            {$SPORT.sportName}
                                                            {$COUNT = 1}
                                                        {else}
                                                            , {$SPORT.sportName}
                                                        {/if}
                                                    {/if}
                                                {/foreach}
                                            {/foreach}
                            </td>
                            <td>{$INFORMATION.quantityUnavailable} </td>
                            <td>{if $INFORMATION.inactive == "true"}
                                    No
                                {else}
                                    Yes
                                {/if}
                            </td>
                            <td> <button type="button" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#editEquipmentModal" onclick="updateEditEquipmentInfo({$COMPLEX_ID}, {$INFORMATION.id}, '{$INFORMATION.name}', {$INFORMATION.quantity}, '{$INFORMATION.details}', {$INFORMATION.quantityUnavailable}, {$INFORMATION.price}, '{$INFORMATION.inactive}', '{$INFORMATION.sportsList}')"> Edit Equipment </button></td>
                        </tr>
                    {/foreach}
                    </tbody>
                </table>
            </div>
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
                <form id="equipmentForm" action="{$BASE_URL}actions/managers/addEquipment.php" method="post" autocomplete="on" enctype="multipart/form-data" class="form-horizontal" role="form">
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
                                    <span class="input-group-addon"> Select representative picture </span>
                                </div>


                                <div class="input-group">
                                    <label class="input-group-btn">
                                <span class="btn btn-primary gradient-blue">
                                       Browse&hellip; <input type="file" name="photo" style="display: none;">
                                </span>
                                    </label>
                                    <input type="text" class="form-control" readonly>
                                </div>

                                <br>
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



    <!-- Modal -->
    <div class="modal fade" id="editEquipmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="myModalLabel">
                        Edit Equipment <span id="equipmentName"></span>
                    </h4>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <form id="editEquipmentForm" action="{$BASE_URL}actions/managers/editEquipment.php" method="post" autocomplete="on" class="form-horizontal" role="form"  enctype="multipart/form-data">
                        <input type="hidden" name="complexID" value="{$complexID}"/>
                        <input type="hidden" name="equipmentID"/>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Name</span>
                                        <input class="form-control" type="text" name="itemName"/>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Stock</span>
                                        <input class="form-control" type="number" name="quantity" min="0" step="1"/>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Price / hour</span>
                                        <input class="form-control" type="number" name="price" min="0" step="0.01"/>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Description</span>
                                        <textarea class="form-control" rows="5" name="details"></textarea>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Unavailable</span>
                                        <input class="form-control" type="number" name="quantityUnavailable" min="0" step="1">
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Availability</span>
                                        <select class="form-control" name="available" title="">
                                            <option value="true">Available</option>
                                            <option value="false">Unavailable</option>
                                        </select>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Sports</span>
                                        <select id="sportsSelect" class="form-control " name="sports[]" multiple>
                                            {foreach $SPORTS as $SPORT}
                                                <option value="{$SPORT.sportID}">{$SPORT.sportName}</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <span>Hold CTRL key and click on the sports you wish to be added to your space.</span>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon"> Select representative picture </span>
                                    </div>


                                    <div class="input-group">
                                        <label class="input-group-btn">
                                <span class="btn btn-primary gradient-blue">
                                       Browse&hellip; <input type="file" name="photo" style="display: none;">
                                </span>
                                        </label>
                                        <input type="text" class="form-control" readonly>
                                    </div>

                                    <br>
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
</div>
</div>

	
{include file='common/footer.tpl'}


<link rel="stylesheet" href="../../js/bootstrap-multiselect.css" />
<script src="../../js/bootstrap-multiselect.js"></script>

<script>
    manageEquipmentPage($(document));
    function updateEditEquipmentInfo(complexID, eqID,eqName, eqQuantity, eqDetails, eqQuantityUnavailable, eqPrice, eqInactive, eqSports){
        $('#editEquipmentForm input[name="complexID"]').val(complexID);

        $('#editEquipmentForm input[name="equipmentID"]').val(eqID);

        $('#editEquipmentForm input[name="itemName"]').val(eqName);

        $('#editEquipmentForm input[name="quantity"]').val(eqQuantity);

        $('#editEquipmentForm input[name="price"]').val(eqPrice);

        $('#editEquipmentForm textarea[name="details"]').text(eqDetails);

        $('#editEquipmentForm input[name="quantityUnavailable"]').val(eqQuantityUnavailable);

        console.log(eqInactive);
        if(eqInactive == false)
            $('#editEquipmentForm select[name="available"]').val("true").trigger('chosen:updated');
        else
            $('#editEquipmentForm select[name="available"]').val("false").trigger('chosen:updated');


        $("#sportsSelect").val([]); // clean the previous selected options


        var partsOfStr = eqSports.split(', ');
        var values = [];
        for(var i = 0 ; i < partsOfStr.length; i++) {
            values.push($('#sportsSelect option').filter(function () { return $(this).val() == partsOfStr[i]; }).val());
        }

        $("#sportsSelect").val(values); // new options
    }
</script>