<?php
include('../templates/headerRegistered.php');
?>
<a name="about"></a>
<div class="addSpace">
    <div class="container">
        <div class="intro-add-complex text-center">
            <h2>Add Space to: Complex<span> 1 </span></h2>
            <br>
        </div>
        <hr class="divider"><br>
            <form id="addComplexForm" action="sportComplex.php" method="post" autocomplete="on">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Name</span>
                                <input type="text" class="form-control" name="name" id="name"  placeholder=""/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Surface</span>
                                <select class="form-control" title="">
                                    <option value="" disabled selected></option>
                                    <option>Football</option>
                                    <option>Basketball</option>
                                    <option>Tenis</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Coverage</span>
                                <select class="form-control" title="">
                                    <option value="" disabled selected></option>
                                    <option>Football</option>
                                    <option>Basketball</option>
                                    <option>Tenis</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Dimensions</span>
                                <select class="form-control" title="">
                                    <option value="" disabled selected></option>
                                    <option>Football</option>
                                    <option>Basketball</option>
                                    <option>Tenis</option>
                                </select>
                            </div>
                        </div>

                        <input type="submit" class="btn btn-primary gradient-yellow" value="Upload representative picture"/>
                        <img class="img-responsive" src="http://placehold.it/700x400" style="width:400px" alt="">
                        <br><br>
                        <div style="text-align: center;">
                            <input type="submit" class="btn btn-primary gradient-blue" value="Register Space"/>
                            <input type="submit" class="btn btn-primary gradient-blue" value="Cancel"/>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>



<?php
include('../templates/footer.php');
?>
