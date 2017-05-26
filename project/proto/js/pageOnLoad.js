

function sportComplexPage(url, complexID){
    complexInfo(url, complexID);
    complexSpacesInfo(url, complexID);
}

function complexInfo(url, complexID){

    var ajaxURL = url + 'actions/users/sportComplex.php';
    $.getJSON(ajaxURL,  {complexID: complexID} ,
        function(data){
            $('#infoName').text(data['name']);
            $('#infoLocation').text(data['location']);
            var openOnWeekends = "yes";

            if(data['openOnWeekends'] + '' == "false")
                openOnWeekends = "no";

            $('#infoOpenOnWeekends').text(openOnWeekends);
            $('#infoEmail').text(data['email']);
            $('#infoContact').text(data['contact']);
            $('#infoDescription').text(data['description']);
            $('#infoHours').text(data['openingHour'] + "-" + data['closingHour']);
        });
}

function complexManagers() {
    var buttons = $('.remove-button');
    buttons.each(function()
    {
        var id = $(this).attr('id');
        var result = id.match(/remove-(\d*)/);
        console.log(result);
    });
}

function complexSpacesInfo(url, complexID){
    var ajaxURL = url + 'actions/users/complexSpaces.php';

    $.getJSON(ajaxURL,  {complexID: complexID} ,
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

                var fileURL = url + 'res/img/originals/space_' + space['id'] + '.jpg';

                var result = UrlExists(fileURL);

                var photoURL = "http://placehold.it/700x400";
                if(result)
                    photoURL = url + 'res/img/originals/space_' + space['id'] + '.jpg';

                $('#spaces').append(
                    '<div class="row">' +
                        '<div class="col-md-3">' +
                            '<a href="#">' +
                            '<img class="img-responsive" src="' + photoURL + '" style="width:300px" alt="">' +
                            '</a>' +
                        '</div>' +
                        '<div class="col-md-9">'+

                            '<br><h4>' + space['name'] + " " + rating + '</h4>'+
                            '<ul class="list-group">' +
                                '<li class="list-group-item"> <i class="fa fa-cloud"></i> ' + isCovered + ' </li>'+
                                '<li class="list-group-item"><i class="fa fa-tree"></i> ' + space['surfaceType'] + ' </li>'+
                                '<li class="list-group-item"> <i class="fa fa-eur"></i> ' + space['price'] + ' <span> per hour </span></li>'+
                            '</ul>'+
                            '<a class="btn btn-primary btn-lg gradient-blue" href="' + url + 'pages/users/space.php/?spaceID=' + space['id'] + '">Rent Space<span class="glyphicon glyphicon-chevron-right"></span></a>'+
                        '</div>'+
                    '</div>' +
                    '<hr>'
                )
            }
        });
}

