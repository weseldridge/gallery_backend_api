<div class="col-sm-9">
<div class="row">
   <form class="form-horizontal" action=<?php echo $this->config->item('full_url') . "User/update_user_from_form/password" ?> method="post">
    <fieldset>
    	<legend>Change Password</legend>
      <div class="form-group">
      	<label for="current_password" class="col-sm-3 control-label">Current Password</label>
        <div class="col-sm-4">
      	 <input type="password" class="form-control" name="current_password" id="current_password">
        </div>
      </div>
      <div class="form-group">
      	<label for="new_password" class="col-sm-3 control-label">New Password</label>
        <div class="col-sm-4">
      	 <input type="password" class="form-control" name="new_password" id="new_password">
        </div>
      </div>
      <div class="form-group">
      	<label for="confirm_password" class="col-sm-3 control-label">Confirm New Password</label>
        <div class="col-sm-4">
      	 <input type="password" class="form-control" name="confirm_password" id="confirm_password">
        </div>
      </div>
    </fieldset>
    <div class="col-sm-8">
      <button type="submit" class="btn btn-primary pull-right">Change Password</button>
    </div>
  </form>
</div>
</div>