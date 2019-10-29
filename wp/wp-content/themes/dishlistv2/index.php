<?php
get_header();
?>
<main class="faq">
    <h1 class="title">FAQ</h1>
    <section class="faq-popular-questions">
        <h2 class="subtitle">Popular questions</h2>
        <div class="faq-popular-questions-content">
            <?php
                $args = array(
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'category_name' => 'popular-questions',
                    'posts_per_page' => 999,
                );
                $arr_posts = new WP_Query( $args );
                if ( $arr_posts->have_posts() ) {
                    while ( $arr_posts->have_posts() ) {
                        $arr_posts->the_post();
                        ?>
                        <div class="box">
                            <h3><?php the_title(); ?></h3>
                            <p><?= get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>">Read More</a></p>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                }
            ?> 
        </div>
    </section>
    <section class="faq-help-topics">
        <h2 class="subtitle">Help Topics</h2>
        <div class="faq-help-topics-content">
            <?php
            $terms = get_terms( array(
                "taxonomy" => "category",
                "orderby" => "name",
                "order" => "ASC",
                "child_of" => "11"
            ) );
            foreach ($terms as $term) {
                $args = array(
                    "post_type" => "post", 
                    "post_status" => "publish", 
                    "cat" => $term->term_id,
                    "orderby" => "name",
                    "order"   => "ASC"
                ); 
                $query_posts = new WP_Query( $args );
                if ( $query_posts->have_posts() ) {
                    ?>
                    <div class="faq-help-topics-content-col">
                        <h3 class="subtitle"><?= $term->name; ?></h2>
                        <?php
                        while ( $query_posts->have_posts() ) {
                            $query_posts->the_post();
                            ?>
                            <div class="box">
                                <h3><?php the_title(); ?></h3>
                                <p><?= get_the_excerpt(); ?> <a href="<?php the_permalink(); ?>">Read More</a></p>
                            </div>
                            <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </div>
                    <?php
                } 
            } 
            ?>
        </div>
    </section>
</main>
<?php
get_footer();