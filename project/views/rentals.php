<?php
include('../templates/headerRegistered.php');
?>
<div class="userRentals">
    <div class="container">
        <div class="rental well well-sm">
            <div class="row">
                <div class="container">
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <h4>Rental #<span>1</span></h4>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Date: <span> 2017/01/02 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports Complex: <span> Sport Complex 1 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Space: <span> Space 1 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Time of Start: <span> 12:05 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Duration: <span> 00:30 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> State: <span> Not Finished </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="totheright">
                            <button type="button" class="btn btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                            <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="rental well well-sm">
            <div class="row">
                <div class="container">
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <h4>Rental #<span>2</span></h4>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Date: <span> 2017/01/01 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports Complex: <span> Sport Complex 1 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Space: <span> Space 2 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Time of Start: <span> 12:05 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Duration: <span> 00:30 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> State: <span> Finished </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="totheright">
                            <button type="button" class="btn btn-info"><i class="fa fa-ban"> </i> Report Issue </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <?php
include('../templates/footer.php');
?>
