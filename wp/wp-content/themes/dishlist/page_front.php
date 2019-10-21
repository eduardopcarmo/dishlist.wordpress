<?php
/**
 * Template Name: Front-Page template
 *
 */
?>
<?php
get_header();?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- primary div -->

<!-- #Feature Posts -->
	<div id="postPrimary" class="postpri-area">
		<main id="postmain" class="postpri-main">
		<h2 class="catogoryName">Features</h2>
<?php
	$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'category_name' => 'feature',
    'posts_per_page' => 10,
);
$arr_posts = new WP_Query( $args );
 // Get all our posts, and start the counter
$postNumber = 0;
if ( $arr_posts->have_posts() ) :
	echo '<div class="row">';
	echo '<div class="col-1">
		
	</div>';
    while ( $arr_posts->have_posts() ) :
		$arr_posts->the_post();
		 /////////////////////////////////////////
		 ////////////////////////////////////////
		   // If we're at the first post, or just before a post number that is divisible by three then we start a new row
		   
		$postClass = '';
		if ($postNumber == 0 || (($postNumber) % 2 == 0))  {
			$postClass .= "col-2";
		} else {
			$postClass .= "col-3";
		}
		// Choose the post class based on what number post we are 
		
		echo '<div class="'.$postClass.'">';?>
		<article id="post-<?php the_ID(); ?>" class="postshow" <?php post_class(); ?>>
            <?php
			if ( has_post_thumbnail() ) :?>
			<div class="post-row">
			<?php
			echo '<div class="post-thumb">';
				the_post_thumbnail();
			echo '</div>';
            endif;
            ?>
            <header class="entry-header">
                <h3 class="entry-title"><?php the_title(); ?></h3>
			</header>
			
            <div class="entry-content">
                <?php the_excerpt(); ?>
                
			</div>
			</div><!-- post-row -->
		</article>
		<?php
		echo "</div>";
	
		$postNumber++; // Increment counter
		////////////////////////
		/////////////////////////
		?>
        <?php
	endwhile;
	echo '</div>'; // close row tag
endif;?>

		</main><!-- #postmain -->
	</div><!-- #postprimary -->
	<div id="primary" class="ad-area">
		<div class="adv">
		</div>
		<div class="ad-content">
		<?php
		$args = array(
    	'post_type' => 'post',
    	'post_status' => 'publish',
    	'category_name' => 'Advertisement',
    	'posts_per_page' => 2,
		);
		$arr_posts = new WP_Query( $args );
		if ( $arr_posts->have_posts() ) :
			while ( $arr_posts->have_posts() ) :
				$arr_posts->the_post();?>
				<article id="post-<?php the_ID(); ?>" class="postshow" <?php post_class(); ?>>
				<?php
				if ( has_post_thumbnail() ) :
					the_post_thumbnail();
				endif;
				?>
				<header class="entry-header">
					<h2 class="entry-title"><?php the_title(); ?></h2>
				</header>
				
				<div class="entry-content">
					<?php the_excerpt(); ?>
				</div>
				
				</article>
			<?php
			endwhile;
	endif;?>
		<button class="ad-button">App Store</button>
		<button class="ad-button">Android</button>
		</div><!--.ad-content-->
	</div><!-- .ad-area -->
<?php
get_sidebar();
get_footer();