<?php /* Template Name: Our Team */?>
<?php get_header(); ?>
<main class="our-team-users">
   <h1 class="title"><?= get_the_title(); ?></h1>
   <div class="our-team-users-container">
      <?php 
         // Get all Users (type = subscriber | Order by = name)
         $blogusers = get_users('role=editor&orderby=name');
         // Array of WP_User objects.
         foreach ($blogusers as $user) {
            ?>
            <div class="user-box">
               <div class="user-box-photo">
                  <img src=<?= get_user_meta($user->ID, 'user_photo', true);?> alt="<?= $user->first_name . ' ' . $user->last_name; ?>">
                  <h2><?= $user->first_name . ' ' . $user->last_name;?></h2>
                  <p>
                     <?= get_user_meta($user->ID, 'user_position', true); ?>
                  </p>
               </div>
               <div class="user-box-description">
                  <img src=<?= get_user_meta($user->ID, 'user_dish', true);?> alt="<?= $user->first_name . '-favorite-food' ?>">
                  <p><?= $user->description; ?></p>
               </div>
            </div>
            <?php
         }
      ?>
   </div>
</main>
<?php get_footer();
