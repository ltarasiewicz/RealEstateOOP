<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php twentyfourteen_post_thumbnail(); ?>

	<header class="entry-header">
		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && twentyfourteen_categorized_blog() ) : ?>
		<div class="entry-meta">
			<span class="cat-links"><?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentyfourteen' ) ); ?></span>
                        
                </div>
		<?php
                    
			endif;

			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			endif;
		?>

		<div class="entry-meta">
			<?php
				if ( 'post' == get_post_type() )
					twentyfourteen_posted_on();

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>
			<?php
				endif;

				edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if ( is_search() ) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php    
                        // Show post metadata

                        $price = get_post_meta( get_the_ID(), "real_estate_price", true);
                        
                        
                        echo "<p>Cena: " . $price . "zł</p>";

                        $area = get_post_meta( get_the_ID(), "real_estate_area", true);
                        echo "<p>Metraż: " . $area . "m<sup>2</sup></p>";

                        $address = get_post_meta( get_the_ID(), "real_estate_address", true);
                        echo "<p>Adres: " . $address . "</p>";
                        
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyfourteen' ) );
                        
                        
                        // Use a helper function to retrieve image attachments for the current post
                        
                        $currentPostID = get_post(get_the_ID());                                             
                        $attachments = getPostAttachments($currentPostID);

                        $x = 0;
                        
                        foreach ($attachments as $attachment) {                    
                            $images[$x] = wp_get_attachment_image($attachment->ID, 'medium');
                            $imageIDs[$x] = $attachment->ID;                    
                        ?>
                            <div id="pictureBox">
                                <div><?php echo $images[$x]; ?></div>
                            </div>
                        <?php
                            $x++;                  
                        }                                          
                        

			
                        wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfourteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<?php the_tags( '<footer class="entry-meta"><span class="tag-links">', '', '</span></footer>' ); ?>
</article><!-- #post-## -->
