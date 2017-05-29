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
        <button type="button" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#equipmentModal">
            Add New Equipment <i class="fa fa-plus-circle" aria-hidden="true"></i></button>

        <br><br><br><br>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead class="thead-default">
                <tr>
                    <th>Item</th>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Price/h(€)</th>
                    <th>Details</th>
                    <th>Sports</th>
                    <th>Unavailable</th>
                    <th>Available</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                {foreach $EQUIPMENT_INFORMATION as $INFORMATION}
                    <tr>
                        <td class="centered">
                            {assign var="filename" value="../../res/img/thumbs_small/equipment_{$INFORMATION.id}.jpg"}

                            {if file_exists($filename)}
                                <img class="img-responsive"
                                     src="{$BASE_URL}res/img/thumbs_small/equipment_{$INFORMATION.id}.jpg"
                                     style="width:100px" alt="">
                            {else}
                                <img class="img-responsive" src="http://placehold.it/200x200" style="width:100px"
                                     alt="">
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
                        <td>
                            <button type="button" class="btn btn-primary gradient-blue" data-toggle="modal"
                                    data-target="#editEquipmentModal"
                                    onclick="updateEditEquipmentInfo({$COMPLEX_ID}, {$INFORMATION.id}, '{$INFORMATION.name}', {$INFORMATION.quantity}, '{$INFORMATION.details}', {$INFORMATION.quantityUnavailable}, {$INFORMATION.price}, '{$INFORMATION.inactive}', '{$INFORMATION.sportsList}')">
                                Edit Equipment
                            </button>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        </div>
    </div>


    <div class="modal fade" id="equipmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEquipment2"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="myModalLabelEquipment2">
                        New Equipment
                    </h4>
                </div>
                <div class="modal-body">
                    <form id="equipmentForm" action="{$BASE_URL}actions/managers/addEquipment.php" method="post"
                          autocomplete="on" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="complexID" value="{$COMPLEX_ID}">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon primary">Name</span>
                                        <input type="text" class="form-control" title="Name" name="name">
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Stock</span>
                                        <input type="number" class="form-control" title="Quantity" name="quantity">
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Details</span>
                                        <textarea class="form-control" rows="5" id="comment" title="Details"
                                                  name="details"></textarea>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Price/h</span>
                                        <input class="form-control" type="number" name="price" title="Price" min="0"
                                               step="0.01"
                                               value="0">
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Sports</span>
                                        <select class="form-control" name="sports[]" title="Sports" multiple>
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
                                       Browse&hellip; <input type="file" title="Image" name="photo"
                                                             style="display: none;">
                                </span>
                                        </label>
                                        <input type="text" class="form-control" readonly title="Selected file name">
                                    </div>

                                    <br>
                                    <br>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary gradient-blue">Submit</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editEquipmentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabelEquipment"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title text-center" id="myModalLabelEquipment">
                        Edit Equipment <span id="equipmentName"></span>
                    </h4>
                </div>
                <div class="modal-body">
                    <form id="editEquipmentForm" action="{$BASE_URL}actions/managers/editEquipment.php" method="post"
                          autocomplete="on" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="complexID" value="{$complexID}"/>
                        <input type="hidden" name="equipmentID"/>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Name</span>
                                        <input class="form-control" type="text" title="Name" name="itemName"/>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Stock</span>
                                        <input class="form-control" type="number" name="quantity" title="Stock" min="0"
                                               step="1"/>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Price / hour</span>
                                        <input class="form-control" type="number" name="price" title="Price per hour"
                                               min="0" step="0.01"/>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Description</span>
                                        <textarea class="form-control" rows="5" title="Description"
                                                  name="details"></textarea>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Unavailable</span>
                                        <input class="form-control" type="number" title="Amount unavailable"
                                               name="quantityUnavailable" min="0"
                                               step="1">
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Availability</span>
                                        <select class="form-control" name="available" title="Equipment is available?">
                                            <option value="true">Available</option>
                                            <option value="false">Unavailable</option>
                                        </select>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon primary">Sports</span>
                                        <select id="sportsSelect" class="form-control " title="Sports" name="sports[]"
                                                multiple>
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
                                       Browse&hellip; <input type="file" name="photo" title="Equipment image"
                                                             style="display: none;">
                                </span>
                                        </label>
                                        <input type="text" class="form-control" readonly title="Selected filename">
                                    </div>

                                    <br>
                                    <br>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary gradient-blue">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="../../js/bootstrap-multiselect.css"/>
<script src="../../js/bootstrap-multiselect.js"></script>

<script>
    manageEquipmentPage($(document));
</script>

{include file='common/footer.tpl'}