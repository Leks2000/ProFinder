<?php 

@include '../config.php';
session_start();
$user_id = $_SESSION['user_id'];

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
      integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="grab/style.css" />
    <link rel="stylesheet" href="grab/st.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    `
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Shantell+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <!-- <div class="header2">
      <div class="container2">
        <h1 class="title2">
          <a href="main.html"><span>ProFinder</span></a>
        </h1>
        <div class="list1">
          <ul class="first2">
            <div class="one">
              <li><a href="#">Создать задание</a></li>
            </div>
            <li><a href="#">Найти задание</a></li>
          </ul>
        </div>

        <div class="dropdown">
          <div class="av-main"></div>
        
          <button class="dropuser"></button>
          <div class="dropdown-content"></div>
        </div>
      </div>
    </div> -->

<?php
      $select_product = mysqli_query($conn, "SELECT * FROM `worker`") or die('query failed');
      if(mysqli_num_rows($select_product) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_product)){
   ?>



    <div class="form-container">
      <form action="" method="post">
        <h3>Уведомления</h3>
        <div class="from-cnt">
          <div class="imgcol">
            <img src="images/15.png" alt="" class="img-post" />
              <span>Название работы<span class="text-uved">Имя <span>телефон</span></span>
              <span class="cl-btn-7"></span>
            </span>
          </div>
        </div>
      <?php    
      };
    };
    ?>

        <p><a href="main.php"> Назад</a></p>
      </form>
    </div>
  </body>
</html>
