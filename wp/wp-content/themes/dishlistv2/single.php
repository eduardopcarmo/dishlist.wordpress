<?php
get_header();
?>
<main class="faq-single">
    <h1 class="title">FAQ</h1>
<?php
if(have_posts()==true)
{
    while(have_posts()==true)
    {
        the_post();
        ?>
        <article>
            <h2><?php the_title(); ?></h2>
            <div class="faq-single-content">
                <?php the_content(); ?>
            </div>
            <div class="faq-single-img"></div>
            <div class="faq-single-footer">
                <a class="btn btn-primary" href="<?php echo esc_url( get_page_link( 96 ) ); ?>">Back</a>
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