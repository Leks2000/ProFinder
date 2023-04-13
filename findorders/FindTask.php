<?php 

@include '../config.php';
session_start();

$user_id = $_SESSION['user_id'];

$select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'")
or die('query failed');
if(mysqli_num_rows($select) > 0){
    $fetch = mysqli_fetch_assoc($select);
}

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
  echo $well;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Shantell+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ddd/style.css">
    <link rel="stylesheet" href="java/java.js">
    <link rel="stylesheet" href="/profinder/css/style4.css">

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

  <?php
         if(isset($message)){
             foreach($message as $message){
                echo '<div class="message">'.$message.'</div>';
             }
          }
       ?>

  <section class="search">
    
    
      
      <div class="search__inner">
        <div class="search__title">
          Поиск по ключевым словам
        </div>
        <div class="search__box">
          <div class="search__box-inner">
            <div class="search__box-left">
              <label>
                <input type="text">
              </label>
              <button class="default-btn" type="submit">
                Отправить
              </button>
            </div>
          
        </div>
      </div>
    
  </div>
</section>
<section class="card"> 
<div class="card__items">

<?php
      $select_product = mysqli_query($conn, "SELECT * FROM `worker`") or die('query failed');
      if(mysqli_num_rows($select_product) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_product)){
   ?>
     
     <div class="card__item">
       <div class="card__header">
       
       <img <?php 
       if($fetch_product['picture'] == ''){
        echo 'src="../images/default-image.jpg"';
        }else{
        echo 'src="../uploaded_img/'.$fetch_product['picture'].'"';
        }
       ?> class="img-card" >
         <div class="card__item-title" name="namework"><?php echo $fetch_product['namework']; ?></div>
       </div>
       <div class="card_item-text">
         <ul>
           <li class="first-text">Начать </li>
           <li class="second-text1"><?php echo $fetch_product['datestart']; ?></li>
           <li class="first-text">Место</li>
           <li class="second-text"><?php echo $fetch_product['adress']; ?></li>
           <li class="first-text">Детали</li>
           <li class="second-text2"><?php echo $fetch_product['details']; ?></li>
         </ul>
       </div>
      <div>  
      </div>
       <div class="rat">
         <div class="price">2400 ₽</div>
         
         <div class="scattering" onclick="document.getElementById('id01').style.display='block'" ></div>
       </div>
     </a>
     </div>
   <?php
      };
    };
    ?>
  <div>
</section>
<section class="sidebar">
    <aside class="sidebar-section">
      <div class="card__itemddd">
        <div class="card_item-texttt1">
          <ul>
            <div class="lipp">Стоимость от: </div>
            <label>
              <input class="fff" type="text">
            </label>
            <div class="bok">
              <div class="tr">
                <br>
                <input class="kvadrati" type="checkbox" name="c1" value="0" />
                <div class="slovo">
                  Удаленная работа
                </div>
                </br>
              </div>
              <div class="tr">
                <br>
                <input class="kvadrati" type="checkbox" name="c2" value="1" />
                <div class="slovo">
                  Задания без откликов
                </div>
                </br>
              </div>
              <div class="tr">
                <br>
                <input class="kvadrati" type="checkbox" name="c3" value="1" />
                <div class="slovo">
                  Бизнес-задания
                </div>
                </br>
              </div>
            </div>
          </ul>
        </div>

      </div>

      <div class="card__itemdddk">
        <div class="card_item-texttt">
          <ul>
            <div class="lipp">Сортировать по: </div>
            <div class="bok">
              <div class="tr">
                <br>
                <input class="crug" type="radio" 
                id = "rad1" name="c1" value="data" />
                <div class="data">
                  Дата публикации
                </div>
                </br>
              </div>
              <div class="tr">
                <br>
                <input class="crug" type="radio" 
                id = "rad2" name="c1" value="urgently" />
                <div class="srochno">
                  Срочности
                </div>
                </br>
              </div>
              <div class="tr">
                <br>
                <input class="crug" type="radio" id = "rad3"  name="c1" value="far" />
                <div class="udal">
                  Удаленности
                </div>
                </br>
              </div>
            </div>
          </ul>
        </div>

      </div>

      <div class="card__itemdddkl">
        <img src="img/sidebar-img.png" alt="">
      </div>

    </aside>
  </section>


</body>
</html>



<<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="ddd/inform.css">
</head>
<body>

<div id="id01" class="modal">

  <form class="modal-content animate" action="/action_page.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
      <img src="av.jpg" alt="Avatar" class="avatar">
      <h1><?php echo $fetch['name']; ?></h1>
    </div>


    
    <div class="container1">
        <div class="textcols">
            <div class="textcols-item">
        <div class="title">
            <label for="title"><b>Название задания</b></label>
            <p>Название задания из бд</p>
        </div>
            </div>

            <div class="textcols-item">
        <div class="category">
            <label for="category"><b>Категория задания</b></label>
            <p>Категория задания из бд</p>
        </div>
            </div>
        </div>

        <div class="textcols">
            <div class="textcols-item">
        <div class="address">
      <label for="address"><b>Адрес</b></label>
      <p>Адрес из бд</p>
        </div>
            </div>

            <div class="textcols-item">
        <div class="time">
      <label for="time"><b>Когда нужно приступить к выполнению:</b></label>
      <p>Когда нужно приступить к выполнению из бд</p>
        </div>
            </div>
        </div>

        

        <div class="textcols">
            <div class="textcols-item">
        <div class="price1">
      <label for="price1"><b>Стоимость</b></label>
      <p>Стоимость из бд</p>
        </div>
    </div>

    <div class="textcols-item">
        <div class="phonenum">
      <label for="phonenum"><b>Номер телефона для связи</b></label>
      <p>Номер телефона для связи из бд</p> 
        </div>   
    </div>
        </div>

        <div class="details">
            <label for="details"><b>Детали</b></label>
            <p>Детали из бд</p>
              </div>

    <div class="container1" style="background-color:#f1f1f1; border-radius: 0 0 20px 20px;">
        <div class="reactionbtn">
            <button type="submit" name="submit "onclick="<?php $fetch_product['idfromuser']?>" class="reactionbtn">Откликнуться</button>
        </div>
        <br>
        <div class="closebtn">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Выйти</button>
        </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>


