{include file='common/userHeader.tpl'}
<div class="statistics">
    <div class="container">
        <div class="text-center">
            <h1>Statistics for <span> Complex 1 </span></h1>
            <br><br><br>

        </div>
        <div class="thumbnail well">
        <ul class="list-unstyled list-statistics">
            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i> Space with the most reservations: <span>{$space.spaceName} with {$space.spaceRents} reservations </span></label></li>
            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i> User with most reservations: <span>{$user.userName} with {$user.spaceRents} reservations</label></li>
            <li><label> <i class="fa fa-chevron-right" aria-hidden="true"></i> Average time per rental: <span>{$rentalTime}</span></label></li>
        </ul>
        </div>
    </div>
</div>
{include file='common/footer.tpl'}

