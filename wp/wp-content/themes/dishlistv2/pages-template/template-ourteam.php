<?php /* Template Name: Our Team */?>
<?php 
// UPDATE USER META TO ADD EXTRA INFORMATION
//   // Marcos
//   update_user_meta( 2, 'user_position', 'Lead QA & Developer');
//   update_user_meta( 2, 'user_photo', '/wp-content/uploads/2019/11/marcos.jpg');
//   update_user_meta( 2, 'user_dish', '/wp-content/uploads/2019/11/dish_marcos.png');
//   update_user_meta( 2, 'user_war_cry', 'Cowabunga!');

//   // Eduardo
//   update_user_meta( 3, 'user_position', 'Developer');
//   update_user_meta( 3, 'user_photo', '/wp-content/uploads/2019/11/Eduardo_Pereira_do_Carmo.jpg');
//   update_user_meta( 3, 'user_dish', '/wp-content/uploads/2019/11/dish_eduardo.png');
//   update_user_meta( 3, 'user_war_cry', 'Let\'s rock!');

//   // Heloysa
//   update_user_meta( 4, 'user_position', 'Project Manager');
//   update_user_meta( 4, 'user_photo', '/wp-content/uploads/2019/11/heloysa.png');
//   update_user_meta( 4, 'user_dish', '/wp-content/uploads/2019/12/dish_helo.png');
//   update_user_meta( 4, 'user_war_cry', 'Let\'s go team!');
//   // Walter
//   update_user_meta( 5, 'user_position', 'Lead Developer');
//   update_user_meta( 5, 'user_photo', '/wp-content/uploads/2019/11/walter.png');
//   update_user_meta( 5, 'user_dish', '/wp-content/uploads/2019/11/dish_walter.png');
//   update_user_meta( 5, 'user_war_cry', 'Gimme some water');
//   // Jyot
//   update_user_meta( 6, 'user_position', 'Developer');
//   update_user_meta( 6, 'user_photo', '/wp-content/uploads/2019/11/jyot.png');
//   update_user_meta( 6, 'user_dish', '/wp-content/uploads/2019/11/dish_jyot.png');
//   update_user_meta( 6, 'user_war_cry', 'Yay!');
//   // Nazi
//   update_user_meta( 7, 'user_position', 'Designer & Developer');
//   update_user_meta( 7, 'user_photo', '/wp-content/uploads/2019/11/nazi.png');
//   update_user_meta( 7, 'user_dish', '/wp-content/uploads/2019/11/dish_nazi.png');
//   update_user_meta( 7, 'user_war_cry', 'Test tomorrow!');
//   // Harry
//   update_user_meta( 8, 'user_position', 'Lead Designer');
//   update_user_meta( 8, 'user_photo', '/wp-content/uploads/2019/11/harry.png');
//   update_user_meta( 8, 'user_dish', '/wp-content/uploads/2019/11/dish_harry.png');
//   update_user_meta( 8, 'user_war_cry', 'Oh no!');
//   echo "<p>Updated!</p>";
?>

<?php get_header(); ?>
<main class="our-team-users">
   <h1 class="title"><?= get_the_title(); ?></h1>
   <div class="our-team-users-container">
      <?php 
         // Get all Users (type = editor | Order by = name)
         $blogusers = get_users('role=editor&orderby=name');
         // Array of WP_User objects.
         foreach ($blogusers as $user) {
            ?>
            <div class="user-box">
               <div class="user-box-photo">
                  <div class="img-card">
                     <div class="img-container img-container-card">
                        <img 
                           src=<?= get_user_meta($user->ID, 'user_photo', true);?>
                           alt="<?= strtolower($user->first_name) . ' ' . strtolower($user->last_name); ?>"
                        >
                     </div>
                     <div class="img-container-back img-container-card">
                        <div><?= get_user_meta($user->ID, 'user_war_cry', true);?></div>
                     </div>                     
                  </div>
                  <div class="user-box-description">
                     <h2><?= $user->first_name . ' ' . $user->last_name;?></h2>
                     <p><?= get_user_meta($user->ID, 'user_position', true); ?></p>
                  </div>
               </div>
               <div class="user-box-description">
                  <img 
                     src=<?= get_user_meta($user->ID, 'user_dish', true);?>
                     alt="<?= strtolower($user->first_name) . '\'s favorite food' ?>"
                  >
                  <p><?= $user->description; ?></p>
               </div>
            </div>
            <?php
         }
      ?>
   </div>
</main>
<?php get_footer();
