<?php 

@include 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

    $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
    $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

    mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = 
    '$update_email' WHERE id = '$user_id'") or die('query failed');
    

    $old_pass = $_POST['old_pswd'];
    $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
        if($update_pass != $old_pass){
            $messagein[] = 'не правильный старый пароль';
        }elseif($new_pass != $confirm_pass){
            $messagein[] = 'пароли не совпадают';
        }else{
            mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
            $message[] = 'пароль был обновлён';
        }
    }
    
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'uploaded_img/'.$update_image;
    
    if(!empty($update_image)){
        if($update_image_size > 2000000){
            $messagein[] = 'Слишком большой размер';
        }else{
            $image_udpate_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
            if($image_udpate_query){
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
            }
            $message[] = 'Картинка заменена успешна!';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update profile</title>
    <link rel="stylesheet" href="/css/style.css">

</head>
<body>

<div class="update-profile">

    <?php
        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id' ")
        or die('query failed');
        if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
        }

    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <?php
            if($fetch['image'] == ''){
               echo '<img src="images/default-image.jpg">';
            }else{
               echo '<img src="uploaded_img/'.$fetch['image'].'">';
            }
            if(isset($message)){
               foreach($message as $message){
                  echo '<div class="message">'.$message.'</div>';
               }
            }
            if(isset($messagein)){
                foreach($messagein as $messagein){
                   echo '<div class="messagein">'.$messagein.'</div>';
                }
             }
          ?>
         <div class="flex">
            <div class="inputBox">
                <span>Имя :</span>
                <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box" placeholder="Введите новое имя">
                <span>Изменить Email :</span>
                <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box"placeholder="Введите Email">
                <span>Изменить ваше изображение :</span>
                <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
            </div>
           
            <div class="inputBox">
                <input type="hidden" name="old_pswd" value="<?php echo $fetch['password']; ?>">
                <span>Старый пароль :</span>
                <input type="password" name="update_pass" placeholder="Введите старый пароль"
                class ="box">
                <span>Новый пароль:</span>
                <input type="password" name="new_pass" placeholder="Введите пароль"
                class ="box">
                <span>Повторите новый пароль:</span>
                <input type="password" name="confirm_pass" placeholder="Повторите новый пароль"
                class ="box">
            </div>

         </div>
         <input type="submit" value="Обновить" name="update_profile" class="butun">
         <a href="home.php" class="delete-btn">Назад</a>
    </form>

</div>

</body>
</html>