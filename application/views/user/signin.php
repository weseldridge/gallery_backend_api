
  <div class="pure-u-1-2">
    <div class="side_in">
    <form class="pure-form pure-form-aligned" action=<?php echo $this->config->item('full_url') . "/user/sign_me_in" ?> method="post">
      <fieldset>
        <legend>Please Sign In</legend>
          <div class="pure-control-group">
            <label for="username">Username</label>
            <input id="username" name="username" type="text" placeholder="Username">
        </div>

        <div class="pure-control-group">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" placeholder="Password">
        </div>

        <div class="pure-controls">
            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
      </fieldset>
    </form>
  </div>
</div>