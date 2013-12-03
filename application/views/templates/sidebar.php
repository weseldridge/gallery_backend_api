<div class="sidebar">
<div class="col-md-3 col-lg-3">
  
   <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
            User
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse out">
        <div class="panel-body">
          <ul>
           <li><a href=<?php echo $this->config->item('full_url') . '/user' ?> >Dashboard</a></li>
           <li><a href=<?php echo $this->config->item('full_url') . '/user/change_email' ?> >Change Email</a></li>
           <li><a href=<?php echo $this->config->item('full_url') . '/user/change_password' ?> >Chage Password</a></li>
         </ul>
       </div>
     </div>
   </div>
   <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Gallary
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse out">
      <div class="panel-body">
        <ul>
        	<li><a href=<?php echo $this->config->item('full_url') . '/gallery_item' ?> >Dashboard</a></li>
        	<li><a href=<?php echo $this->config->item('full_url') . '/category' ?> >Categories</a></li>
        	<li><a href=<?php echo $this->config->item('full_url') . '/gallery_item/add' ?> >Add Item</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>
</div>