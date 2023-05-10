<?php
require('database.php');
$product_query="SELECT * FROM products WHERE new_arrival = '1' AND status = '1' ";
$product_results = $mysqli->query($product_query);

$cart_query= "SELECT * FROM cart_details WHERE status = '1' ";
    $cart_results = mysqli_query($mysqli,$cart_query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>About us</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/slick.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/fontello-codes.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontello-embedded.css">
    <link rel="stylesheet" href="assets/css/fontello-ie7-codes.css">
    <link rel="stylesheet" href="assets/css/fontello-ie7.css">
    <link rel="stylesheet" href="assets/css/fontello.css">
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Pe-icon-7-stroke.css">
    <link rel="stylesheet" href="assets/css/styles_Ecommerce.css">
    <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">
    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
         .imgbanner{
            margin: auto;
            width: 100%;
            height: auto;
            text-align: center;
        }

        .foot{
            margin: auto;
            width: 10%;
        }
        .banner-h3 .item .img-bn.imgbanner img {
         width: 100%;
         height: auto;
          }
    
    </style>
</head>

<body>
    <!--   header -->
    <header class="header">
        <div class="header-top clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 item-logo">
                       <a href="index.php"><img class="logo-h3" src="images\Ennthra Logo.png" alt="" style ="margin: auto; max-width: 150px;"></a>
                    </div>
                    <div class="col-md-6">
                        <div class="header-main">
                            <ul class="level1 level1_h1">
                                <li class="level11">
                                    <a href="index.php">home</a>
                                </li>
                                <li class="level11"><a href="About_us.php">about us</a></li>
                                <li class="level11">
                                    <a href="#">shop</a>
                                    <ul class="hover-blog">
                                        <li><a href="shop.php">Sarees</a></li>
                                        <!--<li><a href="Product4_Columns.html">Product4 Columns</a></li>
                                        <li><a href="Product5_Columns.html">Product5 Columns</a></li>
                                        <li><a href="Product_left_shidebar.html">Product Left Sidebar</a></li>
                                        <li><a href="Product_right_shidebar.html">Product Right Sidebar</a></li>
                                        <li><a href="Details_Product1.html">Details Product1</a></li>
                                        <li><a href="Details_Product2.html">Details Product2</a></li>-->
                                    </ul>
                                </li>
                                
                                <li class="level11">
                                    <a href="contact.php">Contact Us</a>
                                    
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 icon-header-right item-icon">
                        <ul>
                            <li class="hover-search">
                                <a class="click-search js-click-search" href="javascript:void(0)"><span class="pe-7s-search"></span></a>
                                <form class="menubar-search-form">
                                    <input class="form-control" type="search" placeholder="Search ....">
                                </form>
                            </li>
                            <li class="hover-cart-user"><a class="click-hover-user" href="#"><span class="pe-7s-user"></span></a>
                                <ul class="submenu submenu_user">
                                    <li>
                                        <a href="login.php" title="">Login</a>
                                    </li>
                                    <li>
                                        <a href="register.php" titlse="">Register</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="hover-cart-user">
                                <a class="hover-icon-cart" href="cart.php">
                                    <span class="icon icon-ecommerce-basket"></span>
                                    <?php
                                    if(isset($_SESSION['user_id'])){
                                        $query="SELECT * FROM cart_details WHERE status = '1' AND user_id='".$_SESSION['user_id']."' limit 2 ";
                                        $c_result = $mysqli->query($query);
                                        if(mysqli_num_rows($c_result) > 0){
                                    ?>
                                    <p><?php echo mysqli_num_rows($c_result);?></p>
                                    <?php } }else{ ?>
                                        <p>0</p>
                                    <?php } ?>
                                </a>
                                <?php
                                    if(isset($_SESSION['user_id'])){
                                    if(mysqli_num_rows($c_result) > 0){ ?>
                                <div class="submenu mini-cart">
                                    <h4 class="account">item</h4>
                                    
                                    <div class="product">
                                        <?php 
                                        $total = 0;
                                        $total_quantity = 0;
                                        while($cart = $c_result->fetch_array(MYSQLI_ASSOC)){ 
                                            $total = $total +( $cart['selling_price'] * $cart['quantity']);
                                            $total_quantity = $total_quantity + $cart['quantity'];
                                       ?>
                                            <div class="item clearfix">
                                                <div class="img-prd">
                                                    <img class="img-responsive" src="images\sarees_images\<?php echo $cart['image'];?>" alt="">
                                                </div>
                                                <div class="title">

                                                    <h4 class="product-name"><a href="#"><?php echo $cart['product_name'];?></a></h4>
                                                    <div class="product-price">
                                                        <b><?php echo $cart['selling_price'] * $cart['quantity'] ;?></b>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php }  ?>
                                    </div>
                                    <div class="menu-cart-total">
                                        <div class="list-money">
                                            <label>quantity:</label>
                                            <span class="money"><?php echo $total_quantity; ?></span>
                                        </div>
                                        <div class="list-money">
                                            <label>total:</label>
                                            <span class="money"><?php echo $total;?></span>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <!--<a class="btn-checkout" href="Chect_out.html">Checkout</a>-->
                                        <a class="btn-cart" href="cart.php">View cart</a>
                                    </div>
                                 
                            </div>
                        <?php } } ?>
                        </li>
                            <li class="btn-navbar-menu">
                                <a href="#"><span class="pe-7s-config"></span></a>
                                <div class="hover-menu-icon">
                                    <div class="list-menu">
                                        <h4>account</h4>
                                        <ul>
                                            <li><a href="#">Login</a></li>
                                            <li><a href="#">Register</a></li>
                                            <li><a href="#">Wishlist</a></li>
                                            <li><a href="#">Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-mobi">
            <div class="container-fluid">
                <div class="icon-hd-mb">
                    <ul class="icon-hd-mb-left">
                        <li>
                            <a href="javascript:void(0)" class="js-click-user"><span class="pe-7s-user"></span></a>
                            <ul class="submenu_user">
                                <li>
                                    <a href="/account" title="">Login</a>
                                </li>
                                <li>
                                    <a href="/account/register" title="">Register</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="js-click-cart"><span class="icon icon-ecommerce-basket"></span></a>
                            <div class="submenu mini-cart overlay">
                                <a href="javascript:void(0)" class="closebtn">&times;</a>
                                <div class="overlay-content">
                                    <h4 class="account">02 item</h4>
                                    <div class="product">
                                        <div class="item clearfix">
                                            <div class="img-prd">
                                                <img class="img-responsive" src="assets/images/product-bag1.png" alt="">
                                            </div>
                                            <div class="title">
                                                <h4 class="product-name"><a href="#">One shoulder bow top</a></h4>
                                                <div class="product-price">
                                                    <p>$300</p>
                                                    <del>$250</del>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu-cart-total">
                                        <div class="list-money">
                                            <label>price:</label>
                                            <span class="money">$160.00</span>
                                        </div>
                                        <div class="list-money">
                                            <label>shipping:</label>
                                            <span class="money">$10.00</span>
                                        </div>
                                        <div class="list-money">
                                            <label>total:</label>
                                            <span class="money">$170.00</span>
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <!--<a class="btn-checkout" href="#">Checkout</a>-->
                                        <a class="btn-cart" href="#">View cart</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="js-click-config"><span class="pe-7s-config"></span></a>
                            <div class="hover-menu-icon sidenav" id="mySidenav">
                                <a href="javascript:void(0)" class="close">&times;</a>
                                <div class="list-menu">
                                    <h4>account</h4>
                                    <ul>
                                        <li><a href="#">- Login</a></li>
                                        <li><a href="#">- Register</a></li>
                                        <li><a href="#">- Wishlist</a></li>
                                        <li><a href="#">- Compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="icon-hd-mb-right">
                        <li class="search">
                            <a class="click-search js-click-search-mobi" href="javascript:void(0)"><span class="pe-7s-search"></span></a>
                            <form class="menubar-search-form">
                                <input class="btn btn-sm btn-white" placeholder="Search ....">
                                <button type="button" class="btn btn-sm btn-white close-search-form">
                                    <span class="pe-7s-close"></span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="lg-hd clearfix">
                    <div class="col-sm-8 col-xs-8"><a href="#"><img src="assets/images/Home_02/logo.png" alt=""></a></div>
                    <div class="col-sm-4 col-xs-4 img-bar">
                        <ul>
                            <li class="btn-navbar"><img src="assets/images/EN 3204.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!--   header -->
    <!--  banner -->
            <section class="banner-h3">
                  <div class="item">
                            <div class="img-bn imgbanner"><img src="images\banner.png" alt="" align="middle"class="img-responsive"></div>
                            <div class="title-banner">
                                <div class="txt">
                                    <h2>ENNTHRA SAREES</h2>
                                    <h4>Shop at ennthra enterprises to explore the kerala's tradition</h4></div></div>
                        </div>
    
        </section>
    <!--<section class="banner-top-v1 banner-blog  banner-checkout banner-about">
        <h3>about us</h3>
        <img src="images\banner.jpg" alt="" align="middle"class="img-responsive">
        <p>trust worth quality with best deals!</p>
    </section>-->
    <!-- end/ banner -->
    <!--out -->
    <section class="out-mission">
        <div class="container">
            <div class="row">
                <h3>About Us</h3>
                <div class="col-md-6">
                    <div class="prd-about">
                        <img class="img-responsive" src="images\sarees_images\EN_3306.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="item-text"><span><font align ="justify"><p>Ennthra, the traditional Kasavu Saree for cool and comfortable wear made in premium cotton and Silk Zari fabric.Ennthra enterprises is a Kuthampully Handloom Cloth manufacturing company for items like Kerala Traditional wear Sarees. We weave Kerala sarees in a stipulated time as per the customer's orders. We also have a great collection of Kerala Traditional Sarees in our shop located at tirpur. Our average monthly production capacity is 5000 Kerala Sarees. Besides USA,Singapore,Dubai and London, we are acknowledged by many other foreign countries for the quality of our products.</p></font></span></div>

                    <div class="item-text"><span><font align ="justify"><p>We have more than 100 years of Weaving Experience. Asha handlooms was started around 20 years ago. Since then, our primary value has been to provide our customers with high quality products. In the words our proprietor Mr. Balaji, "Quality is Our Motto".</p></font></span></div>

                    <div class="item-text"><span><font align ="justify"><p>We played a significant role in making Handloom Kasavu Sarees,Kerala Tissue Sarees and cotton sarees world famous. We always stick to our motto of providing high quality clothes to our customers which made us what we are today.</p></font></span></div>

                    <div class="item-text"><span><font align ="justify"><p>We are pioneers in  Designer Sarees and Kerala Designer Tissue Sarees which has a unique flavour of latest trends compiled with Kerala tradition made to reality with the craftmanship of our weavers.We now have a wide range of Ethnic collection of Handloom and Kerala Traditional Set-sarees which is completely Hand Woven.</p></font></span></div>
                    <div class="item-text"><span><font align ="justify"><p>Kerala sarees,kasavu sarees,handloom sarees, Kerala tissue sarees online,kerala tissue sarees buy online,buy kerala kasavu saree at low price</p></font></span></div>
                </div>
            </div>
        </div>
    </section>
    <!--end/out -->
    <!--  blog -->
    <section class="blog blog_about_us">
        <div class="title-top">
            <h3>Our Mission</h3>
            <span><font align ="justify"><p>Ennthra affiliate program is free and enables members to earn revenue by placing a link or links on their web site </p></font></span>
        </div>
<!--
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item-blog">
                        <div class="img-blog">
                            <img src="D:\xampp\htdocs\project\images\sarees images\EN 3382.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="text-blog">
                            <a class="topic">Web design</a>
                            <p>Lorem Ipsum is not simply random text</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item-blog">
                        <div class="img-blog">
                            <img src="D:\xampp\htdocs\project\images\sarees images\EN 3375.jpg" alt="" class="img-responsive">
                        </div>
                        <div class="text-blog">
                            <a class="topic">App mobile</a>
                            <p>Lorem Ipsum is not simply random text</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item-blog">
                        <div class="img-blog">
                            <img src="D:\xampp\htdocs\project\images\sarees images\EN 3354 (1).jpg" alt="" class="img-responsive">
                        </div>
                        <div class="text-blog">
                            <a class="topic">HTML/CSS</a>
                            <p>Lorem Ipsum is not simply random text</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
-->
    </section>
    <!--  end/blog -->
    <section class="out_team">
        <div class="title-top">
            <h3>Our Vission</h3>
            <span><font align ="justify"><p> it is our unique value system that has made us what we are today. An ethical approach to business ensures integrity in all our dealings, making us synonymous with reliability and trustworthiness. Our core focus has always been to make sure that each person connected with us- our vendor, employee of customer – finds our association fulfilling as well as fruitfull. As we change with the times, we will ensure that our values stay constant, because more than anything else, we will remain a group that values its values... to come....</p></font></span>
        </div>
<!--
        <div class="container">
            <div class="js-team">
                <div class="item_team">
                    <div class="anwe">
                        <div class="img-avt">
                            <img src="assets/images/About_us/avt5.png" alt="" class="img-responsive">
                        </div>
                        <div class="awe-media-hover dark fullpage">
                            <div class="fp-table">
                                <div class="fp-table-cell center">
                                    <ul class="list-socials list-large list-light">
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Google+"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="awe-media">
                        <span>Halie</span>
                        <p>Designer</p>
                    </div>
                </div>
                <div class="item_team">
                    <div class="anwe">
                        <div class="img-avt">
                            <img src="assets/images/About_us/avt4.png" alt="" class="img-responsive">
                        </div>
                        <div class="awe-media-hover dark fullpage">
                            <div class="fp-table">
                                <div class="fp-table-cell center">
                                    <ul class="list-socials list-large list-light">
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Google+"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="awe-media">
                        <span>Halie</span>
                        <p>Designer</p>
                    </div>
                </div>
                <div class="item_team">
                    <div class="anwe">
                        <div class="img-avt">
                            <img src="assets/images/About_us/avt3.png" alt="" class="img-responsive">
                        </div>
                        <div class="awe-media-hover dark fullpage">
                            <div class="fp-table">
                                <div class="fp-table-cell center">
                                    <ul class="list-socials list-large list-light">
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Google+"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="awe-media">
                        <span>Halie</span>
                        <p>Designer</p>
                    </div>
                </div>
                <div class="item_team">
                    <div class="anwe">
                        <div class="img-avt">
                            <img src="assets/images/About_us/avt2.png" alt="" class="img-responsive">
                        </div>
                        <div class="awe-media-hover dark fullpage">
                            <div class="fp-table">
                                <div class="fp-table-cell center">
                                    <ul class="list-socials list-large list-light">
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Google+"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="awe-media">
                        <span>Halie</span>
                        <p>Designer</p>
                    </div>
                </div>
                <div class="item_team">
                    <div class="anwe">
                        <div class="img-avt">
                            <img src="assets/images/About_us/avt1.png" alt="" class="img-responsive">
                        </div>
                        <div class="awe-media-hover dark fullpage">
                            <div class="fp-table">
                                <div class="fp-table-cell center">
                                    <ul class="list-socials list-large list-light">
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Google+"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <li><a href="#" data-toggle="tooltip" title="" data-original-title="Pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="awe-media">
                        <span>Halie</span>
                        <p>Designer</p>
                    </div>
                </div>
            </div>
        </div>
-->
    </section>
    <!-- footer -->
    <footer class="footerv2">
        <div class="container ">
            <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="instagram">
                        <h2>@instagram</h2>
                        <ul>
                                    <h4>wedding collections<li><a href="#"><img class="img-responsive foot" src="images/sarees_images/EN_3459 (1).jpg" alt=""></a></li></h4>
                                    <h4>tissue sarees<li><a href="#"><img class="img-responsive foot" src="images/sarees_images/EN_3460 (1).jpg" alt=""></a></li></h4>
                                    <h4>cotton sarees<li><a href="#"><img class="img-responsive foot" src="images/sarees_images/EN_3478 (1).jpg" alt=""></a></li></h4>
                                </ul>
                        <ul class="coppy-right">
                            <li>© 2020 <strong>Ennthra</strong> | </li>
                            <li>Design by Ctrl Next Solutions | </li>
                            <li>All rights reserved</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 ct">
                    <h2>Contact Us</h2>
                    <ul>
                        <li><strong><span class="pe-7s-map-marker"></span></strong> 26/17, S.V. Colony 3rd Street Extn, PN Rd, Tiruppur, Tamil Nadu 641602</li>
                        <li><strong><span class="pe-7s-call"></span></strong> 0421 424 2655</li>
                        <li><strong><span class="pe-7s-mail"></span></strong> antonfashion@domail.com</li>
                        <li><strong><span class="pe-7s-clock"></span></strong>Open ⋅ Closes 7:30PM
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <h2>our service</h2>
                    <ul class="our-ser-pol">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="About_us.php">About Us</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="contact.php">Contact us</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <h2>Social Media</h2>
                    <ul class="our-ser-pol">
                         <li><a href="https://www.facebook.com/ennthra.ennthra">Facebook</a></li>
                        <li><a href="https://ennthra.com">Google +</a></li>
                        <li><a href="9500582836">Whatsup</a></li>
                        <li><a href="https://www.instagram.com/ennthra_enterprises/">Instagram</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- end/footer -->
    <!-- menu-mobile -->
    <div class="off-canvas-nav">
        <div class="off-canvas-header">
            <span class="remove-menumobile pe-7s-close"></span>
            <img src="assets/images/Home_01/logo.png" class="custom-logo" alt="Logo">
        </div>
        <div class="noo-main-canvas">
            <ul id="menu-main-menu" class="nav-collapse navbar-nav">
                <li class="noo-menu">
                    <a href="#">Home</a>
                    <ul class="sub-menu">
                        <li><a href="Home_01.html">Home 01</a></li>
                        <li><a href="Home_02.html">Home 02</a></li>
                        <li><a href="Home_03.html">Home 03</a></li>
                    </ul>
                    <i class="fa noo-sub-icon fa-caret-down"></i>
                </li>
                <li class="noo-menu">
                    <a href="#">Shop</a>
                    <ul class="sub-menu">
                        <li><a href="Product3_Columns.html">Product3 Columns</a></li>
                        <li><a href="Product4_Columns.html">Product4 Columns</a></li>
                        <li><a href="Product5_Columns.html">Product5 Columns</a></li>
                        <li><a href="Product_left_shidebar.html">Product Left Sidebar</a></li>
                        <li><a href="Product_right_shidebar.html">Product Right Sidebar</a></li>
                        <li><a href="Details_Product1.html">Details Product1</a></li>
                        <li><a href="Details_Product2.html">Details Product2</a></li>
                    </ul>
                    <i class="fa fa-caret-down noo-sub-icon"></i>
                </li>
                <li class="noo-menu">
                    <a href="Product3_Columns.html">Womens</a>
                </li>
                <li id="menu-item-895" class="noo-menu"><a href="#">Mens</a>
                    <ul class="sub-menu">
                        <li><a href="#">T-shirt</a></li>
                        <li><a href="#">Coat cold</a></li>
                        <li><a href="#">Jeans</a></li>
                        <li><a href="#">Bracelet</a></li>
                        <li><a href="#">Hand bag</a></li>
                        <li><a href="#">Choker</a></li>
                    </ul>
                    <i class="fa fa-caret-down noo-sub-icon"></i></li>
                <li class="noo-menu"><a href="#">Lookbook</a></li>
                <li class="noo-menu">
                    <a href="#">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="Blog3.html">Blog3</a></li>
                        <li><a href="Blog4.html">Blog4</a></li>
                        <li><a href="Blog_sidebar_left.html">Blog sidebar left</a></li>
                        <li><a href="Blog_sidebar_right.html">Blog sidebar right</a></li>
                    </ul>
                    <i class="fa fa-caret-down noo-sub-icon"></i>
                </li>
                <li class="noo-menu">
                    <a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="About_us.html">About us</a></li>
                        <li><a href="Chect_out.html">Check out</a></li>
                        <li><a href="Comming_soon_page.html">Comming soon page</a></li>
                        <li><a href="Contact_us.html">Contact us</a></li>
                        <li><a href="Your_cart.html">Your cart</a></li>
                    </ul>
                    <i class="fa fa-caret-down noo-sub-icon"></i>
                </li>
            </ul>
        </div>
    </div>
    <!-- end/menu-mobile -->
    <!-- LOAD JQUERY -->
    <script src="assets/js/jquery-1.12.4.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDyCxHyc8z9gMA5IlipXpt0c33Ajzqix4"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/select.js"></script>
    <script src="assets/js/jquery.fancybox.min.js"></script>
    <script src="assets/js/bootstrap-slider.min.js"></script>
    <!-- Custom jQuery -->
    <script src="assets/js/main.js"></script>
</body>

</html>