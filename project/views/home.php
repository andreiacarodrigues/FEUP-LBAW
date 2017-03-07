<?php
    include('../templates/headerUnregistered.php');
?>
   <a name="about"></a>
    <div class="intro-header">
        <div class="container">
            <div class="row">
                <div class="intro-message">
                    <h1>Sports R Us</h1>
                    <h3>Your favorite place to rent sports complexes!</h3>
                    <hr class="intro-divider">
                    <form class="searchForm" action="searchResults.php" method="post" autocomplete="on">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon primary">Name</span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon primary">Location</span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon primary">Sport</span>
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
                                        <span class="input-group-addon primary">Date</span>
                                       <input type="date" class="form-control">
                                 </div>
                               </div>
                               <div class="form-group">
                                   <div class="input-group">
                                        <span class="input-group-addon primary">Starting Time</span>
                                      <input type="time" class="form-control">
                                    </div>
                                </div>
                               <div class="form-group">
                                 <div class="input-group">
                                       <span class="input-group-addon primary">Duration</span>
                                       <input type="time" class="form-control">
                                   </div>
                               </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary btn-lg gradient-blue" value="Search"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
    include('../templates/footer.php');
?>