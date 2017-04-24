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