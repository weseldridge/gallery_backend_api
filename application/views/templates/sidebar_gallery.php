<div class="pure-u-1" id="list">
        <div class="email-item email-item-selected pure-g">
            <div class="pure-u">
                <form class="pure-form" method="post" action="<?php echo $this->config->item('full_url') . '/gallery/add_this_gallery';?>" >
                    <div>
                        <input type="text" placeholder="Gallery Name" name="name" id="name">
                        <button type="submit" class="pure-button pure-button-small pure-button-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
        <?php if($galleries): ?>
        <?php foreach ($galleries as $gallery): ?>
        <div class="email-item <?php if($gallery['id'] == $gallery_id){echo 'email-item-selected email-item-unread';}?> pure-g">
            <div class="pure-u">
                <img class="email-avatar" height="64" width="64" src="<?php if($gallery['is_active']){echo $this->config->item('base_url') . 'img/is_active_gallery.png';}else{echo $this->config->item('base_url') . 'img/not_active_gallery.png';}?>">
            </div>
            <div class="pure-u-3-4">
                <h5 class="email-name"><a href="<?php echo $this->config->item('full_url') . '/gallery/detail/' . $gallery['id'];?>"><?php echo $gallery['name'];?></a></h5>
                <p class="email-desc">
                    <?php echo substr($gallery['name'],0,100);?>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>