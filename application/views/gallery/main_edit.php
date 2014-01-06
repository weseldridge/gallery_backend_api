<div class="pure-u-1" id="main">
    <div class="email-content">
        <div class="email-content-header pure-g">
            <form class="pure-form" action="<?php echo $this->config->item('full_url') . '/category/add_this_category';?>" method="post">    
                <div class="pure-u-1-2">

                    <h1 class="email-content-title"><input type="text" name="name" id="name" value="<?php echo $current_gallery['name']?>"></h1>
                    <p class="email-content-subtitle">
                        <input type="text" name="description" id="description" value="<?php echo $current_gallery['description']?>">
                        <input type="hidden" value="<?php echo $current_gallery['id'];?>" name="gallery_id" id="gallery_id">
                    </p>

                </div>
                <div class="pure-u-1-2 email-content-controls">
                    <button type="submit" class="pure-button pure-button-small pure-button-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class="email-content-body pure-g">
        <div class="pure-u">
            <?php if($categories): ?>
            <table class="pure-table pure-table-horizontal">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $category): ?>
                    <tr>
                        <td><a href="<?php echo $this->config->item('full_url') . '/gallery/category/' . $category['id'] . '/' . $current_gallery['id']; ?>"><?php echo $category['name']; ?></a> </td>
                        <td><?php echo $category['description']; ?></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>

</div>
</div>
</div>
</div>