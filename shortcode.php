<?php 

    /* POSTS-SHORTCODE*/

  function print_latest_posts(){
    ob_start();
   $query = new WP_Query( array( 
    'post_category' => 'news',
    'posts_per_page' => '3'
     ) );

        if ( $query->have_posts() ) {

            while ( $query->have_posts() ) :
              ?> 
            <div class="home-post-article">
            <?php 
               $query->the_post();               
               the_post_thumbnail(array(360, 265));
               echo "<h3>" . get_the_title() . "</h3>";
               the_excerpt();
               $post_url = get_the_permalink();
               ?>
        <a href="<?= $post_url ?>"><button class="et_pb_button">Read more</button></a>
                </div>
               <?php 
                
            endwhile;
            
            wp_reset_postdata();

        }
        return ob_get_clean();
  }

  add_shortcode('latestposts','print_latest_posts');