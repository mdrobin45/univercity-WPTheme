<?php get_header();?>
<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_template_directory_uri().'/images/library-hero.jpg'?>)"></div>
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
        <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
      </div>
    </div>

    <div class="full-width-split group">
      <div class="full-width-split__one">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
            <?php
                // Custom query for event post type
                $args = array(
                    'post_type' => 'event',
                    'posts_per_page' => 3,
                    'meta_key' => 'select_event_date',
                    'orderby' => 'meta_value_num',
                    'order' => 'ASC'
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
          <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event'); ?>" class="btn btn--blue">View All Events</a></p>
        </div>
      </div>
      <div class="full-width-split__two">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
            <?php
                // Custom query for blog posts 
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 2
                );
                $custom_query = new WP_Query($args);

                // Retrieve blog post by custom query
                if($custom_query->have_posts()){
                     while($custom_query->have_posts()){ 
                        $custom_query->the_post(); 
                            // Variables
                            $post_date_month = get_the_date('M');
                            $post_date = get_the_date('d');
                        ?>
                        <div class="event-summary">
                            <a class="event-summary__date event-summary__date--beige t-center" href="#">
                            <span class="event-summary__month"><?php echo $post_date_month?></span>
                            <span class="event-summary__day"><?php echo $post_date; ?></span>
                            </a>
                            <div class="event-summary__content">
                            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <p><?php the_excerpt(); ?> <a href="<?php the_permalink();?>" class="nu gray">Read more</a></p>
                            </div>
                        </div>
                    <?php }
                }
            ?>

          <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('post');?>" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
      </div>
    </div>

    <div class="hero-slider">
      <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_template_directory_uri().'/images/bus.jpg';?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Transportation</h2>
                <p class="t-center">All students have free unlimited bus fare.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_template_directory_uri().'/images/apples.jpg';?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">An Apple a Day</h2>
                <p class="t-center">Our dentistry program recommends eating apples.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_template_directory_uri().'/images/bread.jpg';?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Food</h2>
                <p class="t-center">Fictional University offers lunch plans for those in need.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
      </div>
    </div>
<?php get_footer();?>