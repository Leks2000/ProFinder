<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    if(isset($_POST['name'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
    }
    if(isset($_POST['email'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
    }
    if(isset($_POST['password'])){
        $pass = md5($_POST['password']);
    }
    if(isset($_POST['spassword'])){
        $spass = md5($_POST['spassword']);
    }

    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        header('location:profinder/main.php');

    }else{
        $message[] = 'Неправльный пароль или логин!';
    }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>
    <link rel="stylesheet" href="css/login_form.css">
</head>
<body>

<div class="form-container">

    <form action="" method="post">
        <h3>Авторизация</h3>
        <?php
            if(isset($message)){
               foreach($message as $message){
                  echo '<div class="message">'.$message.'</div>';
               }
            }
        ?>
        <input type="email" name="email" required placeholder="Введите ваш Email">
        <input type="password" name="password" required placeholder="Введите ваш пароль">      
        <input type="submit" name="submit" value="Войти" class="form-btn">      
        <p>У вас нет аккаунта?<a href="register_form.php"> Зарегистрироватся</a></p>
    </form>

</div>

</body>
</html>