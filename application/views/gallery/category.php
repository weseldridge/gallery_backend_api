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
                <button class="pure-button secondary-button"><a href="<?php echo $this->config->item('full_url') . '/gallery/edit_category/' . $category['id'] . '/' . $gallery_id;?>">Edit</a></button>
                <button class="pure-button secondary-button"><a href="<?php echo $this->config->item('full_url') . '/gallery/add_item/' . $category['id'] . '/' . $gallery_id;?>">Add Item</a></button>
            </div>
        </div>
        <div class="email-content-body pure-g">
            <div class="pure-u">
                <?php if($category_items): ?>
                <table class="pure-table  pure-table-horizontal">
                    <thead>
                        <tr>
                            <th>Preview</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Is Sold</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php foreach($category_items as $item): ?>
                        <tr class="category_list">
                            <td><img src="<?php echo $this->config->item('base_url') . 'img/gallery_item/' . $item['resource_url']; ?>"></td>
                            <td><a href="<?php echo $this->config->item('full_url') . '/gallery/edit_item/' . $item['id'] . '/' . $category['id'] .'/' . $gallery_id;?>"><?php echo $item['name']; ?></a></td>
                            <td><?php echo $item['description']; ?></td>
                            <td><?php echo $item['price']; ?></td>
                            <?php if($item['is_sold']): ?>
                            <td>Yes</td>
                            <?php else: ?>
                            <td>No</td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                        
                    </tbody>
                </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>