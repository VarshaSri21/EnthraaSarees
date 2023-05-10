<?php
require('database.php');


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Details Product 2</title>
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
    <link rel="stylesheet" type="text/css" href="assets/css/style_custom.css">

    <!--bootstrap icon-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    
    <!--tag-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

        .foot{
            margin: auto;
            width: 10%;
        }
   
</style>
</head>

<body>
    <!-- header -->
    <header class="header">
        <div class="header-top clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 item-logo">
                        <a href="Home_03.html"><img class="logo-h3" src="D:\xampp\htdocs\project\images\Ennthra Logo.png" alt="" style ="margin: auto; width:50%;"></a>
                    </div>
                    <div class="col-md-6">
                        <div class="header-main">
                            <ul class="level1 level1_h1">
                                <li class="level11">
                                    <a href="index.php">home</a>
                                </li>
                                <li class="level11"><a href="About_us.html">about us</a></li>
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
                                <li class="level11"><a href="contact.php">Contact Us</a>
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
                                        <a href="register.php" title="">Register</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="hover-cart-user">
                                <a class="hover-icon-cart" href="cart.php">
                                    <span class="icon icon-ecommerce-basket"></span>
                                    <?php
                                        $query="SELECT * FROM cart_details WHERE status = '1' ";
                                        $c_result = $mysqli->query($query);
                                        if(mysqli_num_rows($c_result) > 0){
                                    ?>
                                    <p><?php echo mysqli_num_rows($c_result);?></p>
                                    <?php } ?>
                                </a>
                                <?php
                                    
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
                                                        <b><?php echo $cart['selling_price'];?></b>

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
                                        <a class="btn-checkout" href="Chect_out.html">Checkout</a>
                                        <a class="btn-cart" href="cart.php">View cart</a>
                                    </div>
                                 
                            </div>
                        <?php } ?>
                        </li>
                        <li class="btn-navbar-menu">


                            <a href="#"><span class="pe-7s-config"></span></a>
                            <div class="hover-menu-icon">
                                <div class="list-menu">
                                    <h4>account</h4>
                                    <ul>
                                        <?php if(isset($_SESSION['user_name'])){ ?>
                                            <li><a href="wishlist.php">Wishlist</a></li>
                                            <li><a href="account.php">My Account</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        <?php }else{ ?>

                                            <li><a href="login.php">Login</a></li>
                                            <li><a href="register.php">Register</a></li>
                                        <?php } ?>
                                    </ul>
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
                                    <h4 class="account">item</h4>
                                    <div class="product">
                                        <div class="item clearfix">
                                            <div class="img-prd">
                                                <img class="img-responsive" src="assets/images/product-bag1.png" alt="">
                                            </div>
                                            <div class="title">
                                                <h4 class="product-name"><a href="#">One shoulder bow top</a></h4>
                                                <div class="product-price">
                                                    <b>$300</b>
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
                                        <a class="btn-checkout" href="#">Checkout</a>
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
                            <li class="btn-navbar"><img src="assets/images/bar.png" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end/header -->
    <!-- banner -->
    <div class="banner-top">
        <div class="container">
            <ul>
                <li><a href="#">Shop /</a></li>
                <li><a href="#">Women /</a></li>
                <li><a href="#">One Shoulder Bow Top </a></li>
            </ul>
        </div>
    </div>
    <!-- end/banner -->
    <!-- quick-shop-v1 -->
    <section class="quick-shop-v1 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-push-4 col-sm-12 col-xs-12 qs-right">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <div class="slider-for-dt2">
                                <div class="item"><img class="img-responsive" src="assets/images/Details_product2/product_details2.png" alt=""></div>
                                <div class="item"><img class="img-responsive" src="assets/images/Details_product2/product_details2.png" alt=""></div>
                                <div class="item"><img class="img-responsive" src="assets/images/Details_product2/product_details2.png" alt=""></div>
                            </div>
                            <div class="lable"><span>sale</span></div>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="slider-nav-dt2">
                                <!--<div class="item"><img class="img-responsive" src="assets/images/Details_product2/product_details2.png" alt=""></div>
                                <div class="item"><img class="img-responsive" src="assets/images/Details_product2/product_details2.png" alt=""></div>
                                <div class="item"><img class="img-responsive" src="assets/images/Details_product2/product_details2.png" alt=""></div>
                            --></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-8 col-sm-12 col-xs-12 scr-3">
                    <div class="quick-left">
                        <h3>sarees</h3>
                        <!--<ul class="ul-sp">
                            <li>
                                <span class="pe-7s-star"></span>
                                <span class="pe-7s-star"></span>
                                <span class="pe-7s-star"></span>
                                <span class="pe-7s-star"></span>
                                <span class="pe-7s-star"></span>
                            </li>
                            
                        </ul>-->
                        <p class="pr-sku">SKU: MEN-8898</p>
                        <ul class="price price-detail-prd2">
                            <li>£250</li>
                            <li>
                                <del>£300</del>
                            </li>
                        </ul>
                        <!--<div class="color-product">
                            <h4>color: </h4>
                            <ul> 
                               <li style="background-color: blue;border:1px solid black;"></li>
                                <li style="background-color: yellow;border:1px solid #7accc8;"></li>
                                <li style="background-color: red; border:1px solid #c3c3c3;"></li>
                                <li style="background-color: green; border:1px solid #c3c3c3;"></li>
                            </ul>   
                        </div-->
                                                <!--<div class="side-product">
                            <h4>Category: </h4>
                            <div class="group-size">
                                <ul>
                                    <li><a href="#"></a></li>
                                    <li><a href="#">M</a></li>
                                    <li><a href="#">N</a></li>
                                    
                                </ul>
                                <a href="#">Check your size</a>
                            </div>
                        </div>-->
                        <div class="side-product">
                            <h4>qty: </h4>
                            <div class="quantity">
                                <button type="button" class="quantity-left-minus btn btn-number js-minus" data-type="minus" data-field="">
                                    <span class="minus-icon"><i class="ion-ios-plus-empty"></i></span>
                                </button>
                                <input type="text" name="number" value="1" class="product_quantity_number js-number">
                                <button type="button" class="quantity-right-plus btn btn-number js-plus" data-type="plus" data-field="">
                                    <span class="plus-icon"><i class="ion-ios-minus-empty"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="side-product">
                            <h4>tags: </h4>
                            <ul class="ul-tag">
                                <li><a href="#">sarees, </a></li>
                                <li><a href="#">kasavu, </a></li>
                                <li><a href="#">traditions kerala, </a></li>
                                <li><a href="#">kerala dress, </a></li>
                                <li><a href="#">traditional sarees, </a></li>
                                <li><a href="#">white sarees</a></li>
                            </ul>
                        </div>
                        <div class="side-product">
                            <h4>share: </h4>
                            <ul>
                                <li><a href="https://www.facebook.com/ennthra.ennthra"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://ennthra.com"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/ennthra_enterprises"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="https://web.whatsapp.com"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="add-to-bag">
                            <button type="button" class="add">
                                <span class="icon icon-ecommerce-basket"></span>
                                <small class="line1"> </small>
                                <span style="right: -15%;">add to cart</span>
                            </button>
                            <button type="button"><span class="pe-7s-like"></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end/quick-shop-v1 -->
    <!-- tab-details-prd2 -->
    <div class="tab-details-prd2">
        <div class="container">
            <div class="tab-details">
                <div class="tab-ul">
                   <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Details</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Tags</button>
  </div>

