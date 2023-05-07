<?php get_header();?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(images/ocean.jpg)"></div>
        <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">All Events
        </h1>
        <div class="page-banner__intro">
            <p>From Event archive.php file</p>
        </div>
        </div>
    </div>
    
    <div class="container container--narrow page-section">
        <?php
            if(have_posts()){
                while(have_posts()){
                    the_post(); ?>
                    <div class="event-summary">
                        <?php
                            $event_date_string = get_field('select_event_date');
                            $event_date = new DateTime(get_field('select_event_date'));
                            
                        ?>
                        <a class="event-summary__date t-center" href="#">
                        <span class="event-summary__month"><?php echo $event_date->format('M');?></span>
                        <span class="event-summary__day"><?php echo $event_date->format('d')?></span>
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