function UrlExists(url)
{
    var http = new XMLHttpRequest();
    http.open('HEAD', url, false);
    http.send();
    return http.status!=404;
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

function complexValidations(){
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

function spacePage(url, spaceID){

    var urlInfo = url + 'actions/users/space.php';
    var urlRedirect = url +'pages/users/sportComplex.php';
    spaceInfo(urlInfo, urlRedirect, spaceID);

    $(".checkInput input").blur(function(){
        var date = $("input[name='date']").val();
        var startTime = $("input[name='startingTime']").val();
        var duration = $("input[name='duration']").val();
        // Date comparisons
        var val2 = date + "T" + startTime;
        var val3 = date + "T" + duration;

        var today = moment();
        var val1 = moment(date);
        val2 = moment(val2, moment.ISO_8601);
        val3 = moment(val3, moment.ISO_8601);


        var hoursToAdd = val3.hours();
        var minutesToAdd = val3.minutes();

        var val3 = val2;
        val3.add(hoursToAdd, 'hours');
        val3.add(minutesToAdd, 'minutes');

        $('#rentalInfo').empty();

        if((date != "") && (startTime != "") && (duration != "")) {

            var spaceHours = $('#infoHours').text();
            spaceHours = spaceHours.split("-");

            var spaceHours1 = moment(date + "T" + spaceHours[0], moment.ISO_8601);
            var spaceHours2 = moment(date + "T" + spaceHours[1], moment.ISO_8601);


            if(moment().diff(val1) > 0)
            {
                $('#rentalInfo').append('<p> The date is invalid, they must be set in the future. Please enter valid information. </p>');
                return;
            }

              if(moment(val2).isBefore(spaceHours1) || moment(val3).isAfter(spaceHours2)) {
                  $('#rentalInfo').append('<p> The time is invalid, they must be set within the opening and closing hours of the space. Please enter valid information. </p>');
                  return;
              }

                if (!$.trim($('#rentalInfo').html()).length)
                    $('#rentalInfo').append(
                        "<div class='table-responsive'>" +
                        "<table class='table table-striped table-sm'>" +
                        "<thead class='thead-default'>" +
                        "<tr>" +
                        "<th><h4>Item</h4></th>" +
                        "<th><h4>Name</h4></th>" +
                        "<th><h4>Quantity To Rent</h4></th>" +
                        "<th><h4>Available</h4></th>" +
                        "<th><h4>Price / hour (€)</h4></th>" +
                        "</tr>" +
                        "</thead>" +
                        '<input type="hidden" name="IDs" id="IDs"/>'+
                        "<tbody id='equipmentList'>" +
                        " </tbody>" +
                        "</table>" +
                        "</div>" +
                        "<div class='text-right'>" +
                        "<h4> Total(€): <span id='totalRentalCost'> 0 </span> </h4>" +
                        "<input type='submit' class='btn btn-primary gradient-blue' value='Rent Items'/>" +
                        "</div>"
                    );
                // faz chamada ajax
                equipmentInfo(url,spaceID, date, startTime, duration);
            }



    });


}

function equipmentInfo(url, spaceID, date, startTime, duration){

    $('#IDs').val("");

    $('#equipmentList').empty();

    var ajaxURL = url + 'actions/managers/getEquipment.php';

    $.getJSON(ajaxURL, {spaceID: spaceID, date: date, startTime: startTime, duration: duration} ,
        function(data){

            for(var j = 0; j < data.length; j++)
            {
                var equipment = data[j];
                var rentalQuantity = 0;

                var fileURL = url + 'res/img/originals/equipment_' + equipment['equipmentID'] + '.jpg';
                var result = UrlExists(fileURL);

                var photoURL = "http://placehold.it/200x200";
                if(result)
                    photoURL = url + 'res/img/thumbs_small/equipment_' + equipment['equipmentID'] + '.jpg';

                if(equipment['rentalQuantity'] != null)
                    rentalQuantity = parseInt(equipment['rentalQuantity']);
                $('#equipmentList').append(
                    "<tr>" +
                    "<td class='centered'>"+
                    '<img class="img-responsive" src="' + photoURL + '" style="width:100px" alt="">' +
                    "</td>" +
                    "<td>" +
                    "<h5>" + equipment['equipmentName'] + "</h5>" +
                    "</td>" +
                    "<td>" +
                    "<div class='form-group'>" +
                    "<div class='input-group'>" +
                    "<input class='form-control quantity' type='number' name='quantity" + equipment['equipmentID'] + "' min='0' max='" + (parseInt(equipment['equipmentQuantity']) - parseInt(equipment['equipmentQuantityUnavailable']) - rentalQuantity) + "' step='1' value='0'>" +
                    "</div>"+
                    "</div>"+
                    "</td>" +
                    "<td>" +
                    "<h5>" +  (parseInt(equipment['equipmentQuantity']) - parseInt(equipment['equipmentQuantityUnavailable']) - rentalQuantity) + "</h5>" +
                    "</td>" +
                    "<td>" +
                    "<h5 class='price'>" + equipment['equipmentPrice'] + "</h5>" +
                    "</td>" +
                    "</tr>"
                );

                var currentIDs = $('#IDs').val();
                $('#IDs').val(currentIDs + ';' + equipment['equipmentID']);

            }

            $(".quantity").blur(function(){
                var total = 0;
                $('#equipmentList tr').each(function(){
                    total += (parseInt($(this).find('.quantity').val()) * (parseInt($(this).find('.price').text())));
                });
                var hoursMinutes = duration.split(":");
                total += (parseInt($('#infoPrice').text()) * (parseInt(hoursMinutes[0]) + parseFloat((hoursMinutes[1]/60))));
                $('#totalRentalCost').text(total.toFixed(2));
            });

        });


    $("input[name='duration']").blur(function(){
        var total = 0;
        var hoursMinutes = $(this).val().split(":");
        total += (parseInt($('#infoPrice').text()) * (parseInt(hoursMinutes[0]) + parseFloat((hoursMinutes[1]/60))));
        $('#totalRentalCost').text(total.toFixed(2));
    });

}


function adminSignUp(){
    $('form').submit(function(){

        // Prevents from submiting

        var error = false;

        // Variables

        var username = $("input[name='username']").val();
        var password = $("input[name='password']").val();
        var confirm = $("input[name='confirm']").val();

        // Error Check

        $('#invalidUsername').text("");
        $('#invalidPassword').text("");
        $('#invalidConfirmation').text("");
        $('.errorMessage').text("");

        if(username == "" || password == "" || confirm == "") {
            $('.errorMessage').text("Required field wasn't filled.");
            return false;
        }

        if(!is_username(username)) {
            error = true;
            $('#invalidUsername').text("Invalid username.");
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

function imagesInput(doc){
    doc.on('change', ':file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [numFiles, label]);
    });

    doc.ready( function() {
        $(':file').on('fileselect', function(event, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
    });
}

function manageEquipmentPage(doc){
    imagesInput(doc);

    $(doc).ready(function() {
        $('.modal-body #equipmentForm')
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
        $('.equipmentForm')
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
    });
}