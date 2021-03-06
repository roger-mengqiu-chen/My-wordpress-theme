<?php get_header(); ?>


<div id="banner" class="inactive"></div>
<main id="main">
            <a class="section-title">Search Results for "<?php echo get_search_query(); ?>"</a>
       
            <?php if(have_posts()) { ?>
        
            <section id="posts-section">

            <?php 
               
                while (have_posts()) {
                    the_post();
            ?>
            
                <div class="card">
                    
                    <?php echo the_category('');?>
                    <?php 
                        $type = get_post_type();
                        if ($type == 'project') {
                            echo '<div class="post-type">' . ucfirst($type) . '</div>';
                        }
                    ?>
                    
                    <a href="<?php echo the_permalink(); ?>">
                        <h2 class="post-title"><?php the_title(); ?></h2>
                    </a>
                    <a class="post-time">
                        <?php echo the_time('Y-m-d');?>
                    </a>
                    <div class="post-excerpt">
                        <?php echo wp_trim_words(get_the_excerpt(), 30); ?>
                    </div>
                    <div class="post-tags">
                        <?php
                            echo get_the_tag_list(' ');                        
                        ?>  
                    </div>
                    <a href="<?php echo the_permalink(); ?>"class="btn-readmore">Read more</a>
                </div>
     
            <?php
                }
                wp_reset_query();
            ?>
                
            </section>
            <?php } else {
                echo '<div id="no-search-result">Sorry, No Results Found</div>';
                echo '<div id="search-again">';
				get_search_form(); 
				echo '</div>';
                } 
            ?>
            
            
        
</main>

<div class="pagination">
    <?php echo paginate_links(); ?>
</div>

<?php get_footer(); ?>