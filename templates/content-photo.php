<?php
/**
 * @package MF2_S
 * Loop/Archive View For the Photo Post Kind
 */

if (!has_post_thumbnail() )
    {
	get_template_part('templates/content-single');
    }
else {
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); mf2_s_semantics("post"); ?>>
        <?php get_template_part( 'templates/entry', 'header' ); ?>
	<?php
	    // If the photo has a featured image, display a summary with the post thumbnail on index/archives		  
	  echo '<div class="entry-summary p-summary" itemprop="description">';
	  $size = 'medium';
	  $link = '<a href="' . get_the_permalink() . '" title="' . esc_attr(strip_tags(get_the_title() ) ) . '">';  
	  echo $link;
	  echo '<figure class="entry-media">';
          $arg = array (
		'class' => 'photo u-photo'
		);
	  the_post_thumbnail( $size, $arg );  
	  echo '</a>';        
	  echo '<figcaption>' . get_post(get_post_thumbnail_id())->post_excerpt . '</figcaption></figure>';
	  echo '</div>';
	  get_template_part( 'templates/entry', 'footer' ); 
?>
</article><!-- #post-## -->
<?php } ?>
