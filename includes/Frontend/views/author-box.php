<div class="mrhab-box">

    <div class="mrhab-content">

        <div class="mrhab-avatar">
            <?php echo get_avatar( $author->ID, 70 ); ?>
        </div>

        <div class="mrhab-info">
            <div class="mrhab-name"><a href="<?php echo get_author_posts_url( $author->ID ); ?>"><?php echo $author->display_name; ?></a></div>

            <div class="mrhab-bio"><?php echo wpautop( wp_kses_post( $social_media_info['bio'] ) ); ?></div>

            <ul class="mrhab-contacts">
                <?php if ( $social_media_info['linkedin'] ) { ?>
                    <li><a href="<?php echo esc_url( $social_media_info['linkedin'] ); ?>" target="_blank" rel="noopener noreferrer"><img class="mrhab-icon" src="<?php echo MRHAB_ASSETS; ?>/icons/linkedin.svg" alt=""></a></li>
                <?php } ?>

                <?php if ( $social_media_info['github'] ) { ?>
                    <li><a href="<?php echo esc_url( $social_media_info['github'] ); ?>" target="_blank" rel="noopener noreferrer"><img class="mrhab-icon" src="<?php echo MRHAB_ASSETS; ?>/icons/github.svg" alt=""></a></li>
                <?php } ?>

                <?php if ( $social_media_info['twitter'] ) { ?>
                    <li><a href="<?php echo esc_url( $social_media_info['twitter'] ); ?>" target="_blank" rel="noopener noreferrer"><img class="mrhab-icon" src="<?php echo MRHAB_ASSETS; ?>/icons/twitter.svg" alt=""></a></li>
                <?php } ?>

                <?php if ( $social_media_info['facebook'] ) { ?>
                    <li><a href="<?php echo esc_url( $social_media_info['facebook'] ); ?>" target="_blank" rel="noopener noreferrer"><img class="mrhab-icon" src="<?php echo MRHAB_ASSETS; ?>/icons/facebook.svg" alt=""></a></li>
                <?php } ?>
            </ul>
        </div>

    </div>
</div>
