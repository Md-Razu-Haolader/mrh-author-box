<div class="wrap mrhab-enquiry-form" id="mrhab-enquiry-form">

    <form action="" method="post">

        <div class="form-row">
            <label for="name"><?php _e('Name', 'mrh-author-box'); ?></label>

            <input type="text" name="name" id="name" required />
        </div>

        <div class="form-row">
            <label for="email"><?php _e('Email', 'mrh-author-box'); ?></label>

            <input type="email" name="email" id="email" required />
        </div>

        <div class="form-row">
            <label for="message"><?php _e('Message', 'mrh-author-box'); ?></label>

            <textarea name="message" id="message" cols="30" rows="10" required></textarea>
        </div>

        <div class="form-row">
            <?php wp_nonce_field("mrhab-enquiry-form"); ?>

            <input type="hidden" name="action" value="mrhab_enquiry">
            <input type="submit" name="send_enquiry" value="<?php esc_attr_e('Send', 'mrh-author-box'); ?>">
        </div>
    </form>
</div>
