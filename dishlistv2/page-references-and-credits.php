<?php
get_header();
?>
<main class="references-and-credits">
<?php
while ( have_posts() ) {
    the_post();
    ?>
    <h1 class="title"><?= the_title() ?></h1>
    <div class="references-and-credits-container">
    <?php
    the_content();
    ?>
    </div>
    <?php
}
?>
</main>
<?php
get_footer();