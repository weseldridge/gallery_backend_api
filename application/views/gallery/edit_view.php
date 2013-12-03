<div class="col-sm-9">
<div class="row">
 <form class="form-horizontal" action=<?php echo $this->config->item('full_url') . "/gallery_item/edit_gallery_item/" . $gallery_item['id']; ?> method="post">
  <fieldset>
  	<legend>Add New Gallery Item</legend>
    <div class="form-group">
      <label for="title" class="col-sm-3 control-label">Title</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="title" id="title" value=<?php echo $gallery_item['title']; ?>>
      </div>
    </div>
    <div class="form-group">
      <label for="url" class="col-sm-3 control-label">Image URL</label>
      <div class="col-sm-4">
        <input type="text"  class="form-control" name="url" id="url" value=<?php echo $gallery_item['url']; ?>>
      </div>
    </div>
    <div class="form-group">
      <label for="caption" class="col-sm-3 control-label">Caption</label>
      <div class="col-sm-4">
        <textarea type="text" class="form-control" name="caption" id="caption">
          <?php echo $gallery_item['caption']; ?>
        </textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="price" class="col-sm-3 control-label">Price</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="price" id="price" value=<?php echo $gallery_item['price']; ?>>
      </div>
    </div>
    <br>
    <div class="form-group">
      <label for="category" class="col-sm-3 control-label">Category</label>
      <div class="col-sm-4">
      </div>
    </div>
    <br>
    <div class="form-group">
      <label for="to_show" class="col-sm-3 control-label">Visible</label>
      <div class="col-sm-4">
        <input type="radio" name="to_show" value="1"><p class="form-radio-txt">Yes</p>
        <input type="radio" name="to_show" value="0"><p class="form-radio-txt"> No</p>
      </div>
    </div>
    <br>
    <div class="form-group">
      <label for="is_sold" class="col-sm-3 control-label">Is Sold?</label>
      <div class="col-sm-4">
        <input type="radio" name="is_sold" value="1"><p class="form-radio-txt">True</p>
        <input type="radio" name="is_sold" value="0"><p class="form-radio-txt"> False</p>
      </div>
    </div>
    <br>
 </fieldset>
 <div>
  <div class="col-sm-8">
    <button type="submit" class="btn btn-primary pull-right">Update Item</button>
  </div>
 </div>
</form>
</div>
</div>