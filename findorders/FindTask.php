<?php 

@include '../config.php';
session_start();
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FindTask</title>

  <link rel="stylesheet" href="css/style.css">
</head>

<body>



  <section class="search">
    <div class="container">
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
                Поиск
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<form action="">
<div class="products">
<div class="box-container">
<div class="container">

<div class="user-profile">

   <?php
      $select_user = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>
   <img class="img-card" src="../uploaded_img/<?php echo $fetch_user['image']; ?>">
   <p> username : <span><?php echo $fetch_user['name']; ?></span> </p>
   <p> email : <span><?php echo $fetch_user['email']; ?></span> </p>
   <div class="flex">
      <a href="login_form.php" class="btn">login</a>
      <a href="index.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
   </div>

</div>

<?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `worker`") or die ('query failed');
            if(mysqli_num_rows($select_orders) > 0){
                while($fetch_order=mysqli_fetch_assoc($select_orders)){
?>  
<form method="post" class="box" action="">
  <section class="card">
    <div class="card__items">
      <div class="card__item">
        <div class="card__header">
          <img class="img-card" src="../uploaded_img/<?php echo $fetch_order['picture']; ?>" alt="">
          <div class="card__item-title">
          <?php echo $fetch_order['namework']; ?>
          </div>
        </div>
        <div class="card_item-text">
          <ul>
            <li class="first-text">Начать </li>
            <li class="second-text"><?php echo $fetch_order['dataend']; ?></li>
            <li class="first-text">Место</li>
            <li class="second-text"><?php echo $fetch_order['adress']; ?></li>
            <li class="first-text">Оплата</li>
            <li class="second-text">Напрямую исполнителю без гарантий и компенсаций</li>
          </ul>
        </div>
        <div class="card_user-border">
          <div class="card_user">
            <img class="img-card_user" src="img/about-1.png" alt="">
            <div class="rating-result">
              <span class="active"></span>
              <span class="active"></span>
              <span class="active"></span>
              <span></span>
              <span></span>
            </div>
          </div>
        </div>
        <div class="rat">
          <div class="price"><?php echo $fetch_order['price']; ?></div>
          <div class="rating-area">
            <input type="radio" id="rating-1" name="rating" value="1">
            <label for="rating-1" title="Добавить в избранное"></label>
          </div>
        </div>
      </div>
    </section>
    </form>
    <?php 
          };
      };
    ?>
</div>
</div>


  <section class="sidebar">
    <aside class="sidebar-section">
      <div class="card__itemddd">
        <div class="card_item-texttt">
          <ul>
            <div class="lipp">Стоимость от: </div>
            <label>
              <input class="fff" type="text">
            </label>
            <div class="bok">
              <div class="tr">
                <br>
                <input class="kvadrati" type="checkbox" name="c1" value="1" />
                <div class="slovo">
                  Удаленная работа
                </div>
                </br>
              </div>
              <div class="tr">
                <br>
                <input class="kvadrati" type="checkbox" name="c1" value="1" />
                <div class="slovo">
                  Задания без откликов
                </div>
                </br>
              </div>
              <div class="tr">
                <br>
                <input class="kvadrati" type="checkbox" name="c1" value="1" />
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
            <label>
              <input class="fff" type="text">
            </label>
            <div class="bok">
              <div class="tr">
                <br>
                <input class="crug" type="radio" name="c1" value="1" />
                <div class="slovo">
                  Дата публикации
                </div>
                </br>
              </div>
              <div class="tr">
                <br>
                <input class="crug" type="radio" name="c1" value="1" />
                <div class="slovo">
                  Срочности
                </div>
                </br>
              </div>
              <div class="tr">
                <br>
                <input class="crug" type="radio" name="c1" value="1" />
                <div class="slovo">
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