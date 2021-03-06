<?php get_header(); ?>

<div id="banner" class="inactive"></div>
<main id="main">
    <a class="section-title">Projects</a>

            <section id="posts-section">
<!-- regular post section -->
            <?php 
                while (have_posts()) {
                    the_post();
            ?>
            <!-- For each card of post -->
            <div class="card">
                    
                    <?php echo the_category('');?>                          
                    
                    <a href="<?php echo the_permalink(); ?>">
                        <h2 class="post-title"><?php the_title(); ?></h2>
                    </a>
                    <a class="post-time">
                        <?php echo the_time('Y-m-d');?>
                    </a>
                    <div class="post-excerpt">
                        <?php echo wp_trim_words(get_the_excerpt(), 150); ?>
                    </div>
                    <div class="post-tags">
                        <?php
                            echo get_the_tag_list(' ');                        
                        ?>  
                    </div>
                    <a href="<?php echo the_permalink(); ?>"class="btn-readmore">Read more</a>
                </div>
<!-- End of one card -->          
            <?php
                }
                wp_reset_query();
            ?>
                
            </section>
</main>

<div class="pagination">
    <?php echo paginate_links(); ?>
</div>

<?php get_footer(); ?>