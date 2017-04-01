<li>
    <h2 tabindex="100" <?php
    if( !empty(get_field('title_bg_acc')) ) {
        echo "style='background-color:" . get_field('title_bg_acc') . "'";
    }
    ?>><span><?php echo strtoupper(get_the_title()); ?></span></h2>
    <div>
        <figure>
            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), $size = 'pu_hostels_2017-accordion-image' ) ?>" alt="image" />
            <?php if( !empty(get_field('quote'))): ?>
                <figcaption>
                    <p class="caption"><span class="quote-mark">“</span><?php the_field('quote') ?><span class="quote-mark">”</span></p>
                    <?php if( !empty(get_field('quote_author'))): ?>
                        <p class="by"><?php the_field('quote_author') ?></p>
                    <?php endif; ?>
                </figcaption>
            <?php endif; ?>
        </figure>
    </div>
</li>
