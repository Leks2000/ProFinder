<?php 

@include 'config.php';


if(isset($_POST['submit'])){

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
      $insert = "INSERT INTO `worker`(namework, info, adress, datestart, dataend, details, price, phone) VALUES ('$namework', '$info', '$adress', '$datestart','$dataend','$details','$price', '$phone')";
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
    <title>Document</title>
    
  </head>
<body>
  <form action="" method="post">
      <div class="fotter">
        <div class="text-fotter"></div>
      </div>


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
          <input type="text" name="datestart" placeholder="<?php 
          if(empty($namework) && (isset($_POST['submit']))){
            echo('Введите время начала работы');
          }else
          echo('Начало работы');?>" />
          <input type="text" name="dataend" placeholder="<?php 
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
          <input type="text" name="price" placeholder="<?php 
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
