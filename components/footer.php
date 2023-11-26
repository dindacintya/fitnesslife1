<style>
    
.footer .box-container{
    display: flex;
    flex-wrap: wrap;
    gap:1.5rem;
}

.footer .box-container .box{
    flex:1 1 25rem;
}

.footer .box-container .box h3{
    color: #333;
    font-size: 2.5rem;
    padding:1rem 0;
}

.footer .box-container .box a{
    display: block;
    color: #666;
    font-size: 1.5rem;
    padding:1rem 0;
}

.footer .box-container .box a:hover{
   color:var(--pink);
   text-decoration: underline;
}

.footer .box-container .box img{
    margin-top: 1rem;
}

.footer .credit{
    text-align: center;
    padding: 1.5rem;
    margin-top: 1.5rem;
    padding-top: 2.5rem;
    font-size: 2rem;
    color: #333;
    border-top: .1rem solid rgba(0,0,0.1);
}

    </style>

<section class="footer">

    <div class="box-container">

        <div class="box">
            <h3>quick link</h3>
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="products.php">products</a>
            <a href="orders.php">orders</a>
            <a href="review.php">review</a>
            <a href="contact.php">contact</a>
        </div>

        <div class="box">
            <h3>extra link</h3>
            <a href="profile.php">my account</a>
            <a href="orders.php">my order</a>
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