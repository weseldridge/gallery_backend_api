<div class="pure-u-1" id="main">
    <div class="email-content">
        <div class="email-content-header pure-g">
            <div class="pure-u-1-2">
                <h1 class="email-content-title">Error</h1>
                <p class="email-content-subtitle">
                    Something went <strong>wrong!</strong> The out below should help.
                </p>
            </div>
        </div>
        <div class="email-content-body">
            <?php if($view_msg['error_code'] != 0): ?>
            <div class="<?php echo $view_msg['type']; ?>">
                <div>
                    <strong><?php echo 'Error Code: ' . $view_msg['error_code'] . '<br>Error Title: ' . $view_msg['error_title']; ?></strong>
                </div>
                <div>
                    <?php echo validation_errors(); ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>