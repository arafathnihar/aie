<?php
/* aiefin user mangement */

require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
?>

<div class='modal-dialog modal-sm'>
  <div class='modal-content'>
    <div class='modal-header '>
      <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
      <h4 class='modal-title'>Delete User</h4>
    </div>
    <div class='modal-body'>
      <div class='dialog-alert'>
      </div>
      <h4>Are you sure you want to delete the user <span class='user_name'></span>?<br><small>This action cannot be undone.</small></h4>
      <br>
      <input type='hidden' name='user_id'>
      <div class='btn-group-action'>
        <button type="button" class="btn btn-danger btn-lg btn-block btn-confirm-disable">Yes, delete user</button>
        <button type="button" class="btn btn-default btn-lg btn-block" data-dismiss='modal'>Cancel</button>
      </div>
    </div>
    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
