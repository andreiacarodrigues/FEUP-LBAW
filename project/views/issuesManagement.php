<?php
include('../templates/headerRegistered.php');
?>
<div class="userRentals">
    <div class="container">
        <a href="#" class="btn btn-primary gradient-blue" data-toggle="modal" data-target="#issueModal">Add Issue <i class="fa fa-plus-circle" aria-hidden="true"></i>  </a>

        <hr>
        <div class="rental well well-sm">
            <div class="row">
                <div class="container">
                    <div class="col-md-4">
                        <ul class="list-unstyled">
                            <h4>Issue #<span>1</span></h4>
                            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  User Name: <span> Andreia Cristina de Almeida Rodrigues </span></label></li>
                            <li> <label> <i class="fa fa-chevron-right" aria-hidden="true"></i> Date: <span> 2017/01/01 </span></label></li>
                            <li> <label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Subject: <span> Equipment </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Category: <span> Others </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Description: <span> O relvado estava em mau estado </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="totheright">
                            <button type="button" class="btn btn-primary gradient-red"><i class="glyphicon glyphicon-remove"></i> Remove</button>
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
                            <h4>Issue #<span>1</span></h4>
                            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i>  User Name: <span> Andreia Cristina de Almeida Rodrigues </span></label></li>
                            <li> <label> <i class="fa fa-chevron-right" aria-hidden="true"></i> Date: <span> 2017/01/01 </span></label></li>
                            <li> <label> <i class="fa fa-chevron-right" aria-hidden="true"></i>Subject: <span> Equipment </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Category: <span> Others </span></label></li>
                            <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i>  Description: <span> O relvado estava em mau estado </span></label></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="totheright">
                            <button type="button" class="btn btn-primary gradient-red"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!------------------------>

        <!-- Modal -->
        <div  class="modal fade" id="issueModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title text-center" id="myModalLabel">
                            New Issue
                        </h4>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form id="issueForm" action="#" method="post" autocomplete="on" class="form-horizontal" role="form">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon primary">Subject</span>
                                            <input type="text" class="form-control">
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
