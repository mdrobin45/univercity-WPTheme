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
                    <p>From single.php file</p>
                </div>
                </div>
            </div>

            <div class="container container--narrow page-section">
            <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                        <?php
                            $author_ID = get_the_author_meta('ID');
                            $author_name = get_the_author_meta('display_name', $author_ID);
                            $author_url = get_author_posts_url($author_ID);
                            $archive_link = get_post_type_archive_link('event');
                            $post_date = get_the_date('d F Y');
                            $post_categories = get_the_category();

                            if(is_single()){ ?>
                                <a class="metabox__blog-home-link" href="<?php echo $archive_link; ?>"><i class="fa fa-home" aria-hidden="true"></i>All Events</a> 
                                <span class="metabox__main"><?php the_title();?></span>
                            <?php }
                        ?>
                    </p>
                </div>
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