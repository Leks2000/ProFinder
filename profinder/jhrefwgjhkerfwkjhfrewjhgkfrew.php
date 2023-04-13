<?php 

@include '../config.php';
session_start();
$user_id = $_SESSION['user_id'];

?>

<?php
@include '../config.php';
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
}else{
  $inornouser = 'dropuser'; 
  $type = 'image';
  $log = '';
  $incout = "../home.php";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
    integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous" />
  <link rel="stylesheet" href="grab/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  `
  <link
    href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Shantell+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
    rel="stylesheet">

</head>

<body>
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
          <li><a href="#">Найти задание</a></li>
        </ul>
      </div>


      <div class="dropdown">
        <div class="av-main">
        </div>
        <div class="vse">
        <a href="<?php echo $incout?>">
        <input type="<?php echo $type?>" 
        <?php
        if(!empty($select)){
          if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
                echo 'src="../uploaded_img/'.$fetch['image'].'"';
          }
        }
        ?>
        class="<?php echo $inornouser;?>"><?php echo $log ?></input>
        </a>
        <img class="uvedomleniya"src="images/bell.png" alt="">
        <div class="kolichestvo">0</div>
        <div class="dropdown-content"></div>
      </div>
      </div>


    </div>
  </div>




  <div class="search">
    <h1 class="a">Кто же откликнулся на ваше задание?</h1>
    <h2 class="b">Чаще заглядывайте и выбирайте подходящую клиентуру!</h2>
  </div>


  <div class="container">
    <div class="content row">
      <!-- main content -->
      <div class="main-conent col-md-9">
        <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="images/15.png" alt="" class="img-post">
            </div>
            <div class="post_text  col-md-8">
              <h2>
                <div class="name_zadaniya">Название задания</div>
              </h2>
              <div class="forma">
                <div class="user">Имя того, кто отлкикнулся</div>
                <div class="phone">Номер телефона</div>
                <div class="hz">Что-нибудь еще?</div>
              </div>
            </div>
        </div>
      </div>

      <div class="main-conent col-md-9">
        <div class="post row">
          <div class="img col-12 col-md-4">
            <img src="images/15.png" alt="" class="img-post">
          </div>
          <div class="post_text  col-md-8">
            <h2>
              <div class="name_zadaniya">Название задания</div>
            </h2>
            <div class="forma">
              <div class="user">Имя того, кто отлкикнулся</div>
              <div class="phone">Номер телефона</div>
              <div class="hz">Что-нибудь еще?</div>
            </div>
          </div>
        </div>
      </div>

      <div class="main-conent col-md-9">
        <div class="post row">
          <div class="img col-12 col-md-4">
            <img src="images/15.png" alt="" class="img-post">
          </div>
          <div class="post_text  col-md-8">
            <h2>
              <div class="name_zadaniya">Название задания</div>
            </h2>
            <div class="forma">
            <div class="user">Имя того, кто отлкикнулся</div>
            <div class="phone">Номер телефона</div>
            <div class="hz">Что-нибудь еще?</div>
          </div>
        </div>
        </div>
      </div>
      <!-- sidebar -->
    </div>
  </div>


































  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
    integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
    integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
    crossorigin="anonymous"></script>
</body>

</html>