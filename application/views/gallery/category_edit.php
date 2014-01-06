<div class="pure-u-1" id="main">
    <div class="email-content">
        <div class="email-content-header pure-g">
            <form action="<?php echo $this->config->item('full_url') . '/gallery/update_this_category';?>" method="post">
            <div class="pure-u-1-2">
                <h1 class="email-content-title"><input name="name" id="name" type="text" value="<?php echo $category['name']?>"></h1>
                <p class="email-content-subtitle">
                    <input name="description" id="description" type="text" value="<?php echo $category['description']?>">
                    <input type="hidden" name="id" id="id" value="<?php echo $category['id']?>">
                </p>
            </div>
            <div class="pure-u-1-2 email-content-controls">
                <button class="pure-button secondary-button">Save</button>
            </div>
            </form>
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
                            <td><a href="<?php echo $this->config->item('full_url') . '/' ?>"><?php echo $item['name']; ?></a></td>
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