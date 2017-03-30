<li class="accordion__li">
    <a href="<?php the_permalink(); ?>" class="accordion__img">
        <img class="" src="<?php echo get_the_post_thumbnail_url( get_the_ID(), $size = 'medium_large' ) ?>" alt="Image Alt" />
        <span
            class="hostel-name"
            <?php
            if( !empty(get_field('title_bg_acc')) ) {
                echo "style='background-color:" . get_field('title_bg_acc') . "'";
            }
            ?>
        ><?php echo strtoupper(get_the_title()); ?></span>
        <?php if( !empty(get_field('quote'))): ?>
            <span class="quote">
                <p class="caption">“ <?php the_field('quote') ?> ”</p>
                <?php if( !empty(get_field('quote_author'))): ?>
                    <p class="by"><?php the_field('quote_author') ?></p>
                <?php endif; ?>
            </span>
        <?php endif; ?>
    </a>
</li>
