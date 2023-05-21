<?php get_header();?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(images/ocean.jpg)"></div>
        <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"> All Subjects
        </h1>
        <div class="page-banner__intro">
            <p>From subject archive.php file</p>
        </div>
        </div>
    </div>
    
    <div class="container container--narrow page-section">
    <ul class="link-list min-list">
        <?php
            if(have_posts()){
                while(have_posts()){
                    the_post(); ?>
                    
                        <li><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
                        <!-- <hr> -->
                    
                <?php }
            }
        ?>
        </ul>
        <?php echo paginate_links();?>
    </div>
<?php get_footer(); ?>