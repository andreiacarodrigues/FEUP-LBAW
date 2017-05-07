function complexInfo(url, complexID){

    $.getJSON(url,  {complexID: complexID} ,
        function(data){
            $('#infoName').text(data['name']);
            $('#infoLocation').text(data['location']);
            var openOnWeekends = "yes";
            if(data['openOnWeekends'] == "false")
                openOnWeekends = "no";

            $('#infoOpenOnWeekends').text(openOnWeekends);
            $('#infoEmail').text(data['email']);
            $('#infoContact').text(data['contact']);
            $('#infoDescription').text(data['description']);
            $('#infoHours').text(data['openingHour'] + "-" + data['closingHour']);
        });
}

function complexManagers()
{
    var buttons = $('.remove-button');
    buttons.each(function()
    {
        var id = $(this).attr('id');
        var result = id.match(/remove-(\d*)/);
        console.log(result);
    });
}

function complexSpacesInfo(url, complexID){

    $.getJSON(url,  {complexID: complexID} ,
        function(data){
            for(var j = 0; j < data.length; j++)
            {
                var space = data[j];
                var rating = "";
                if(space['rating'] != null){
                    for(var i = 0; i < space['rating']; i++)
                        rating += '⭐';
                }

                var isCovered = "Covered";
                if(space['isCovered'] == "false"){
                    isCovered = "Not covered";
                }

                $('#spaces').append(
                    '<div class="row">' +
                        '<div class="col-md-3">' +
                            '<a href="#">' +
                            '<img class="img-responsive" src="http://placehold.it/700x400" style="width:300px" alt="">' +
                            '</a>' +
                        '</div>' +
                        '<div class="col-md-9">'+

                            '<br><h4>' + space['name'] + " " + rating + '</h4>'+
                            '<ul class="list-group">' +
                                '<li class="list-group-item"> <i class="fa fa-cloud"></i> ' + isCovered + ' </li>'+
                                '<li class="list-group-item"><i class="fa fa-tree"></i> ' + space['surfaceType'] + ' </li>'+
                                '<li class="list-group-item"> <i class="fa fa-eur"></i> ' + space['price'] + ' <span> per hour </span></li>'+
                            '</ul>'+
                            '<a class="btn btn-primary btn-lg gradient-blue" href="../space.php/?spaceID=' + space['id'] + '">Rent Space<span class="glyphicon glyphicon-chevron-right"></span></a>'+
                        '</div>'+
                    '</div>' +
                    '<hr>'
                )
            }
        });
}

function addSpace(){
    $('form').submit(function() {
        var error = false;

        var name = $("input[name='name']").val();

        $('#invalidName').text("");
        $('.errorMessage').text("");

        if (name == "")
        {
            $('.errorMessage').text("Required field wasn't filled.");
            return false;
        }

        if(!is_name(name)) {
            error = true;
            $('#invalidName').text("Invalid name.");
        }

        if(error)
            return false;
    });

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
}

function addComplex(){
    $('form').submit(function(){

        // Prevents from submiting

        var error = false;

        // Variables

        var name = $("input[name='name']").val();
        var location = $("input[name='location']").val();
        var email = $("input[name='email']").val();
        var contact = $("input[name='contact']").val();
        var municipality = $("select[name='municipality']").val();
        var openingHour = $("input[name='openingHour']").val();
        var closingHour = $("input[name='closingHour']").val();
        var paypal = $("input[name='paypal']").val();

        // Error Check

        $('#invalidName').text("");
        $('#invalidEmail').text("");
        $('#invalidLocation').text("");
        $('#invalidContact').text("");
        $('#invalidHours').text("");
        $('#invalidPaypal').text("");
        $('.errorMessage').text("");


        if(name == "" || location == "" || email == "" || contact == "" || municipality == null || openingHour == "" || closingHour == "" || paypal == "") {
            $('.errorMessage').text("Required field wasn't filled.");
            return false;
        }

        if(openingHour > closingHour) {
            error = true;
            $('#invalidHours').text("Invalid hours. Closing time must be after opening time.");
        }
        if(!is_name(name)) {
            error = true;
            $('#invalidName').text("Invalid name.");
        }

        if(!is_location(location)) {
            error = true;
            $('#invalidLocation').text("Invalid location.");
        }

        if(!is_email(email)){
            error = true;
            $('#invalidEmail').text("Invalid email. Should be in the form xxx@yyy.zzz.");
        }

        if(!is_contact(contact)){
            error = true;
            $('#invalidContact').text("Invalid phone number. It should be 9 digits in the form xxxxxxxxx or xxx-xxx-xxx.");
        }

        if(!is_email(paypal)){
            error = true;
            $('#invalidPaypal').text("Invalid paypal email. Should be in the form xxx@yyy.zzz.");
        }

        if(error)
            return false;

    });
}

