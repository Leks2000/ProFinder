<?php

@include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:login_form.php');
 };
 
 if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login_form.php');
 }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="css/st.css" />
  </head>
  <body>
    <div class="container">
      <div class="profile">
      <?php
            $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'")
            or die('query failed');
            if(mysqli_num_rows($select) > 0){
                $fetch = mysqli_fetch_assoc($select);
            }
            if($fetch['image'] == ''){
                echo '<img src="images/default-image.jpg">';
             }else{
                echo '<img src="uploaded_img/'.$fetch['image'].'">';
             }
        ?>

        <h3><?php echo $fetch['name']; ?></h3>
        <a href="update_profile.php" class="butun">Изменить профиль</a>
        <a href="profinder/main.php" class="butun">Главная</a>
        <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn"
          >Выйти</a
        >
        <p>
          <a href="login_form.php">login</a>
          <span style="padding: 7px">или</span>
          <a href="register_form.php">registr</a>
        </p>
      </div>
    </div>
  </body>
</html>

