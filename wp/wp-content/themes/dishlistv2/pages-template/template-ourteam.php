<?php /* Template Name: Our Team */?>
<?php get_header(); ?>


<main class="our-team-users">
   <h1 class="title"><?= get_the_title(); ?></h1>
   <div class="our-team-users-container">
      <?php 
         // Get all Users (type = subscriber | Order by = name)
         $blogusers = get_users('role=subscriber&orderby=name');
         // Array of WP_User objects.
         foreach ($blogusers as $user) {
            ?>
            <div class="user-box">
               <div class="user-box-photo">
                  <img src=<?= get_user_meta($user->ID, 'user_photo', true);?>>
                  <h2><?= $user->first_name . ' ' . $user->last_name;?></h2>
                  <p>
                     <?= get_user_meta($user->ID, 'user_position', true); ?>
                  </p>
               </div>
               <div class="user-box-description">
                  <img src=<?= get_user_meta($user->ID, 'user_dish', true);?>>
                  <p><?= $user->description; ?></p>
               </div>
            </div>
            <?php
         }
      ?>
   </div>
</main>
<br>
<br>
<br>
<br>


<main class="our-team">
   <h1 class="title">Our Team</h1>


   <?php
      $blogusers = get_users('role=subscriber&orderby=name');
      $count = 0;
      $seq = 'lr';
      $photo = 'col-l';

      // Array of WP_User objects.
      foreach ($blogusers as $user) :
   
         if ($count % 2 == 0) {
            $seq = 'lr';
            $photo = 'col-l';
         } else {
            $seq = 'rl';
            $photo = 'col-r';
         }

   ?>
          
         <div class="user-container <?php echo $seq; ?>">
            <div class="photo-container <?php echo $photo; ?>">
               <div class="photo-frame"></div>
               <img class="photo" src=<?php echo get_user_meta($user->ID, 'user_photo', true);?>>
               <div class="username-badge">
                  <?php echo $user->first_name . ' ' . $user->last_name; ?>
               </div>
               <div class="username-position">
                  <?php echo get_user_meta($user->ID, 'user_position', true);?>
               </div>
            </div>
            <div class="user-description">
            <img class="user-food" src=<?php echo get_user_meta($user->ID, 'user_dish', true);?>>
               <div class="user-description-text">
                  <?php 
                     echo $user->description;
                   ?>
               </div>
            </div>
         </div>
   <?php
      $count++;
      endforeach;
   ?>


</main>

<?php get_footer();
