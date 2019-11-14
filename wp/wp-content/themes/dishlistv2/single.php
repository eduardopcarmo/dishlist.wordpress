<?php
/**
 * The Single page for our theme
 *
 * @package Dishlist
 * @since 0.1.0
 * @version 0.0.1
 */
get_header();
?>
<main class="faq-single">
<?php
if(have_posts()==true)
{
    while(have_posts()==true)
    {
        the_post();
        // Get the Category
        $categories = get_the_category();
        // Check if is a FAQ post
        ?>
        <h1 class="title"><?= $categories[0]->category_parent === 0 ? $categories[0]->name : "FAQ" ?></h1>
        <article>
            <h2><?php the_title(); ?></h2>
            <div class="faq-single-content">
                <?php the_content(); ?>
            </div>
            <?php
                if($categories[0]->category_parent === 0){
                    ?>
                    <div class="feature-phone-img">
                        <div class="feature-phone-turnoff"></div>    
                        <div class="feature-phone-open"></div>
                        <div class="feature-phone-border"></div>
                    </div>
                    <?php
                }else{
                    ?>
                    <div class="faq-single-img"></div>
                    <?php
                }
            ?>
            <div class="faq-single-footer">
                <a class="btn btn-primary" href="<?= $categories[0]->category_parent === 0 ? esc_url( get_home_url() ) : esc_url( get_page_link( 96 ) ); ?>">Back</a>
            </div>
        </article>
        <?php
    }
}else
{
    echo '<p>There are no posts to display!';
}
?>
</main>
<?php
get_footer();