<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

include 'components/add_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>
    
.heading{
    text-align: center;
    font-size: 4rem;
    color: #333;
    padding: 1rem;
    margin: 2rem 0;
    background: #F8E581;
}

.heading span{
    color:var(--pink);
}

.home{
    display: flex;
    align-items: center;
    min-height: 100vh;
    background:url(../FitnessLife/images/gymfit.jpg) no-repeat;
    background-size: cover;
    background-position: center;     
}

.home .content{
    max-width: 50rem;
}

.home .content h3{
    font-size: 6rem;
    color: #333;
}

.home .content span{
    font-size: 3.5rem;
    color:var(--pink);
    padding:1rem 0;
    line-height: 1.5;
}

.home .content p{
    font-size: 1.5rem;
    color:#eee;
    padding:1rem 0;
    line-height: 1.5;
}

.about .row{
    display: flex;
    align-items: center;
    gap: 2rem;
    flex-wrap: wrap;
    padding: 2rem 0;
    padding-bottom: 3rem;
}

.about .row .video-container{
    flex:1 1 40rem;
    position: relative;
}

.about .row .video-container video{
    width: 100%;
    border: 1.5rem solid #fff;
    border-radius: .5rem;
    box-shadow: 0 .5rem 1rem rgba(0,0,0.1);
    height: 100%;
    object-fit: cover;
}

.about .row .video-container h3{
    position: absolute;
    top:50%; transform: translateY(-50%);
    font-size: 3rem;
    background: #fff;
    width: 100%;
    padding: 1rem 2rem;
    text-align: center;
    mix-blend-mode: screen;
}

.about .row .content{
    flex:1 1 40rem;
}

.about .row .content h3{
    font-size: 3rem;
    color: #333;
}

.about .row .content p{
    font-size: 1.5rem;
    color: #333;
    padding:.5rem 0;
    padding-top: 1rem;
    line-height: 1.5;
}

.icons-container{
    background: #fff;
    display: flex;
    flex-wrap: wrap;
    gap:1.5rem;
    padding-top: 5rem;
    padding-bottom: 5rem;
}

.icons-container .icons{
    background: #fff;
    border:.1rem solid rgba(0,0,0.1);
    padding:2rem;
    display: flex;
    align-items: center;
    flex:1 1 25rem;
}

.icons-container .icons img{
    height:5rem;
    margin-right: 2rem;
}

.icons-container .icons h3{
    color: #333;
    padding-bottom: .5rem;
    font-size: 1.5rem;
}

.icons-container .icons span{
    color: #999;
    font-size: 1.3rem;
}

/* media queries */
@media (max-width:991px){

section{
    padding: 2rem;
}

.home{
    background-position: left;
}

}

@media (max-width:768px) {

.home .content-h3{
    font-size: 5rem;
}

.home .content span{
    font-size: 2.5rem;
}

.icons-container .icons h3{
    font-size: 2rem;
}

.icons-container .icons span{
    font-size: 1.7rem;
}
}

@media (max-width:450px) {

.heading{
    font-size: 3rem;
}
}

      </style>

</head>
<body>

<?php include 'components/user_header.php'; ?>



<section class="home" id="home">

        <div class="content">
            <h3>Fitness Life</h3>
            <span>  </span>
            <p>Never give up before you try, see what you will get if you keep trying.</p>
            <a href="home.php#products" class="btn">shop now</a>
        </div>

    </section>

    <!-- about section starts -->

<section class="about" id="about">

<h1 class="heading"> about us </h1>

<div class="row">

    <div class="video-container">
        <video src="images/aboutus.mp4" loop autoplay muted></video>
        <h3>best fitness sellers</h3>
    </div>

    <div class="content">
        <h3>why choose us?</h3>
        <p>With us we can motivate you towards optimal health and together towards a healthier lifestyle.</p>
        <p>We are here to support you and inspire everyday health!</p>
        <a href="https://www.youtube.com/@gym.1" class="btn">learn more</a>
    </div>

</div>

</section>

<!-- about section ends -->

<section class="icons-container">

    <div class="icons">
        <img src="images/icon(1).png" alt="">
        <div class="info">
            <h3>free delivery</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/icon(2).png" alt="">
        <div class="info">
            <h3>10 days returns</h3>
            <span>moneyback guarantee</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/iconn(3).png" alt="">
        <div class="info">
            <h3>offer & gifts</h3>
            <span>on all orders</span>
        </div>
    </div>

    <div class="icons">
        <img src="images/icon(4).png" alt="">
        <div class="info">
            <h3>secure paymens</h3>
            <span>protected by paypa</span>
        </div>
    </div>

</section>



<section id="products" name="products" class="products">

   <h1 class="title">latest dishes</h1>

   <div class="box-container">

      <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 15");
         $select_products->execute();
         if($select_products->rowCount() > 0){
            while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
         <div class="name"><?= $fetch_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>$</span><?= $fetch_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">no products added yet!</p>';
         }
      ?>

   </div>

</section>

<?php include 'components/footer.php'; ?>


<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".hero-slider", {
   loop:true,
   grabCursor: true,
   effect: "flip",
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
});

</script>

</body>
</html>