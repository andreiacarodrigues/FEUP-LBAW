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
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Date: <span> 2017/01/01 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Sports Complex: <span> Sport Complex 1 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Space: <span> Space 2 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Time of Start: <span> 12:05 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> Duration: <span> 00:30 </span></label></li>
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> State: <span> Reserved </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="totheright">
                            <button type="button" class="btn btn-primary gradient-red"><i class="glyphicon glyphicon-remove"></i> Cancel</button>
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
                            <li><i class="fa fa-chevron-right" aria-hidden="true"></i> <label> State: <span> Concluded </span></label></li>
                        </ul>
                    </div>

                    <div class="col-md-4 col-md-offset-4">
                        <div class="totheright">
                        <div class="stars">
                                <input class="star star-5" id="star-5" type="radio" name="star"/>
                                <label class="star star-5" for="star-5"></label>
                                <input class="star star-4" id="star-4" type="radio" name="star"/>
                                <label class="star star-4" for="star-4"></label>
                                <input class="star star-3" id="star-3" type="radio" name="star"/>
                                <label class="star star-3" for="star-3"></label>
                                <input class="star star-2" id="star-2" type="radio" name="star"/>
                                <label class="star star-2" for="star-2"></label>
                                <input class="star star-1" id="star-1" type="radio" name="star"/>
                                <label class="star star-1" for="star-1"></label>
                        </div>
                        <br>
                            <button type="button" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#reportModal"><i class="fa fa-ban"> </i> Report Issue </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!------------------------>

        <!-- Modal -->
        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel">
                            Report
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form action="#" method="post" autocomplete="on" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Subject</span>
                                            <input type="text" class="form-control">
                                        </div>


                                        <div class="input-group">
                                            <span class="input-group-addon primary">To</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Sport's Complex Manager</option>
                                                <option>Website Administrator</option>
                                                <option>Both</option>
                                            </select>
                                        </div>



                                        <div class="input-group">
                                            <span class="input-group-addon primary">Category</span>
                                            <select class="form-control" title="">
                                                <option value="" disabled selected></option>
                                                <option>Category 1</option>
                                                <option>Category 2</option>
                                                <option>Category 3</option>
                                            </select>
                                        </div>



                                        <div class="input-group">
                                            <span class="input-group-addon primary">Description</span>
                                            <textarea class="form-control" rows="5" id="comment"></textarea>
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








    </div>
</div>


    <?php
include('../templates/footer.php');
?>
