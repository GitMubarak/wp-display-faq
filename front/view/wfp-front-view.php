<?php
global $post;

$wfp_arr = array(
                  'post_type' => 'wfp_faq',
                  'post_status' => 'publish',
                  'order' => 'DESC',
                  'meta_query' => array(
                                        'relation' => 'and',
                                          array(
                                            'key' => 'wfp_status',
                                            'value' => 'active',
                                            'compare' => '='
                                          ),
                                      ),
                );

$tiny_bar_plus = new WP_Query( $wfp_arr );

while( $tiny_bar_plus->have_posts() ) : $tiny_bar_plus->the_post();
  ?>
  <button class="wfp-collapsible"><?php the_title(); ?></button>
  <div class="wfp-content">
    <p>
      <?php the_content(); ?>
    </p>
  </div>
  <?php
endwhile;
?>