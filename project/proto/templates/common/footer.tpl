<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-inline">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#" data-target="#issueModal" data-toggle="modal">Contact Administration</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="{$BASE_URL}pages/admins/admin.php">Administration Page</a>
                    </li>
                </ul>
                <p class="copyright text-muted small">Copyright &copy; LBAW1653. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<!--<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGN7kjfIootMAJVsMqrNWQYnKjH6vbI_Q&callback=initMap">
</script>-->

<!-- Modal -->
<div class="modal fade" id="issueModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center" id="myModalLabel">
                    Contact Administration
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form id="issueForm" action="{$BASE_URL}actions/users/newIssueAdmin.php" method="post" autocomplete="on" class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon primary">Subject</span>
                                    <input type="text" name="subject" class="form-control">
                                </div>

                                <input type="hidden" name="to" value="forAdmin" />

                                <div class="input-group">
                                    <span class="input-group-addon primary">Category</span>
                                    <select class="form-control" name="category" title="">
                                        <option value="" disabled selected></option>
                                        <option>COMPLEXISSUES</option>
                                        <option>REFUNDS</option>
                                        <option>LASTMINUTECANCELLATION</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon primary">Description</span>
                                    <textarea class="form-control" rows="5" name="description"></textarea>
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

</body>

</html>