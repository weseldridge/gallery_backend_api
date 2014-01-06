<div class="pure-u-1" id="main">
    <div class="email-content">
        <div class="email-content-header pure-g">
            <div class="pure-u-1-2">
                <h1 class="email-content-title"><?php echo $current_gallery['name']?></h1>
                <p class="email-content-subtitle">
                    <?php echo $current_gallery['description']?>
                </p>
            </div>
            <div class="pure-u-1-2 email-content-controls">
                <button class="pure-button secondary-button"><a href="<?php echo $this->config->item('full_url') . 'gallery/edit/' . $current_gallery['id'];?>">Edit</a></button>
                <?php if($current_gallery['is_active']): ?>
                <button class="pure-button secondary-button"><a href="<?php echo $this->config->item('full_url') . 'gallery/toggle/' . $current_gallery['id'];?>">Turn Off</a></button>
            <?php else: ?>
            <button class="pure-button secondary-button"><a href="<?php echo $this->config->item('full_url') . 'gallery/toggle/' . $current_gallery['id'];?>">Turn On</a></button>
        <?php endif; ?>
    </div>
</div>
</div>
<div class="email-content-body pure-g">
    <div class="pure-u">
        <table class="pure-table pure-table-horizontal">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form class="pure-form" action="<?php echo $this->config->item('full_url') . '/category/add_this_category';?>" method="post">
                        <td>id</td>
                        <td><input type="text" placeholder="Category Name" name="name" id="name"></td>
                        <td><input type="text" placeholder="Description" name="description" id="description"></td>
                        <input type="hidden" value="<?php echo $current_gallery['id'];?>" name="gallery_id" id="gallery_id">
                        <td><button type="submit" class="pure-button pure-button-small pure-button-primary">Add</button></td>
                    </form>
                </tr>
                <?php if($categories): ?>
                <?php foreach($categories as $category): ?>
                <tr>
                    <td><?php echo $category['id']; ?></td>
                    <td><?php echo $category['name']; ?></td>
                    <td><?php echo $category['description']; ?></td>
                    <td></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

</div>
</div>
</div>
</div>