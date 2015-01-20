<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
?>


<li class="list-group-item">
    {{permission_name}}
    <span class="pull-right">
    <input type="checkbox" class="form-control select_permissions" data-id="{{permission_id}}" checked data-on-label="<i class='fa fa-check'>" data-off-label="<i class='fa fa-times'>">
    </span>
</li>
