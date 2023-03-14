<?php get_header();?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(images/ocean.jpg)"></div>
        <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Welcome to out blog</h1>
        <div class="page-banner__intro">
            <p>Learn how the school of your dreams got started.</p>
        </div>
        </div>
    </div>
    
    <div class="container container--narrow page-section">
        <?php
            if(have_posts()){
                while(have_posts()){
                    the_post(); ?>
                    <?php
                        $author_id = get_the_author_meta('ID');
                        $author_name = get_the_author_meta('display_name', $author_id);
                        $author_link = get_author_posts_url($author_id);
                        $categories = get_the_category();
                    ?>
                    <div class="post-item">
                        <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        <div class="metabox">
                            <p>Posted by <a href="<?php echo $author_link; ?>"><?php echo $author_name; ?></a> on <?php echo get_the_date('d F Y');?> in 
                            <?php
                                foreach($categories as $category){
                                    echo '<a href="'.get_category_link($category -> term_id). '">'.$category -> name.", ". '</a>';
                                }
                            ?>
                        </p>
                        </div>
                        <div class="generic-content">
                            <?php the_excerpt(); ?>
                            <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
                        </div>
                    </div>
                <?php }
            }
        ?>
        <?php echo paginate_links();?>
    </div>
<?php get_footer(); ?>