function manageSpaces(){
    $('#editSpaceForm')
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
        var $body   = $('body'),
            $iframe = $body.data('iframe.fv');
        if ($iframe) {
            // Adjust the height of iframe when showing the picker
            $iframe.height($body.get(0).scrollHeight);
        }
    }
}

function signUp(){
    $('form').submit(function(){

        // Prevents from submiting

        var error = false;

        // Variables

        var name = $("input[name='name']").val();
        var email = $("input[name='email']").val();
        var username = $("input[name='username']").val();
        var contact = $("input[name='contact']").val();
        var municipality = $("select[name='municipality']").val();
        var password = $("input[name='password']").val();
        var confirm = $("input[name='confirm']").val();

        // Error Check

        $('#invalidName').text("");
        $('#invalidEmail').text("");
        $('#invalidUsername').text("");
        $('#invalidContact').text("");
        $('#invalidPassword').text("");
        $('#invalidConfirmation').text("");
        $('.errorMessage').text("");

        if(name == "" || email == "" || username == "" || contact == "" || municipality == null || password == "" || confirm == "") {
            $('.errorMessage').text("Required field wasn't filled.");
            return false;
        }

        if(!is_name(name)) {
            error = true;
            $('#invalidName').text("Invalid name.");
        }

        if(!is_email(email)){
            error = true;
            $('#invalidEmail').text("Invalid email. Should be in the form xxx@yyy.zzz.");
        }

        if(!is_username(username)) {
            error = true;
            $('#invalidUsername').text("Invalid username.");
        }

        if(!is_contact(contact)){
            error = true;
            $('#invalidContact').text("Invalid phone number. It should be 9 digits in the form xxxxxxxxx or xxx-xxx-xxx.");
        }

        if(!is_password(password)){
            error = true;
            $('#invalidPassword').text("Invalid password. Should have more than 6 characters.");
        }
        else if(password != confirm){
            error = true;
            $('#invalidConfirmation').text("Passwords do not match.");
        }

        if(error)
            return false;

    });
}

function spaceInfo(urlInfo, urlRedirect, spaceID){

    $.getJSON(urlInfo,  {spaceID: spaceID} ,
        function(data){
            $('#infoName').text(data['spaceName']);
            $('#infoLocation').text(data['complexLocation']);

            var openOnWeekends = "yes";
            if(data['complexOpenOnWeekends'] == "false")
                openOnWeekends = "no";

            $('#infoOpenOnWeekends').text(openOnWeekends);

            var covered = "yes";
            if(data['spaceIsCovered'] == "false")
                covered = "no";

            $('#infoCoverage').text(data['spaceIsCovered']);
            $('#infoSports').text(data['spaceSports']);
            $('#infoSurface').text(data['spaceSurfaceType']);
            $('#infoPrice').text(data['spacePrice']);
            $('#infoEmail').text(data['complexEmail']);
            $('#infoContact').text(data['complexPhone']);
            $('#infoHours').text(data['complexOpeningHour'] + "-" + data['complexClosingHour']);

            $('.backToComplex').attr("href", urlRedirect + '/?complexID=' + data['spaceComplexID']);
        });
}