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
                </div>
            </div>
        <?php }
    }
?>
<?php get_footer();?>