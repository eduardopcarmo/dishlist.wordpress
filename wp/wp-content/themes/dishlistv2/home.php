<?php
get_header();?>
	<main id="main" class="home-container">
        <section id="home-main">
            <div class="home-main-container">
                <span class="main-dish-1"></span>
                <span class="main-dish-2"></span>
                <span class="main-dish-3"></span>
                <div class="main-area">
                    <h1>Digital Menu</h1>
                    <p>
                        Lorem Ipsum is simply dummy text of the 
                        printing and typesetting industry.
                    </p>                
                    <a class="btn btn-primary" href="https://play.google.com/store/" target="_blank">Android</a>
                    <a class="btn btn-primary" href="https://www.apple.com/ios/app-store/" target="_blank">Appstore</a>
                </div>
            </div>
            <div class="home-main-container-null"></div>
        </section><!-- #home-main section -->
        <!-- #Feature Posts -->
        <section id="feature">
            <span class="home-sb-plate"></span>
            <h1 class="title">Features</h1>
            <div class="feature-container">
                <div class="feature-container-list">
                    <?php
                        // Get all our posts in "Feature Category"
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'category_name' => 'feature',
                            'posts_per_page' => 10
                        );
                        $arr_posts = new WP_Query( $args );
                        if ( $arr_posts->have_posts() ) {
                            while ( $arr_posts->have_posts() ) {
                                $arr_posts->the_post();
                                ?>
                                <div class="box">
                                    <?php
                                        if ( has_post_thumbnail() ) {
                                            ?>
                                            <img  src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= the_title(); ?>">
                                            <?php
                                        }
                                    ?>
                                    <h3><?= the_title(); ?></h3>
                                    <p><?= get_the_excerpt(); ?></p>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                        }
                    ?>
                </div> 
            </div>
        </section>
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