<li>
    <a href="<?php echo get_permalink() ?>">
        <?php
            $date = null;
            if(!empty(get_field('issue_date'))) {
                $issue_date = new DateTime(get_field('issue_date'));
                $date = $issue_date->format('M-d-Y');
            } else {
                $date = get_the_modified_date('M-d-Y');
            }
            $date =  explode("-", $date);
        ?>
        <span class="date">
            <span class="month"><?php echo $date[0] ?></span>
            <span class="day"><?php echo $date[1] ?></span>
            <span class="year"><?php echo $date[2] ?></span>
        </span>
        <?php if(!empty(get_field('posted_by'))): ?><span class="issued-by" data-default-font-size="14"><?php the_field('posted_by')  ?><?php endif; ?></span>
        <span class="content" data-default-font-size="14"><?php the_title(); ?></span>
    </a>
</li>
