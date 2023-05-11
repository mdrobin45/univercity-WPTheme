<?php get_header();?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(images/ocean.jpg)"></div>
        <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Past Events</h1>
        <div class="page-banner__intro">
            <p>From past event.php file</p>
        </div>
        </div>
    </div>
    
    <div class="container container--narrow page-section">
        <?php
        // Custom query for event post type
        $today = date('Ymd');
        $args = array(
            'posts_per_page' => -1,
            'post_type' => 'event',
            'meta_key' => 'select_event_date',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'meta_query' => array(
                array(
                    'key' => 'select_event_date',
                    'compare' => '<=',
                    'value' => $today
                )
            )
        );
        $custom_query = new WP_Query($args);
            // Event html structure
            if($custom_query -> have_posts()){
                while($custom_query -> have_posts()){
                    $custom_query -> the_post(); ?>
                    <div class="event-summary">
                        <?php
                            $event_date_string = get_field('select_event_date');
                            
                            $event_date = new DateTime($event_date_string);
                            
                        ?>
                        <a class="event-summary__date t-center" href="#">
                        <span class="event-summary__month"><?php echo $event_date->format('M');?></span>
                        <span class="event-summary__day"><?php echo $event_date->format('d');?></span>
                        </a>
                        <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
                        <p><?php the_excerpt(); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                        </div>
                    </div>
                <?php }
            }
        ?>
        <?php echo paginate_links();?>
    </div>
<?php get_footer(); ?>