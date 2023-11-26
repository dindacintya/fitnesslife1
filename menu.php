<style>

/* Style for the product section */
#all-products {
    padding: 20px;
}

.title {
    font-size: 24px;
    margin-bottom: 15px;
}

.box-container {
    display: flex;
    flex-wrap: wrap;
}

.box {
    border: 1px solid #ddd;
    padding: 15px;
    margin: 10px;
    text-align: center;
}

.box img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.name {
    font-weight: bold;
    margin-bottom: 5px;
}

.flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.price span {
    font-weight: bold;
    margin-right: 5px;
}

.qty {
    width: 40px;
}

/* Style for the "View All" button */
.more-btn {
    text-align: center;
    margin-top: 20px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    text-decoration: none;
    background-color: #4CAF50;
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #45a049;
}

/* Style for the empty message */
.empty {
    text-align: center;
    font-style: italic;
    color: #888;
}

</style>



<section id="all-products" name="all-products" class="all-products">

   <h1 class="title">All Dishes</h1>

   <div class="box-container">

      <?php
         $select_all_products = $conn->prepare("SELECT * FROM `products`");
         $select_all_products->execute();
         if($select_all_products->rowCount() > 0){
            while($fetch_all_products = $select_all_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <form action="" method="post" class="box">
         <input type="hidden" name="pid" value="<?= $fetch_all_products['id']; ?>">
         <input type="hidden" name="name" value="<?= $fetch_all_products['name']; ?>">
         <input type="hidden" name="price" value="<?= $fetch_all_products['price']; ?>">
         <input type="hidden" name="image" value="<?= $fetch_all_products['image']; ?>">
         <a href="quick_view.php?pid=<?= $fetch_all_products['id']; ?>" class="fas fa-eye"></a>
         <button type="submit" class="fas fa-shopping-cart" name="add_to_cart"></button>
         <img src="uploaded_img/<?= $fetch_all_products['image']; ?>" alt="">
         <div class="name"><?= $fetch_all_products['name']; ?></div>
         <div class="flex">
            <div class="price"><span>$</span><?= $fetch_all_products['price']; ?></div>
            <input type="number" name="qty" class="qty" min="1" max="99" value="1" maxlength="2">
         </div>
      </form>
      <?php
            }
         }else{
            echo '<p class="empty">No products available!</p>';
         }
      ?>

   </div>

</section>
