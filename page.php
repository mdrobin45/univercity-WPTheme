<?php
get_header();
    if(have_posts()){
        while(have_posts()){
            the_post(); ?>
            <div class="page-banner">
                <div class="page-banner__bg-image" style="background-image: url(images/ocean.jpg)"></div>
                <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php the_title();?></h1>
                <div class="page-banner__intro">
                    <p>Fom page.php file</p>
                </div>
                </div>
            </div>
            <div class="container container--narrow page-section">
                <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                        <?php
                            $parent_page = wp_get_post_parent_id();
                            if($parent_page !== 0){ ?>
                                <a class="metabox__blog-home-link" href="<?php the_permalink($parent_page)?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($parent_page);?></a> <span class="metabox__main"><?php the_title()?></span>
                            <?php }
                        ?>
                    </p>
                </div>
                <?php
                    $parent_page = get_the_ID();
                    $child_page = get_pages(array('child_of' => $parent_page));
                    if(count($child_page) > 0){ ?>
                        <div class="page-links">
                            <h2 class="page-links__title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            <ul class="min-list">
                                <?php
                                    $args = array(
                                        'child_of' => get_the_ID(),
                                        'title_li' => ''
                                    );
                                    wp_list_pages($args);
                                ?>
                            </ul>
                        </div>
                    <?php }
                ?>
                <div class="generic-content">
                    <p><?php the_content();?></p>
                </div>
            </div>
        <?php }
    }
get_footer();
?>