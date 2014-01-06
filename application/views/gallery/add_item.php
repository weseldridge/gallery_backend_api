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
            <div class="pure-u">
                <form class="pure-form pure-form-aligned" method="post" action="<?php echo $this->config->item('full_url') . '/gallery/add_this_item';?>" enctype="multipart/form-data">
                    <fieldset>
                        <legend>Add a new item to <?php echo $category['name']; ?></legend>
                    
                    <div class="pure-control-group">
                        <label for"name">Item Name</label>
                        <input type="text" name="name" id="name" placeholder="Item Name">
                    </div>
                    <div class="pure-control-group">
                        <label for"description">Item Description</label>
                        <input type="text" name="description" id="description" placeholder="Description">
                    </div>
                    <div class="pure-control-group">
                        <label for"userfile">Upload</label>
                        <input type="file" name="userfile" id="userfile">
                    </div>
                    <div class="pure-control-group">
                        <label for"price">Item Price</label>
                        <input type="number" name="price" id="price" placeholder="Price">
                    </div>
                    <div class="pure-control-group">
                        <label for"is_sold">Is Sold</label>
                        <select name="is_sold" id="is_sold">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    </fieldset>
                    <input type="hidden" value="<?php echo $category['id']?>" name="cat_id" id="cat_id">
                    <button type="submit" class="pure-button pure-button-small pure-button-primary">Add Item</button>
                </form>
            </div>
        </div>
    </div>
</div>