<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
?>

<div class='dialog-alert'>
</div>
<div class='row'>
    <div class='col-md-6'>
    <h5>Username</h5>
    <div class='input-group'>
        <span class='input-group-addon'><i class='fa fa-edit'></i></span>
        <input type='text' class='form-control' name='user_name' data-validate='{"minLength": 1, "maxLength": 25, "label": "Username" }'>
    </div>
    </div>
    <div class='col-md-6'>
    <h5>Display Name</h5>
    <div class='input-group'>
        <span class='input-group-addon'><i class='fa fa-edit'></i></span>
        <input type='text' class='form-control' name='display_name' data-validate='{"minLength": 1, "maxLength": 50, "label": "Display name" }'>
    </div>
    </div>
</div>
<div class='row'>
    <div class='col-md-6'>
    <h5>Email</h5>
    <div class='input-group'>
        <span class='input-group-addon'><a id='email-link' href=''><i class='fa fa-envelope'></i></a></span>
        <input type='text' class='form-control' name='email' data-validate='{"email": true, "label": "Email" }'>
    </div>
    </div>
    <div class='col-md-6'>
    <h5>Title</h5>
    <div class='input-group'>
        <span class='input-group-addon'><i class='fa fa-edit'></i></span>
        <input type='text' class='form-control' name='user_title' data-validate='{"minLength": 1, "maxLength": 100, "label": "Title" }'>
    </div>
    </div>
</div>
<div class='input-group-dates'>


</div>
<div class='row'>
    <div class='col-md-6 input-group-password'>
    </div>
    <div class='col-md-6'>
        <h5>Permission Groups</h5>
        <ul class='list-group permission-summary-rows'>
    
        </ul>
    </div>
</div>
<br>
<div class='row btn-group-action'>
</div>

