<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
?>  

<div id='btn-group-create-user' class='col-md-12'>
    <button class='btn btn-lg btn-success btn-create-user'>Create user</button>
    <button class='btn btn-lg btn-link pull-right' data-dismiss='modal'>Cancel</button>
</div>

<div id='btn-group-update-user' class='col-md-12'>
    <button class='btn btn-lg btn-success btn-update-user'>Update user</button>
    <button class='btn btn-lg btn-link pull-right' data-dismiss='modal'>Cancel</button>
</div>

<div id='input-group-create-user-password'>
    <div class='input-group'>
        <h5>Password</h5>
        <div class='input-group'>
            <span class='input-group-addon'><i class='fa fa-lock'></i></span>
            <input type='password' name='password' class='form-control' data-validate='{"minLength": 8, "maxLength": 50, "passwordMatch": "passwordc", "label": "Password"}'>
        </div>
    </div>
    <div class='input-group'>
        <h5>Confirm password</h5>
        <div class='input-group'>
            <span class='input-group-addon'><i class='fa fa-lock'></i></span>
            <input type='password' name='passwordc' class='form-control' data-validate='{"minLength": 8, "maxLength": 50, "label": "Confirm password"}'>
        </div>
    </div>         
</div>

<div id='input-group-display-user-dates'>
<div class='row'>
    <div class='col-md-6'>
    <h5>Last Sign-in</h5>
    <div class='input-group optional'>
        <span class='input-group-addon'><i class='fa fa-calendar'></i></span>
        <input type='text' class='form-control' name='last_sign_in_date'>
    </div>
    </div>
    <div class='col-md-6'>
    <h5>Registered Since</h5>
    <div class='input-group optional'>
        <span class='input-group-addon'><i class='fa fa-calendar'></i></span>
        <input type='text' class='form-control' name='sign_up_date'>
    </div>
    </div>
</div>
</div>
