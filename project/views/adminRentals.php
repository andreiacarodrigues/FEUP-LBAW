<?php
include('../templates/adminHeaderRegistered.php');
?>
<div class="admin-statistics-header">
    <div class="admin">

    <div class="container">
        <div class="form-group">
        <div class="input-group">
            <div class="checkbox checkbox-info">
                <label>
                    <input type="checkbox" value="">
                    <span>Show only rentals with issue reports</span>
                </label>

            </div>
        </div>
        </div>
        <br>
        <div class="rental thumbnail">
            <div class="row">
                <div class="container">
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <h4>Rental #<span>1</span></h4>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> User Name: <span> Andreia Rodrigues </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> User Contact: <span> 912345678 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> User Email: <span> andreiacarodrigues@gmail.com </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Date: <span> 2017/01/01 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports Complex: <span> Sport Complex 1 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports Complex Contact: <span> 919876543 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports Complex Email: <span> sc1@gmail.com </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Space: <span> Space 2 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Time of Start: <span> 12:05 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Duration: <span> 00:30 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> State: <span> Reserved </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="totheright">
                            <br>
                            <button type="button" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#issuesModal">Issue</button><br><br>
                            <button type="button" class="btn btn-primary gradient-yellow">Suspend</button><br><br>
                            <button type="button" class="btn btn-primary gradient-red">Remove</button><br><br>
                            <button type="button" class="btn btn-primary gradient-blue">Conclude</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rental thumbnail">
            <div class="row">
                <div class="container">
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <h4>Rental #<span>2</span></h4>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> User Name: <span> Andreia Rodrigues </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> User Contact: <span> 912345678 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> User Email: <span> andreiacarodrigues@gmail.com </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Date: <span> 2017/01/01 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports Complex: <span> Sport Complex 1 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports Complex Contact: <span> 919876543 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports Complex Email: <span> sc1@gmail.com </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Space: <span> Space 2 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Time of Start: <span> 12:05 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Duration: <span> 00:30 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> State: <span> Reserved </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="totheright">
                            <br>
                            <button type="button" class="btn btn-primary gradient-yellow">Suspend</button><br><br>
                            <button type="button" class="btn btn-primary gradient-red">Remove</button><br><br>
                            <button type="button" class="btn btn-primary gradient-blue">Conclude</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rental thumbnail">
            <div class="row">
                <div class="container">
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <h4>Rental #<span>3</span></h4>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> User Name: <span> Andreia Rodrigues </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> User Contact: <span> 912345678 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> User Email: <span> andreiacarodrigues@gmail.com </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Date: <span> 2017/01/01 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports Complex: <span> Sport Complex 1 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports Complex Contact: <span> 919876543 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports Complex Email: <span> sc1@gmail.com </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Space: <span> Space 2 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Time of Start: <span> 12:05 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Duration: <span> 00:30 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> State: <span> Complete </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="totheright">
                            <br>
                            <button type="button" class="btn btn-primary gradient-yellow">Suspend</button><br><br>
                            <button type="button" class="btn btn-primary gradient-red">Remove</button><br><br>
                            <button type="button" class="btn btn-primary gradient-blue">Conclude</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</div>

        <!-- Modal -->
        <div class="modal fade" id="issuesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel">
                            Issue
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <div class="rental">
                            <div class="row">
                                <div class="container">
                                    <div class="col-md-4">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Date: <span> 2017/01/01 </span></label></li>
                                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Subject: <span> Equipment </span></label></li>
                                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Category: <span> Others </span></label></li>
                                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Description: <span> O relvado estava em mau estado </span></label></li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
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
