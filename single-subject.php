<?php get_header();?>
<?php
    if(have_posts()){
        while(have_posts()){
            the_post(); ?>
            <div class="page-banner">
                <div class="page-banner__bg-image" style="background-image: url(images/ocean.jpg)"></div>
                <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php the_title();?></h1>
                <div class="page-banner__intro">
                    <p>From single subjct.php file</p>
                </div>
                </div>
            </div>

            <div class="container container--narrow page-section">
            <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                        <?php
                            $author_ID = get_the_author_meta('ID');
                            $author_name = get_the_author_meta('display_name', $author_ID);
                            $posts_page_ID = get_option('page_for_posts');
                            $post_date = get_the_date('d F Y');
                            $post_categories = get_the_category();

                            if(is_single()){ ?>
                                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('subject'); ?>"><i class="fa fa-home" aria-hidden="true"></i>All Subjects</a> 
                                <span class="metabox__main"><?php the_title();?></span>
                            <?php }
                        ?>
                    </p>
                </div>
                <div class="generic-content">
                    <?php the_content();?>
                    <?php
                        // Custom query for event post type
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type' => 'professor',
                            'orderby' => 'title',
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => "relational_subject",
                                    'compare' => "LIKE",
                                    'value' => '"'.get_the_ID().'"'
                                )
                            )
                        );
                        $professor_custom_query = new WP_Query($args);
                        if($professor_custom_query->have_posts()){
                            echo "<hr class='section-break'>";
                            echo '<h2>'. get_the_title(). ' Professors</h2>';
                            // Event html structure
                            if($professor_custom_query -> have_posts()){
                                while($professor_custom_query -> have_posts()){
                                    $professor_custom_query -> the_post(); ?>
                                    <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                            <?php }
                            }
                        }
                        ?>
                        
                    <?php
                    wp_reset_postdata();
                        // Custom query for event post type
                        $today = date('Ymd');
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type' => 'event',
                            'meta_key' => 'select_event_date',
                            'orderby' => 'meta_value_num',
                            'order' => 'ASC',
                            'meta_query' => array(
                                array(
                                    'key' => 'select_event_date',
                                    'compare' => '>=',
                                    'value' => $today
                                ),
                                array(
                                    'key' => "relational_subject",
                                    'compare' => "LIKE",
                                    'value' => '"'.get_the_ID().'"'
                                )
                            )
                        );
                        $custom_query = new WP_Query($args);
                        if($custom_query->have_posts()){
                            echo "<hr class='section-break'>";
                            echo "<h2>Upcoming Events</h2>";
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
                        }
                        ?>
                </div>
            </div>
        <?php }
    }
?>
<?php get_footer();?>