<div id="London" class="tabcontent">
  <h3>Description</h3>
  <p>Rani Saahiba brings you the Brilliant Saree with Zari embroidery on Art Tussar Silk fabric. With elegant colour combination of off-white fabric and golden Zari embroidery, this Saree is a suitable for all events and festivals.</p>
</div>

<div id="Paris" class="tabcontent">
  <h3>tags</h3>
  <ul>
  <li><a href="#">sarees </a></li>
                                            <li><a href="#">kasavu </a></li>
                                            <li><a href="#">traditions kerala </a></li>
                                            <li><a href="#">kerala dress </a></li>
                                            <li><a href="#">traditional sarees </a></li>
                                            <li><a href="#">white sarees</a></li>
                                        </ul>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
	                </div>
            </div>
        </div>
    </div>
    <!-- end/tab-details-prd2 -->
    <!-- special -->
    <section class="special related-product-v1">
        <div class="container">
            <h3>related products</h3>
            <div class="home-2">
                <div class="item">
                    <div class="product">
                        <div class="img-product">
                            <a href="#"><img class="img-responsive" src="images/sarees_images/EN_3459 (1).jpg" alt=""></a>
                        </div>
                        <div class="product-lable">
                            <span>sale</span>
                        </div>
                        <!--<div class="icon-prd">
                            <div class="table-cell-center">
                                <button type="submit" class="add-to-cart-btn btn">
                                    <span class="icon icon-ecommerce-basket"></span>
                                </button>
                            </div>
                            <div class="table-cell-center">
                                <button type="submit" class="add-to-wishlist-btn btn">
                                    <span class="pe-7s-like"></span>
                                </button>
                            </div>
                        </div>-->
                    </div>
                    <div class="title ">
                        <h4 class="product-name"><a href="product_description.php">wedding sarees</a></h4>
                        <span class="prosuct-price">
                            <b>rs300</b>
                            <del>rs250</del>
                        </span>
                    </div>
                </div>
                <div class="item">
                    <div class="product">
                        <div class="img-product">
                            <a href="#"><img class="img-responsive" src="images/sarees_images/EN_3460 (1).jpg" alt=""></a>
                        </div>
                        <!--<div class="icon-prd">
                            <div class="table-cell-center">
                                <button type="submit" class="add-to-cart-btn btn">
                                    <span class="icon icon-ecommerce-basket"></span>
                                </button>
                            </div>
                            <div class="table-cell-center">
                                <button type="submit" class="add-to-wishlist-btn btn">
                                    <span class="pe-7s-like"></span>
                                </button>
                            </div>
                        </div>-->
                    </div>
                    <div class="title ">
                        <h4 class="product-name"><a href="product_description.php">tissue sarees</a></h4>
                        <span class="prosuct-price">
                            <b>rs1300</b>
                                <del>rs1250</del>
                            </span>
                    </div>
                </div>
                <div class="item">
                    <div class="product">
                        <div class="img-product">
                            <a href="#"><img class="img-responsive" src="images/sarees_images/EN_3478 (1).jpg" alt=""></a>
                        </div>
                        <!--<div class="product-lable-new">
                            <span></span>
                        </div>-->
                        <!--<div class="icon-prd">
                            <div class="table-cell-center">
                                <button type="submit" class="add-to-cart-btn btn">
                                    <span class="icon icon-ecommerce-basket"></span>
                                </button>
                            </div>
                            <div class="table-cell-center">
                                <button type="submit" class="add-to-wishlist-btn btn">
                                    <span class="pe-7s-like"></span>
                                </button>
                            </div>
                        </div>-->
                    </div>
                    <div class="title ">
                        <h4 class="product-name"><a href="product_description.php">wedding sarees</a></h4>
                        <span class="prosuct-price">
                                 <b>rs800</b>
                                <del>rs7250</del>
                            </span>
                    </div>
                </div>
                <div class="item">
                    <div class="product">
                        <div class="img-product">
                            <a href="#"><img class="img-responsive" src="images/sarees_images/EN_3426.jpg" alt=""></a>
                        </div>
                        <div class="product-lable">
                            <span>sale</span>
                        </div>
                        <!--<div class="icon-prd">
                            <div class="table-cell-center">
                                <button type="submit" class="add-to-cart-btn btn">
                                    <span class="icon icon-ecommerce-basket"></span>
                                </button>
                            </div>
                            <div class="table-cell-center">
                                <button type="submit" class="add-to-wishlist-btn btn">
                                    <span class="pe-7s-like"></span>
                                </button>
                            </div>
                        </div>-->
                    </div>
                    <div class="title ">
                        <h4 class="product-name"><a href="product_description.php">cotton sarees</a></h4>
                        <span class="prosuct-price">
                                 <b>rs900</b>
                                <del>rs750</del>
                            </span>
                    </div>
                </div>
                <div class="item">
                    <div class="product">
                        <div class="img-product">
                            <a href="#"><img class="img-responsive" src="images/sarees_images/EN_3455 (1).jpg" alt=""></a>
                        </div>
                        <!--<div class="icon-prd">
                            <div class="table-cell-center">
                                <button type="submit" class="add-to-cart-btn btn">
                                    <span class="icon icon-ecommerce-basket"></span>
                                </button>
                            </div>
                            <div class="table-cell-center">
                                <button type="submit" class="add-to-wishlist-btn btn">
                                    <span class="pe-7s-like"></span>
                                </button>
                            </div>
                        </div>-->
                    </div>
                    <div class="title ">
                        <h4 class="product-name"><a href="product_description.php">cotton sarees</a></h4>
                        <span class="prosuct-price">
                                 <b>rs400</b>
                                <del>rs250</del>
                            </span>
                    </div>
                </div>
                <div class="item">
                    <div class="product">
                        <div class="img-product">
                            <a href="#"><img class="img-responsive" src="images/sarees_images/EN_3297.jpg" alt=""></a>
                        </div>
                        <div class="product-lable">
                            <span>sale</span>
                        </div>
                        <!--<div class="icon-prd">
                            <div class="table-cell-center">
                                <button type="submit" class="add-to-cart-btn btn">
                                    <span class="icon icon-ecommerce-basket"></span>
                                </button>
                            </div>
                            <div class="table-cell-center">
                                <button type="submit" class="add-to-wishlist-btn btn">
                                    <span class="pe-7s-like"></span>
                                </button>
                            </div>
                        </div>-->
                    </div>
                    <div class="title ">
                        <h4 class="product-name"><a href="product_description.php">cotton sarees</a></h4>
                        <span class="prosuct-price">
                                 <b>rs600</b>
                                <del>rs550</del>
                            </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end/special -->
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
                    <h2>Contact</h2>
                    <ul>
                        <li><strong><span class="pe-7s-map-marker"></span></strong> 26/17, S.V. Colony 3rd Street Extn, PN Rd, Tiruppur, Tamil Nadu 641602</li>
                        <li><strong><span class="pe-7s-call"></span></strong> 0421 424 2655</li>
                        <li><strong><span class="pe-7s-mail"></span></strong> ennthraenterprises@gmail.com</li>
                        <li><strong><span class="pe-7s-clock"></span></strong>Open ⋅ Closes 7:30PM
</li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <h2>our service</h2>
                    <ul class="our-ser-pol">
                        <li><a href="Home_03.html">Home</a></li>
                        <li><a href="About_us.html">About Us</a></li>
                        <li><a href="Product3_Columns.html">Shop</a></li>
                        <li><a href="Contact_us.html">Contact us</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-12">
                    <h2>Social Media</h2>
                    <ul class="our-ser-pol">
                        <li><a href="https://www.facebook.com/ennthra.ennthra">Facebook</a></li>
                        <li><a href="https://ennthra.com">Google +</a></li>
                        <li><a href="https://web.whatsapp.com">Whatsup</a></li>
                        <li><a href="https://www.instagram.com/ennthra_enterprises">Instagram</a></li>
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