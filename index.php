<?php include("config/connection_database.php"); ?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cake | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <!-- <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="./about.html">About</a></li>
                            <li><a href="./shop.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./wisslist.html">Wisslist</a></li>
                                    <li><a href="./Class.html">Class</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header> -->
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Making your life sweeter one bite at a time!</h2>
                                <a href="#" class="primary-btn">Our cakes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <div class="hero__text">
                                <h2>Making your life sweeter one bite at a time!</h2>
                                <a href="#" class="primary-btn">Our cakes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about__text">
                        <div class="section-title">
                            <span>Tentang Kami</span>
                        </div>
                        <p>
                            Rizky Bakery berdiri tahun _ adalah toko roti, kue kering dan kue yang mengutamakan produk produk-produk tradisional khas Indonesia seperti lemper, kelepon, kue lumpur dan berbagai jenis kue maupun jajanan pasar lainnya.didirikan oleh seorang wanita yang memiliki jiwa wirausaha dan gigih bernama Rustin.
                            Awal mula didirikan hanya kue kue tradisional seperti nagasari, apem dan lain lain. Sistem penjualannya memproduksi dalam jumlah banyak dan membuka toko yang bertempat di Jalan Atletik No.03 Kel. Tasikmadu, Kec. Lowokwaru, Kota Malang
                            Penjualan yang meningkat dan bertambahnya pelanggan memotivasi untuk
                            mengembangkan produknya dengan menambah menu lebih bervariasi lagi. Beliau
                            mempelajari informasi tentang kue di media cetak dan elektronik yang kemudian
                            dikombinasikan dengan keahliannya hingga menghasilkan produk yang di minati
                            pelanggannya meski tidak jarang beliau gagal. Akhirnya beliau mempunyai
                            rahasia resep yang menjadi ciri khas produknya baik dalam segi citarasa. Cita rasa yang
                            berbeda dan harga yang ditawarkanpun relatif terjangkau.  Namun harga tetap disesuaikan dengan produk yang dihasilkan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Categories Section Begin -->
    <div class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php
                    $sql = "SELECT * FROM categories";
                    $query = mysqli_query($mysqli, $sql);
                    while ($category = mysqli_fetch_array($query)) {
                    ?>
                        <div class="categories__item">
                            <div class="categories__item__icon">
                                <span class="flaticon-005-pancake""></span>
                                <h5><?php echo $category['category_name'] ?></h5>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <?php
                $sql = "SELECT items.item_name as item_name, items.thumbnail as thumbnail, categories.category_name as category_name 
                        FROM items
                        INNER JOIN categories ON items.category_id = categories.id";
                $query = mysqli_query($mysqli, $sql);
                while ($item = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="admin/action/thumbnail/<?php echo $item['thumbnail']; ?>">
                                <div class="product__label">
                                    <span><?php echo $item['category_name']; ?></span>
                                </div>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#"><?php echo $item['item_name']; ?></a></h6>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <center><a href="user" class="primary-btn">Order Sekarang</a></center>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Testimonial Section Begin -->
    <section class="testimonial spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span>Testimonial</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testimonial__slider owl-carousel">
                    <?php
                    $sql = "SELECT reviews.description as Review, users.name as User 
                        FROM reviews
                        INNER JOIN orders ON reviews.order_id = orders.id
                        INNER JOIN users ON orders.user_id  = users.id ";
                    $query = mysqli_query($mysqli, $sql);
                    while ($reviews = mysqli_fetch_array($query)) {
                    ?>
                        <div class="col-lg-6">
                            <div class="testimonial__item">
                                <div class="testimonial__author">
                                    <div class="testimonial__author__text">
                                        <h5><?php echo $reviews['User'] ?></h5>
                                    </div>
                                </div>
                                <p><?php echo $reviews['Review'] ?></p>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Section End -->

    <!-- Instagram Section Begin -->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="instagram__text">
                        <div class="section-title">
                            <span>Dokumentasi Produk</span>
                            <h2>Gallery</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/home/home_1.jpeg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="img/home/home_2.jpeg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/home/home_3.jpeg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/home/home_3.jpeg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="img/home/home_1.jpeg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="img/home/home_2.jpeg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Instagram Section End -->

    <!-- Map Begin -->
    <div class="map">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-7">
                    <div class="map__inner">
                        <h6>Kota Malang</h6>
                        <ul>
                            <li>Jl. Atletik No.3, Tasikmadu, Kec. Lowokwaru, Kota Malang, Jawa Timur 65152</li>
                            <li>rizkybakery1@gmail.com</li>
                            <li>085330676138</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="map__iframe">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.7940939286136!2d112.62180831477883!3d-7.916564994297219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62a0136d7a393%3A0x47f6e90bf3cf1e95!2sJl.%20Atletik%20No.3%2C%20Tasikmadu%2C%20Kec.%20Lowokwaru%2C%20Kota%20Malang%2C%20Jawa%20Timur%2065152!5e0!3m2!1sid!2sid!4v1655081600245!5m2!1sid!2sid" height="300" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <!-- Map End -->

    <!-- Footer Section Begin -->
    <footer class="footer set-bg" data-setbg="img/footer-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer__widget">
                        <h6>Jam Buka</h6>
                        <ul>
                            <li>Senin - Jumat: 07:00 - 14:00</li>
                            <li>Sabtu: 07:00 – 16:30</li>
                            <li>Minggut: Tutup</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.barfiller.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>
