<?php

@include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $spass = md5($_POST['spassword']);

    $select = " SELECT * FROM `user_form` WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $message[] = 'Пользователь уже создан!';

    }else{
        if($pass != $spass){
            $message[] = 'Пароль не совпадает!';
        }else{
            $insert = "INSERT INTO `user_form`(name, email, password) VALUES('$name','$email',
            '$pass')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
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
    <link rel="stylesheet" href="/css/st.css">
</head>
<body>

<div class="form-container">

    <form action="" method="post">
        <h3>Регистрация</h3>
        <?php
         if(isset($message)){
             foreach($message as $message){
                echo '<div class="message">'.$message.'</div>';
             }
          }
       ?>
        <input type="text" name="name" required placeholder="Ваше имя">
        <input type="email" name="email" required placeholder="Email">
        <input type="password" name="password" required placeholder="Введите пароль">
        <input type="password" name="spassword" required placeholder="Введите пароль повторно">
        <input type="submit" name="submit" value="Зарегистрироваться сейчас" class="form-btn">
        <p>У вас у же есть аккаунт?<a href="login_form.php"> Войти</a></p>
    </form>

</div>

</body>
</html>