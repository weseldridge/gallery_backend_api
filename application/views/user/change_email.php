 <div class="col-sm-9">
 <div class="row">
     <form class="form-horizontal" action=<?php echo $this->config->item('full_url') . "User/update_user_from_form/email" ?> method="post">
      <fieldset>
      	<legend>Change Email Form</legend>
        <div class="form-group">
        	<label for="email" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-4">
        	 <input type="text" class="form-control" name="email" id="email">
          </div>
        </div>
        <div class="form-group">
        	<label for="confirm_email" class="col-sm-3 control-label">Confirm Email</label>
          <div class="col-sm-4">
        	 <input type="text" class="form-control" name="confirm_email" id="confirm_email">
          </div>
        </div>
        <div class="col-sm-8">
          <button type="submit" class="btn btn-primary pull-right">Change Email</button>
        </div>
      </fieldset>
      
    </form>
</div>
</div>