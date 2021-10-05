<?php
/**
* Template Name: My first page
*
*/
?>
<?php get_header(); ?>
<div class="my-first-page">
  <h2>MY first page roxx</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi ut, earum facilis perferendis unde quis placeat fuga aliquid ex, dolore harum tenetur, totam doloribus deleniti modi voluptatem quibusdam asperiores voluptate.</p>


    <!-- POST -->
    <?php
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 100,
      'order' => 'asc',
      'orderby' => 'title',
      'post_status' => 'publish',
      'ignore_sticky_posts' => 1,
    );
    ?>
    <?php $the_query = new WP_Query( $args ); ?>
    <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php the_title(); ?>
      <?php endwhile; ?>
      <!-- end of the loop -->
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
 

  <p class="page-description"><?php the_field('description'); ?></div>
  <?php 
  $image = get_field('image');
  if( !empty( $image ) ): ?>
    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
  <?php endif; ?>
</div>
<?php get_footer(); ?>