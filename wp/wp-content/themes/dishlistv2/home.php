<?php
get_header();?>
	<main id="main" class="home-container">
        <section id="home-main">
            <span class="main-animation"></span>
            <div class="main-area">
                <h1>Digital Menu</h1>
                <p class="first">
                    Lorem Ipsum is simply dummy text of the 
                    printing and typesetting industry.
                </p>
                <p class="last">
                    Lorem Ipsum is simply dummy text of the 
                    printing and typesetting industry.
                </p>
                <button class="btn btn-primary ">App Store</button>
                <button class="btn btn-primary ">Android</button>
            </div>
        </section><!-- #home-main section -->
        <!-- #Feature Posts -->
        <section id="feature">
            <span class="home-sb-plate"></span>
            <span class="home-dish-plate"></span>
            <h2>Features</h2>
            <?php
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name' => 'feature',
                    'posts_per_page' => 10,);
                    $arr_posts = new WP_Query( $args );
                    // Get all our posts in "Feature Category", and start the counter
                    $postNumber = 0;
                    if ( $arr_posts->have_posts() ) :
                        echo '<div class="post-area-row">';
                            echo '<div class="post-col-1"></div>';
                            while ( $arr_posts->have_posts() ) :
                                $arr_posts->the_post();
                                // If we're at the first post, or just before a post number that is divisible by 2 then we start a new row
                                $postClass = '';
                                if ($postNumber == 0 || (($postNumber) % 2 == 0))  {
                                    $postClass .= "post-col-2";
                                } else {
                                    $postClass .= "post-col-3";
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
                                    endif;?>
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
                        echo '</div>'; // close poat-area-row tag
                    endif;?>
        </section><!-- #feature section -->     
        <!-- The FQA Link -->
        <section id="faq-area">
            <div class="faq-box">
                <h2>Do you have any question?</h2>
                <a class="btn btn-primary ">Go to FAQ</a>
            </div>  
        </section><!--#faq-area section-->
	</main>
<?php
get_footer();