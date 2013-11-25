<div class="col-sm-9">
<div class="row">
 <form class="form-horizontal" action=<?php echo $this->config->item('full_url') . "User/add_new_user" ?> method="post">
  <fieldset>
  	<legend>Add New User</legend>
    <div class="form-group">
      <label for="display_name" class="col-sm-3 control-label">Display Name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="display_name" id="display_name">
      </div>
    </div>
    <div class="form-group">
      <label for="user_name" class="col-sm-3 control-label">User Name</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" name="user_name" id="user_name">
      </div>
    </div>
    <div class="form-group">
      <label for="user_name" class="col-sm-3 control-label">User Name</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="user_name" id="user_name">
      </div>
    </div>
    <div class="form-group">
      <label for="email" class="col-sm-3 control-label">Email</label>
      <div class="col-sm-4">
        <input type="email" class="form-control" name="email" id="email">
      </div>
    </div>
    <br>
    <div class="form-group">
      <label for="email" class="col-sm-3 control-label">User Level</label>
      <div class="col-sm-4">
        <input type="radio" name="user_level" value="1"><p class="form-radio-txt"> Full Admin</p>
        <input type="radio" name="user_level" value="2"><p class="form-radio-txt"> Site Admin</p>
      </div>
    </div>
    <br>
    <div class="form-group">
     <label for="password" class="col-sm-3 control-label">Password</label>
     <div class="col-sm-4">
      <input type="password" class="form-control" name="password" id="password">
      </div>
    </div>
    <div class="form-group">  
      <div class="col-sm-12"></div>
       <label for="confirm_password" class="col-sm-3 control-label">Confirm Password</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" name="confirm_password" id="confirm_password">
        </div>
     </div>  
   </div>

 </fieldset>
 <div>
  <div class="col-sm-8">
    <button type="submit" class="btn btn-primary pull-right">Add User</button>
  </div>
 </div>
</form>
</div>
</div>