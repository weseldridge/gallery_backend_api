<div class="col-sm-9">
<div class="row">
  <form class="form-horizontal" action=<?php echo $this->config->item('full_url') . "/user/sign_me_in" ?> method="post">
    <fieldset>
    	<legend>Please Sign In</legend>
      <div class="form-group">
      	<label for="username" class="col-sm-3 control-label">User Name</label>
        <div class="col-sm-4">
      	 <input type="text" name="username" class="form-control" id="username">
        </div>
      </div>
      <div class="col-sm-12"> </div>
      <div class="form-group">
      	<label for="password" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-4">
      	 <input type="password" name="password" class="form-control" id="password">
        </div>       
      </div>
    </fieldset>
    <div class="col-sm-8">
      <button type="submit" class="btn btn-primary pull-right">Sign In</button>
    </div>
  </form>
</div>
</div>