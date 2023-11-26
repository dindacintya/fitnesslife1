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
        <title>fitnesslife-sistem kebugaran</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- custom scc file link -->
    <link rel="stylesheet" href="style.css">

    <style>
        /* CSS untuk dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }
    
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 10px; /* Menambahkan sudut bulat */
        }
    
        .dropdown-content a {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: #333;
        }
    
        .dropdown-content a:hover {
            background-color: #ddd;
        }
    
        /* Tampilkan dropdown saat tombol user di-hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
    
    </head>
    <body>

    <!-- header section starts -->

    <header>
        <a href="#" class="logo">Fitness<span>.</span></a>
    
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#products">products</a>
            <a href="#products">trainers</a>
            <a href="#review">orders</a>
            <a href="#contact">contact</a>
        </nav>
    
        <div class="icons">
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $total_cart_items = $count_cart_items->rowCount();
         ?>
         <a href="search.php"><i class="fas fa-search"></i></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $total_cart_items; ?>)</span></a>
         <div id="user-btn" class="fas fa-user"></div>
         <div id="menu-btn" class="fas fa-bars"></div>
      </div>

        <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            if($select_profile->rowCount() > 0){
               $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <p class="name"><?= $fetch_profile['name']; ?></p>
         <div class="flex">
            <a href="profile.php" class="btn">profile</a>
            <a href="components/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
         </div>
         <p class="account">
            <a href="login.php">login</a> or
            <a href="register.php">register</a>
         </p> 
         <?php
            }else{
         ?>
            <p class="name">please login first!</p>
            <a href="login.php" class="btn">login</a>
         <?php
          }
         ?>
      </div>

   </section>
    </header>


    <!-- header section ends -->

    <!-- header section starts -->

    <section class="home" id="home">

        <div class="content">
            <h3>Fitness Life</h3>
            <span>  </span>
            <p>Jangan pernah menyerah sebelum kamu berusaha, lihatlah apa yang akan didapat jika terus berusaha</p>
            <a href="#product" class="btn">shop now</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- about section starts -->

    <section class="about" id="about">

        <h1 class="heading"> <span> about </span> us </h1>

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

<!-- products section starts -->

<section class="products" id="products">

    <h1 class="heading"> latest <span>products</span> </h1>

    <div class="box-container">

    <?php
         $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 6");
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
         <a href="category.php?category=<?= $fetch_products['category']; ?>" class="cat"><?= $fetch_products['category']; ?></a>
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

    </div>

   <div class="more-btn">
      <a href="menu.html" class="btn">veiw all</a>
   </div>

</section>

<!-- products section ends -->

<!-- reviews section starts -->

<section class="review" id="review">

    <h1 class="heading"> customer's <span>review</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="starts">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>This treadmill really makes my running workouts more effective. I like the ability to adjust incline and speed easily. This is a good investment for my health.</p>
            <div class="user">
                <img src="images/org-1.jpg" alt="">
                <div class="user-info">
                    <h3>olivia aaa</h3>
                    <span>happy customers</span>
                </div>
            </div>
            <span class="fas fa-quote-right"></span>
        </div>

        <div class="box">
            <div class="starts">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>Sportswear from this brand is always my choice. They look great and are very functional. The material they use is durable and sweat-resistant.</p>
            <div class="user">
                <img src="images/org-2.jpg" alt="">
                <div class="user-info">
                    <h3>keisya rrr</h3>
                    <span>happy customers</span>
                </div>
            </div>
            <span class="fas fa-quote-right"></span>
        </div>

        <div class="box">
            <div class="starts">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>ASet bobot iki awet banget lan nyaman digunakake. Aku wis nggunakake kanggo sawetara sasi lan wis katon Tambah ing kekuatan sandi. Padha sampurna kanggo latian ngarep.</p>
            <div class="user">
                <img src="images/org-3.jpg" alt="">
                <div class="user-info">
                    <h3>alexx haha</h3>
                    <span>happy customers</span>
                </div>
            </div>
            <span class="fas fa-quote-right"></span>
        </div>

    </div>

</section>

<!-- reviews section ends -->

<!-- contact section starts -->

<section class="contact" id="contact">

    <h1 class="heading"> <span> contact </span> us </h1>

    <div class="row">

        <form action="">
            <input type="text" placeholder="name" class="box">
            <input type="email" placeholder="email" class="box">
            <input type="number" placeholder="number" class="box">
            <textarea name="" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="send message" class="btn">
        </form>

        <div class="image">
            <img src="" alt="">
        </div>

    </div>

</section>

<!-- contact section ends -->

<!-- footer section starts -->

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick link</h3>
            <a href="#">home</a>
            <a href="#">about</a>
            <a href="#">products</a>
            <a href="#">review</a>
            <a href="#">contact</a>
        </div>

        <div class="box">
            <h3>extra link</h3>
            <a href="#">my account</a>
            <a href="#">my order</a>
            <a href="#">my favorite</a>
        </div>

        <div class="box">
            <h3>locations</h3>
            <a href="#">lowokwaru</a>
            <a href="#">samaan</a>
            <a href="#">kalpataru</a>
            <a href="#">celaket</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href="#">+123-456-7890</a>
            <a href="#">gymlife@gmail.com</a>
            <a href="#">malang, lowokwaru - 65141</a>
        </div>

    </div>

    <div class="credit"> created by <span> dinda cintya </span> | all rights reserved </div>

</section>

<!-- footer section ends -->

<!-- fas fa-user section starts -->
<!-- fas fa-user ends -->

    <!-- header section ends -->

    <script>
        
document.querySelector('#user-btn').onclick = () =>{
   profile.classList.toggle('active');
   navbar.classList.remove('active');
}
     
    </script>
    <script src="js/script.js"></script>
    </body>

</html>