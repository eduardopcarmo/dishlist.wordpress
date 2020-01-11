<?php
get_header();?>
	<main id="main" class="home-container">
        <!-- Hero -->
        <section id="home-main">
            <div class="home-main-container">
                <span class="main-dish-1"></span>
                <span class="main-dish-2"></span>
                <span class="main-dish-3"></span>
                <div class="main-area">
                    <h1>Digital Menu for Restaurants</h1>
                    <p>
                        Are restaurant menus confusing to you too? Not anymore!<br>
                        Dishlist makes it easy for you to order dishes with its easy to understand and interactive menu features.
                        <br>Download dishlist to get started.                        
                    </p>                
                    <a class="btn btn-primary" href="https://play.google.com/store/" target="_blank">Google Play</a>
                    <a class="btn btn-primary" href="https://www.apple.com/ios/app-store/" target="_blank">App Store</a>
                </div>
            </div>
            <div class="home-main-container-null"></div>
        </section>
        <!-- Features -->
        <section id="feature">
            <span class="home-sb-plate"></span>
            <h2 class="subtitle">Features</h2>
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
                                    <a href="<?= esc_url( get_permalink() ) ?>">
                                        <?php
                                            if ( has_post_thumbnail() ) {
                                                ?>
                                                <img  src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= the_title(); ?>">
                                                <?php
                                            }
                                        ?>
                                        <h3><?= the_title(); ?></h3>
                                        <p class="text-truncated"><?= get_the_excerpt(); ?></p>
                                    </a>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                        }
                    ?>
                </div> 
            </div>
        </section>
        <!-- FAQ -->
        <section id="faq-area">
            <div class="faq-box">
                <h2>Do you have any question?</h2>
                <a class="btn btn-primary" href="<?= get_permalink( get_page_by_path( 'faq' ) ) ?>">Go to FAQ</a>
            </div> 
        </section>
	</main>
<?php
get_footer();