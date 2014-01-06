<div class="pure-u-1" id="main">
    <div class="email-content">
        <div class="email-content-header pure-g">
        
            <div class="pure-u-1-2">
                <h1 class="email-content-title"><?php echo $category['name']?></h1>
                <p class="email-content-subtitle">
                    <?php echo $category['description']?>
                </p>
            </div>
            <div class="pure-u-1-2 email-content-controls">
            </div>
        </div>
        <div class="email-content-body pure-g">
            <div class="pure-u-1-2">
              <form action="<?php echo $this->config->item('full_url') . '/gallery/update_this_item';?>" method="post" class="pure-form pure-form-aligned">
                <fieldset>
                    <legend>Update Item</legend>
                    <div class="pure-control-group">
                        <label for="name">Item Name</label>
                        <input id="name" name="" type="text" value="<?php echo $item['name'];?>">
                    </div>
                    <div class="pure-control-group">
                        <label for="description">Description</label>
                        <input id="description" name="description" type="text" value="<?php echo $item['description'];?>">
                    </div>
                    <div class="pure-control-group">
                        <label for="price">Price</label>
                        <input id="price" name="price" type="number" value="<?php echo $item['price'];?>">
                    </div>
                </fieldset>
                <button type="submit" class="pure-button pure-button-small pure-button-primary">Update</button>
              </form>  
            </div>
            <div class="pure-u-1-2">
                <div class="item_edit">
                    <img class="img-rounded" src="<?php echo $this->config->item('base_url') . '/img/gallery_item/' . $item['resource_url'];?>">
                </div>
            </div>
        </div>
    </div>
</div>