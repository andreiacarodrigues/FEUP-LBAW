{include file='common/adminHeader.tpl'}

<div class="admin-statistics-header">
    <div class="admin">

        <div class="container">
            <div class="intro-add-complex text-center">
                <h2>Statistics</h2>
                <br><br><br>
            </div>
            <div class="thumbnail">
                <ul class="list-unstyled list-statistics">
                    <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Total users registered: <span>{$numUsers}</span> users</label></li>
                    <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Total complexes registered: <span>{$numComplexes}</span> complexes</label></li>
                    <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Total number of reservations: <span>{$numReservations}</span> reservations</label></li>
                    <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Total spaces registered: <span>{$numSpaces}</span> spaces </label></li>
                    <li><label><i class="fa fa-chevron-right" aria-hidden="true"></i> Most practiced sport: <span>{$sport}</span></label></li>

                </ul>
            </div>
        </div>

    </div>
</div>

{include file='common/footer.tpl'}