{include file='common/userHeader.tpl'}

<div class="manageComplexes">
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
        <a href="../managers/addComplex.php" class="addComplexBtn btn btn-primary gradient-red">Add Complex <i class="fa fa-plus-circle" aria-hidden="true"></i></a>
        <hr>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="sportComplex.php">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                        <div class="caption text-center">
                            <h5>Complex 1</h5>
                            <div class="row">
                                <div class="col-6 btn-group-vertical">
                                    <a href="sportComplex.php" class="btn btn-primary gradient-blue">View Information  </a>
                                    <a href="../managers/editComplex.php" class="btn btn-primary gradient-blue">Edit Information  </a>
                                    <a href="../managers/manageRentalsManager.php" class="btn btn-primary gradient-blue">Manage Rentals </a>
                                    <a href="../managers/manageSpaces.php" class="btn btn-primary gradient-blue">Manage Spaces  </a>
                                </div>
                                <div class="col-6 btn-group-vertical">
                                    <a href="../managers/manageEquipment.php" class="btn btn-primary gradient-blue">Manage Equipment  </a>
                                    <a href="../managers/issuesManagement.php" class="btn btn-primary gradient-blue">Issue Reports  </a>
                                    <a href="../managers/complexManagers.php" class="btn btn-primary gradient-blue">Manage Managers  </a>
                                    <a href="../managers/managerStatistics.php" class="btn btn-primary gradient-blue">Statistics  </a>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="sportComplex.php">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                    <div class="caption text-center">
                        <h5>Complex 2</h5>
                        <div class="row">
                            <div class="col-6 btn-group-vertical">
                                <a href="sportComplex.php" class="btn btn-primary gradient-blue">View Information  </a>
                                <a href="../managers/editComplex.php" class="btn btn-primary gradient-blue">Edit Information  </a>
                                <a href="../managers/manageRentalsManager.php" class="btn btn-primary gradient-blue">Manage Rentals </a>
                                <a href="../managers/manageSpaces.php" class="btn btn-primary gradient-blue">Manage Spaces  </a>
                            </div>
                            <div class="col-6 btn-group-vertical">
                                <a href="../managers/manageEquipment.php" class="btn btn-primary gradient-blue">Manage Equipment  </a>
                                <a href="../managers/issuesManagement.php" class="btn btn-primary gradient-blue">Issue Reports  </a>
                                <a href="../managers/complexManagers.php" class="btn btn-primary gradient-blue">Manage Managers  </a>
                                <a href="../managers/managerStatistics.php" class="btn btn-primary gradient-blue">Statistics  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="sportComplex.php">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                    <div class="caption text-center">
                        <h5>Complex 3</h5>
                        <div class="row">
                            <div class="col-6 btn-group-vertical">
                                <a href="sportComplex.php" class="btn btn-primary gradient-blue">View Information  </a>
                                <a href="../managers/editComplex.php" class="btn btn-primary gradient-blue">Edit Information  </a>
                                <a href="../managers/manageRentalsManager.php" class="btn btn-primary gradient-blue">Manage Rentals </a>
                                <a href="../managers/manageSpaces.php" class="btn btn-primary gradient-blue">Manage Spaces  </a>
                            </div>
                            <div class="col-6 btn-group-vertical">
                                <a href="../managers/manageEquipment.php" class="btn btn-primary gradient-blue">Manage Equipment  </a>
                                <a href="../managers/issuesManagement.php" class="btn btn-primary gradient-blue">Issue Reports  </a>
                                <a href="../managers/complexManagers.php" class="btn btn-primary gradient-blue">Manage Managers  </a>
                                <a href="../managers/managerStatistics.php" class="btn btn-primary gradient-blue">Statistics  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>

        <div class="row">
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="sportComplex.php">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                    <div class="caption text-center">
                        <h5>Complex 4</h5>
                        <div class="row">
                            <div class="col-6 btn-group-vertical">
                                <a href="sportComplex.php" class="btn btn-primary gradient-blue">View Information  </a>
                                <a href="../managers/editComplex.php" class="btn btn-primary gradient-blue">Edit Information  </a>
                                <a href="../managers/manageRentalsManager.php" class="btn btn-primary gradient-blue">Manage Rentals </a>
                                <a href="../managers/manageSpaces.php" class="btn btn-primary gradient-blue">Manage Spaces  </a>
                            </div>
                            <div class="col-6 btn-group-vertical">
                                <a href="../managers/manageEquipment.php" class="btn btn-primary gradient-blue">Manage Equipment  </a>
                                <a href="../managers/issuesManagement.php" class="btn btn-primary gradient-blue">Issue Reports  </a>
                                <a href="../managers/complexManagers.php" class="btn btn-primary gradient-blue">Manage Managers  </a>
                                <a href="../managers/managerStatistics.php" class="btn btn-primary gradient-blue">Statistics  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="sportComplex.php">
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:100%" alt="">
                    </a>
                    <div class="caption text-center">
                        <h5>Complex 5</h5>
                        <div class="row">
                            <div class="col-6 btn-group-vertical">
                                <a href="sportComplex.php" class="btn btn-primary gradient-blue">View Information  </a>
                                <a href="../managers/editComplex.php" class="btn btn-primary gradient-blue">Edit Information  </a>
                                <a href="../managers/manageRentalsManager.php" class="btn btn-primary gradient-blue">Manage Rentals </a>
                                <a href="../managers/manageSpaces.php" class="btn btn-primary gradient-blue">Manage Spaces  </a>
                            </div>
                            <div class="col-6 btn-group-vertical">
                                <a href="../managers/manageEquipment.php" class="btn btn-primary gradient-blue">Manage Equipment  </a>
                                <a href="../managers/issuesManagement.php" class="btn btn-primary gradient-blue">Issue Reports  </a>
                                <a href="../managers/complexManagers.php" class="btn btn-primary gradient-blue">Manage Managers  </a>
                                <a href="../managers/managerStatistics.php" class="btn btn-primary gradient-blue">Statistics  </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



{include file='common/footer.tpl'}