<?php /* Template Name: ContactUs */?>
<?php
get_header();
?>

<main>

<?php
echo '<h1>Contact Us</h1>';

echo do_shortcode('[contact-form-7 id="249" title="Contact form 1"]');
get_footer();
?>

</main>
