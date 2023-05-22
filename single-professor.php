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
                    <p>From single professor.php file</p>
                </div>
                </div>
            </div>

            <div class="container container--narrow page-section">
                <div class="generic-content">
                    <?php the_content();?>
                    <?php
                    $relational_subject = get_field('relational_subject');
                    if($relational_subject){
                        echo "<hr class='section-break'>";
                    echo "<h2 class='headline headline--medium'>Relational Subject(s)<h2>";
                    echo "<ul class='link-list min-list'>";
                    foreach($relational_subject as $subject){?>
                        <li><a href="<?php the_permalink($subject); ?>"><?php echo get_the_title($subject)?></a></li>
                    <?php }
                    echo "</ul>";
                    }
                    
                    ?>
                </div>
            </div>
        <?php }
    }
?>
<?php get_footer();?>