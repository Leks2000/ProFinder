<?php 

@include 'config.php';



$sql = "CREATE TABLE `worker` (
  `id` int not null auto_increment,
  `namework` varchar(255) not null,
  `info` varchar(255) not null,
  `adress` varchar(255) not null,
  `datestart` varchar(255) not null,
  `dataend` varchar(255) not null,
  `details` varchar(255) not null,
  `price` varchar(255) not null,
  `picture` varchar(255) null,
  `phone` varchar(255) not null,
  `idfromuser` varchar(255) not null,
  INDEX(`id`)
  ) ";

if (mysqli_query($conn, $sql)) {
}

session_start();

if(!empty($_SESSION['user_id'])){
  
  $user_id = $_SESSION['user_id'];

  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'")
  or die('query failed');
}


if(!isset($user_id)){
  $inornouser = 'dropbtn'; 
  $log = 'Вход';
  $type = 'button';
  $incout = "../login_form.php";
  $uved = "";
  $image = "";
}else{
  $inornouser = 'dropuser'; 
  $type = 'image';
  $log = '';
  $incout = "../home.php";
  $uved = "uvedomleniya";
  $image = "../profinder/images/bell.png";
}

if(isset($_POST['submit'])){

    $idfromuser = $_SESSION['user_id'];
    $namework = mysqli_real_escape_string($conn, $_POST['namework']);
    $info = mysqli_real_escape_string($conn, $_POST['info']);
    $adress = mysqli_real_escape_string($conn, $_POST['adress']);
    $datestart = mysqli_real_escape_string($conn, $_POST['datestart']);
    $dataend = mysqli_real_escape_string($conn, $_POST['dataend']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);


    if(empty($namework && $adress && $datestart && $dataend && $price && $phone)){

    }else{
      $insert = "INSERT INTO `worker`(namework, info, adress, datestart, dataend, details, price, phone, idfromuser) VALUES ('$namework', '$info', '$adress', '$datestart','$dataend','$details','$price', '$phone','$idfromuser')";
        mysqli_query($conn, $insert);
        header('location:profinder/main.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/main1-register.css" />
    <link rel="stylesheet" href="/profinder/css/style3.css">
    <title>Document</title>
    
  </head>
<body>
<div class="header2">
    <div class="container2">
      <h1 class="title2">
        <a href="/profinder/main.php"><span>ProFinder</span></a>
      </h1>
      <div class="list1">
        <ul class="first2">
          <div class="one">
            <li><a href="../createorder.php">Создать задание</a></li>
          </div>
          <li><a href="../findorders/FindTask.php">Найти задание</a></li>
        </ul>
      </div>


      <div class="dropdown">
        <div class="av-main">
        </div>
        <div class="vse">
        <a href="<?php echo $incout?>">
        <input type="<?php echo $type?>" <?php
        if(!empty($select)){
          if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
          if($fetch['image'] == ''){
            echo 'src="../images/default-image.jpg"';
         }else{
            echo 'src="../uploaded_img/'.$fetch['image'].'"';
         }
        }
        }
        ?>
        
        class="<?php echo $inornouser;?>"><?php echo $log ?></input></a>
        <input type="image" class="<?php echo $uved?>" src="<?php echo $image?>">
        <div class="kolichestvo"><?php echo 4?></div>
        <div class="dropdown-content"></div>
      </div>
      </div>




    </div>
  </div> 

     <form action="" method="post">
           <div class="decor-main">
        <div class="form-inner">
          <div class="text-app2">Создай задание за 6 шагов</div>
          <div class="text-app3">Например нужно починить стиральную машину</div>
        </div>
      </div>

      <div class="decor">
        <div class="form-inner">
          <h3>Название задания</h3>

          <input type="text" name="namework"
          placeholder="<?php 
          if(empty($namework) && (isset($_POST['submit']))){
            echo('Введите название задания');
          }else
          echo('Например нужно починить стиральную машину...');?>"
          />
        </div>
      </div>

      <div class="decor7">
        <div class="form-inner">
          <h3>Категории заданий</h3>
          <select name="info" size="1">
            <option selected  value="Курьерские услуги">Курьерские услуги</option>
            <option value="Ремонт и строительство">Ремонт и строительство</option>
            <option value="Грузоперевозки">Грузоперевозки</option>
            <option value="Грузоперевозки">Виртульный помощник</option>
            <option value="Грузоперевозки">Компьютерный мастер</option>
            <option value="Грузоперевозки">Дизайн</option>
            <option value="Грузоперевозки">Репиторы и обучение</option>
            <option value="Грузоперевозки">Уборка и помощь по хозяйству</option>
            <option value="Грузоперевозки">Красота и здоровье</option>
            <option value="Грузоперевозки">Ремонт транспорта</option>

          </select>
        </div>
      </div>

      <div class="decor">
        <div class="form-inner">
          <h3>Адрес</h3>
          <input type="text" name="adress" placeholder="<?php 
          if(empty($namework) && (isset($_POST['submit']))){
            echo('Введите ваш Адрес');
          }else
          echo('Город, улица, дом');?>" />
        </div>
      </div>

      <div class="decor2">
        <div class="form-inner">
          <h3>Когда нужно приступить к выполнению?</h3>
          <input  type="date" name="datestart" placeholder="<?php 
          if(empty($namework) && (isset($_POST['submit']))){
            echo('Введите время начала работы');
          }else
          echo('Начало работы');?>" />
          <input type="date" name="dataend" placeholder="<?php 
          if(empty($namework) && (isset($_POST['submit']))){
            echo('Введите время окончания работы');
          }else
          echo('Завершение работы');?>" />
        </div>
      </div>

      <div class="decor4">
        <div class="form-inner">
          <h3>Детали</h3>
          <textarea type="text" name="details" placeholder="Сообщение..." rows="2"></textarea>
        </div>
      </div>

      <div class="decor">
        <div class="form-inner">
          <h3>Финансовая стоимость</h3>
          <input oninput="this.value = this.value.replace(/[^+,0-9]/g, '')" type="text" name="price" placeholder="<?php 
          if(empty($namework) && (isset($_POST['submit']))){
            echo('Введите цену за работу');
          }else
          echo('Цена');?>"/>
        </div>
      </div>

      <div class="decor">
        <div class="form-inner">
          <h3>Телефон</h3>
          <input 
            oninput="this.value = this.value.replace(/[^+,0-9]/g, '')"
            class="phone"
            type="text"
            id="phone"
            name="phone"
            placeholder="<?php 
          if(empty($namework) && (isset($_POST['submit']))){
            echo('Введите ваш телефон');
          }else
          echo('+7 (000)000-00-00');?>"
          />
        </div>
      </div>

      <div class="btn">
        <input type="submit" name="submit" value="Создать задание" class="floating-button">
      </div>

      <div class="fotter">
        <div class="text-fotter">
          2023 Template by Insight.Все права защищены.
        </div>
      </div>
    </form>
  </body>
</html>
