<?php
@include '../config.php';
session_start();


if(!empty($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];

  $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'");
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
  $image = "images/bell.png";
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous"/>
    <link rel="stylesheet" href="/profinder/css/style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Shantell+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  </head>
  <body>
    <!-- <header class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-4">
            <h1>
                <a href="main.html">ProFinder</a>
            </h1>
          </div>
          <nav class="col-8">
            <ul>
              <li><a href="#">Создать задание</a></li>
              <li><a href="#">Найти задание</a></li>
              <li>
                <a href="#">
                    <i class="fas fa-user"></i>
                    Вход
                </a>
                <ul>
                    <li><a href="#">Панель администратора</a></li>
                    <li><a href="#">Выход</a></li> 
               </ul>  
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </header> -->

<!-- Блок карусели  START-->
<div class="header2">
    <div class="container2">
      <h1 class="title2">
        <a href="main.php"><span>ProFinder</span></a>
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
        <?php 
        if(!empty($_SESSION['user_id'])){
        ?>
        
        <input type="image" class="<?php echo $uved?>" src="<?php echo $image?>">
        <div class="kolichestvo"><?php echo 4?></div>
        <?php
        };
        ?>
        <div class="dropdown-content"></div>
      </div>
      </div>




    </div>
  </div> 

 
  <div class="search">
    <h1 class="a">Освободим вас от забот!</h1>
    <h2 class="b">Поможем найти надёжного исполнителя для любых задач</h2>
    <br>
    <div class="d1">
        <form>
            <input type="text" placeholder="Поиск по сайту..."/>
            <button type="submit"></button>
        </form>
    </div>
</div>

  <div class="reviews">
    <div class="title">
        <br>
    </div>
            <div class="cont">
                <div class="card">
                    <h1 data-name="Abcfghijklmnopq">Наша платформа поиска услуг поможет вам найти опытных специалистов которые могут выполнить любые задачи!<h1>
                </div>
                <div class="card5">
                    
                </div>
                <div class="card3">
                    <h1 data-name="Abcfghijklmnopq">Никаких лишних телодвижений - найдите работу мечты за пару кликов!</h1>
                    
                </div>
                <div class="card4">
                    
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>



<div class="checkpoints">
        <table>
            <tr>
                <td>
                    <img src="images/15.png" alt="">
                    <h2>Большой выбор категорий</h2>
                </td>
                <td>
                    <img src="images/15.png" alt="">
                    <h2>Обширный функционал</h2>
                </td>
                <td>
                    <img src="images/15.png" alt="">
                    <h2>Удобный поиск заданий</h2>
                </td>
                <td>
                    <img src="images/15.png" alt="">
                    <h2>Работаем без комиссии</h2>
                </td>
            </tr>
        </table>
    </div>
</div>
  
<!-- Блок карусели END -->

<div class="containerslider">
  <div id="carouselExampleCaptions" class="carousel slide">
      <div class="carousel-inner">
      <div class="carousel-item active">
          <img src="images/slider1.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
      </div>
      <div class="carousel-item">
          <img src="images/slider2.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
      </div>
      <div class="carousel-item">
          <img src="images/slider3.png" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
          </div>
      </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
      </button>
  </div>
</div>    



<div class="instruction">
  <div class="title">
  <h1>Как работает ProFinder?</h1><br>
  </div>
  <div class="cont2">
  <div class="card2">
      <div class="way">
        <div class="num-card">1</div>
          <h3>Опишите</h3>
          <p>свою задачу и условия.
          Это бесплатно и займёт 3‑4 минуты</p>
          
      </div>
  </div>
  <div class="card2">
      <div class="way">
        <div class="num-card">2</div>
          <h3>Получите отклики</h3>
          <p>с ценами от исполнителей. Обычно они приходят в течение 30 минут</p>
          
      </div>
  </div>
  <div class="card2">
      <div class="way">
        <div class="num-card">3</div>
          <h3>Выберите</h3>
          <p>подходящего исполнителя и обсудите сроки выполнения</p>       
      </div>
  </div>
  </div>
</div>

</div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
  </body>
  <footer>
    <div class="foot">
      <p>©️2023 Template by Aleynikov Kirill, Bazhin Kirill, Korshikova Elvina, Halle Alexander. Все права защищены.</p>
    </div>
  </footer>
</html>
