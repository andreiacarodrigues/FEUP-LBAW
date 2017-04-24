{include file='common/userHeader.tpl'}


<div class="addSpace">
    <div class="container">
        <div class="intro-add-complex text-center">
            <h2>Add Space to: Complex<span> 1 </span></h2>
            <br>
        </div>
        <hr class="divider"><br>
            <form id="addSpaceForm" action="{$BASE_URL}actions/managers/addSpace.php" method="post" autocomplete="on">
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
                                <select class="form-control" title="" name="surface">
                                    <option value="" disabled selected></option>
                                    <option>Artificial Grass</option>
                                    <option>Carpet</option>
                                    <option>Asphalt</option>
                                    <option>Acrylic</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Coverage</span>
                                <select class="form-control" title="" name="coverage">
                                    <option value="" disabled selected></option>
                                    <option>Covered</option>
                                    <option>Uncovered</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Price / hour</span>
                                <input class="form-control" type="number" name="price" min="0" max="20" step="1" value="0">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon primary">Sports</span>
                                <select class="form-control" name="sports[]" multiple>
                                    <option value="football">Football</option>
                                    <option value="basketball">Basketball</option>
                                    <option value="tenis">Tenis</option>
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
	
{include file='common/footer.tpl'}

<link rel="stylesheet" href="{$BASE_URL}js/bootstrap-multiselect.css" />
<script src="{$BASE_URL}js/bootstrap-multiselect.js"></script>

<script>
    $(document).ready(function() {
        $('#addSpaceForm')
            .find('[name="sports[]"]')
            .multiselect({
                includeSelectAllOption: true,
                onChange: function(element, checked) {
                    adjustByScrollHeight();
                },
                onDropdownShown: function(e) {
                    adjustByScrollHeight();
                },
                onDropdownHidden: function(e) {
                    adjustByHeight();
                }
            })
            .end();

        function adjustByHeight() {
            var $body   = $('body'),
                $iframe = $body.data('iframe.fv');
            if ($iframe) {
                // Adjust the height of iframe when hiding the picker
                $iframe.height($body.height());
            }
        }

        function adjustByScrollHeight() {
            var $body  = $('body'),
                $iframe = $body.data('iframe.fv');
            if ($iframe) {
                // Adjust the height of iframe when showing the picker
                $iframe.height($body.get(0).scrollHeight);
            }
        }
    });
</script>