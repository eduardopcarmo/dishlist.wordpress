<?php
get_header();?>
	<main id="main" class="site-main">
        <div class="main-area">
            <div class="main-animation">
                <h1>Dishlist</h1>
                <p>
                    Lorem Ipsum is simply dummy text of the 
                    printing and typesetting industry.
                </p>
                <p>
                    Lorem Ipsum is simply dummy text of the 
                    printing and typesetting industry.
                </p>
                <button class="btn btn-primary ">App Store</button>
                <button class="btn btn-primary ">Android</button>
            </div><!-- .main-animation div-->
        </div><!-- .main-area div -->


<!-- #Feature Posts -->
<section id="feature-sec">
        <div class="post-area">
            <img src="http://localhost:8000/wp-content/uploads/2019/10/berry.png" href="Berry in plate" class="bg-berry">
            <img src="http://localhost:8000/wp-content/uploads/2019/10/Intersection-14.png" href="Berry in plate" class="bg-dish2">
            <h2 class="catogoryName">Features</h2>
            <?php
	            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'category_name' => 'feature',
                'posts_per_page' => 10,
                );
                $arr_posts = new WP_Query( $args );
                // Get all our posts in "Feature Category", and start the counter
                $postNumber = 0;
                if ( $arr_posts->have_posts() ) :
	                echo '<div class="row">';
                    echo '<div class="col-1">
                    </div>';
                    while ( $arr_posts->have_posts() ) :
		                $arr_posts->the_post();
		                // If we're at the first post, or just before a post number that is divisible by 2 then we start a new row
		   
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
		                ?>
                <?php
	                endwhile;
	            echo '</div>'; // close row tag
            endif;?>

          
        </div><!-- .post-area div -->
</section>
           <!-- The FQA Link -->
           <div class="fqa-area">
				<img src="http://localhost:8000/wp-content/uploads/2019/11/faq-bg.png" href="FAQ Background" class="bg-faq">
				<div class="faq-box">
					<h2>Do you have any question?</h2>
                	<button class="btn btn-primary ">Go to FAQ</button>
				</div>
                
            </div><!-- Close fqa-area -->
        <!-- End The FQA Link -->
	   
		<!-- #Ad -->	
	<div id="primary" class="ad-area">
		<div class="adv">
		</div>
		
			<h2>Get the APP NOW!</h2>
			<div class="ad-content">
				<button class="btn btn-primary ">App Store</button>
				<button class="btn btn-primary ">Android</button>
			</div><!-- .ad-content -->
	</div><!-- .ad-area -->



	</main><!-- #main -->
	





<?php
get_footer();