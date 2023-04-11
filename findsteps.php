<?php 

@include 'config.php';
session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="Orders">

    <h1 class="heading">latest products</h1>

    <div class="box-container">

        <?php 
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die ('query failed');
            if(mysqli_num_rows($select_orders) > 0){
                while($fetch_order=mysqli_fetch_assoc($select_orders)){
        ?>
            <form method="post" class="box" action="">
                <img src="images/<?php echo $fetch_order['pictcha']; ?>" alt="">
                <div class="name"><?php echo $fetch_order['namework']; ?></div>
                <div class="info"><?php echo $fetch_order['info']; ?></div>
                <div class="rate"><?php echo $fetch_order['rate']; ?></div>
                <div class="data"><?php echo $fetch_order['date']; ?></div>
                <div class="price"><?php echo $fetch_order['price']; ?></div>
            </form>
        <?php 
            };
        };
        ?>
    </div>
</div>

</div>
</body>
</html>
