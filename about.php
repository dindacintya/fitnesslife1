<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <style>

.heading{
   display: flex;
   align-items: center;
   justify-content: center;
   gap:1rem;
   flex-flow: column;
   background-color: var(--black);
   min-height: 20rem;
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

@media (max-width:768px) {

    .icons-container .icons h3{
        font-size: 2rem;
    }
    
    .icons-container .icons span{
        font-size: 1.7rem;
    }
}

    </style>

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>about us</h3>
   <p><a href="home.php">home</a> <span> / about</span></p>
</div>

<!-- about section starts -->

<section class="about" id="about">

<div class="row">

    <div class="video-container">
        <video src="images/aboutus.mp4" loop autoplay muted></video>
        <h3>best fitness sellers</h3>
    </div>

    <div class="content">
        <h3>why choose us?</h3>
        <p>With us we can motivate you towards optimal health and together towards a healthier lifestyle.</p>
        <p>We are here to support you and inspire everyday health!</p>
        <a href="#" class="btn">learn more</a>
    </div>

</div>

</section>

<!-- about section ends -->


<!-- icons section starts -->

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

    <!-- icons section ends -->

    <!-- reviews section starts  -->

<section class="reviews">

<div class="swiper reviews-slider">

   <div class="swiper-wrapper">

      <div class="swiper-slide slide">
         <img src="images/org-4.jpg" alt="">
         <p>Come join me to make your life healthier and fitter.</p>
         <div class="stars">
            <i class="fa fa-phone"></i>
            <i class="fa fa-envelope"></i>
         </div>
         <h3>Alvin Santiago</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/org-3.jpg" alt="">
         <p>Fit is not a goal, it is a way of life.</p>
         <div class="stars">
            <i class="fa fa-phone"></i>
            <i class="fa fa-envelope"></i>
         </div>
         <h3>Alex Bradley</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/org-2.jpg" alt="">
         <p>Sweat is your fat cry.</p>
         <div class="stars">
            <i class="fa fa-phone"></i>
            <i class="fa fa-envelope"></i>
         </div>
         <h3>Jenifer Parker</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/org-6.jpg" alt="">
         <p>An hour of exercise is only 4 percent of your day!</p>
         <div class="stars">
            <i class="fa fa-phone"></i>
            <i class="fa fa-envelope"></i>
         </div>
         <h3>Nikolus Smith</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/org-5.jpg" alt="">
         <p>Be stronger than your excuses.</p>
         <div class="stars">
            <i class="fa fa-phone"></i>
            <i class="fa fa-envelope"></i>
         </div>
         <h3>Shirley Atkinson</h3>
      </div>

      <div class="swiper-slide slide">
         <img src="images/org-7.jpg" alt="">
         <p>Your body is a reflection of your lifestyle.</p>
         <div class="stars">
            <i class="fa fa-phone"></i>
            <i class="fa fa-envelope"></i>
         </div>
         <h3>Halbert Bourn</h3>
      </div>

   </div>

   <div class="swiper-pagination"></div>

</div>

</section>

<!-- reviews section ends -->

<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->=

<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>