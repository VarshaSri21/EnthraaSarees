<?php
require('database.php');
$errors=array();
if($_POST){
    $data = $_POST;
    //echo "<pre>";print_r($data);exit;
    $data["created_on"] = date('Y-m-d H:i:s');
    $billing_query="SELECT * FROM billing  WHERE status='1' ORDER BY bill_id DESC LIMIT 0,1";
    $billing_result = $mysqli->query($billing_query);
    if(mysqli_num_rows($billing_result) > 0){
        $billing_result=mysqli_fetch_array($billing_result);
        $old_bill_no = preg_replace('/[^0-9]/', '',$billing_result['bill_no']);
        $new_bill_no = $old_bill_no+1;
        $bill_no = str_pad($new_bill_no, 4, '0', STR_PAD_LEFT);
    }else{
        $bill_no = str_pad(1, 4, '0', STR_PAD_LEFT);
    }
    ///   billing table
    $ckquery = "INSERT INTO billing (bill_no,user_id, firstname, lastname, companyname, address, country, city, pincode, phone, email, created_on,status)
    VALUES('".$bill_no."','".$SESSION['user_id']."','".$data["firstname"]."','".$data["lastname"]."','".$data["companyname"]."','".$data["address"]."','".$data["country"]."','".$data["city"]."','".$data["pincode"]."','".$data["phone"]."','".$data["email"]."','".$data["created_on"]."','1')";
    if(mysqli_query($mysqli, $ckquery)){
        $last_id = mysqli_insert_id($mysqli);
        $cartquery="SELECT * FROM cart_details  WHERE status='1' AND user_id='".$_SESSION['user_id']."' ";
        $cartresult = $mysqli->query($cartquery);
        if(mysqli_num_rows($cartresult) > 0){
            while($cartresult=mysqli_fetch_array($cartresult)){
                $cartresult['product_total']=$cartresult['selling_price'] * $cartresult['quantity'] ;
                $billingquery = "INSERT INTO billing_relations (bill_id,product_id, product_name, product_image, product_price, product_quantity, product_total, created_on,status)
                VALUES('$last_id','".$cartresult["product_id"]."','".$cartresult["product_name"]."','".$cartresult["image"]."','".$cartresult["selling_price"]."','".$cartresult["quantity"]."','".$cartresult["product_total"]."','".$data["created_on"]."',1)";
                $result = $mysqli->query($billingquery);
            }
        }

    $cart_remove_query="UPDATE `project`.`cart_details` SET `status` = '0'  WHERE `status` = '1' AND `user_id`='".$_SESSION['user_id']."' ";
        $cart_remove_result = $mysqli->query($cart_remove_query);


    }
    $_SESSION['result'] = "success";
    $_SESSION['message'] ="Order Placed Succesfully";
    header("location:cart.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chect out</title>
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
        .foot{
            margin: auto;
            width: 10%;
        }
        .form-checkout form input {
         width: 100%;
         height: 45px;
         /* margin-left: 0px; */
         /* margin-right: 7px; */
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
                       <a href="index.php"><img class="logo-h3" src="D:\xampp\htdocs\project\images\Ennthra Logo.png" alt="" style ="margin: auto; width:50%;"></a>
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
                                        <a href="register.php" title="">Register</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="hover-cart-user">
                                <a class="hover-icon-cart" href="cart.php">
                                    <span class="icon icon-ecommerce-basket"></span>
                                    <p>01</p>
                                </a>
                                <div class="submenu mini-cart">
                                    <h4 class="account">item</h4>
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
                                        <div class="item clearfix">
                                            <div class="img-prd">
                                                <img class="img-responsive" src="assets/images/product-bag2.png" alt="">
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
                                        <a class="btn-checkout" href="checkout.php">Checkout</a>
                                        <a class="btn-cart" href="cart.php">View cart</a>
                                    </div>
                                </div>
                            </li>
                            <li class="btn-navbar-menu">
                                <a href="#"><span class="pe-7s-config"></span></a>
                                <div class="hover-menu-icon">
                                    <div class="list-menu">
                                        <h4>account</h4>
                                        <ul>
                                            <li><a href="login.php">Login</a></li>
                                            <li><a href="register.php">Register</a></li>
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
                            <li class="btn-navbar"><img src="assets/images/EN 3204.jpg" alt=""></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- end/header -->
    <!-- banner -->
    <section class="banner-top-v1 banner-blog banner-checkout">
        <h3>Check out</h3>
        <p>Quality for affordable price</p>
    </section>
    <!-- end/banner -->
    <section class="form-checkout">
        <div class="container">
            <div class="row">
                <form method="post">
                    <div class="col-md-12 form-details">
                        <div class="col-md-6">
                            <?php if(isset($_SESSION['user_id'])){
                                $user_query="SELECT * FROM login WHERE id = '".$_SESSION['user_id']."'";
                                $user_result = $mysqli->query($user_query);
                                if(mysqli_num_rows($user_result) > 0){
                                    $user = $user_result->fetch_array(MYSQLI_ASSOC);
                                }
                                ?>
                                <div class="">
                                    <h3>billing details</h3>
                                    <div class="col-md-6 item-ip">
                                        <input type="text" id="firstname" name="firstname" placeholder="First name *" value="<?php if(isset($user)){ echo $user['firstname']; } ?>">
                                    </div>
                                    <div class="col-md-6 item-ip">
                                        <input type="text" id="lastname" name="lastname" placeholder="Last name *" value="<?php if(isset($user)){ echo $user['lastname']; } ?>">
                                    </div>
                                    <div class="col-md-12 item-ip">
                                        <input type="text" id="companyname" name="companyname" placeholder="Company name" value="<?php if(isset($user)){ echo $user['companyname']; } ?>">
                                    </div>
                                    <div class="col-md-12 item-ip">
                                        <select title="Pick a number" class="selectpicker" name="country">
                                            <option>India</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 item-ip">
                                        <input type="text" id="address" name="address" placeholder="Stress address * (House number and street name)" value="<?php if(isset($user)){ echo $user['address']; } ?>">
                                    </div>
                                    <div class="col-md-12 item-ip">
                                        <input type="text" id="pincode" name="pincode" placeholder="Postcode / ZIP *" value="<?php if(isset($user)){ echo $user['pincode']; } ?>">
                                    </div>
                                    <div class="col-md-12 item-ip">
                                        <input type="text" id="city" name="city" placeholder="Town / City *" value="<?php if(isset($user)){ echo $user['city']; } ?>">
                                    </div>
                                    <div class="col-md-6 item-ip">
                                        <input type="text" id="phone" name="phone" placeholder="Phone *" value="<?php if(isset($user)){ echo $user['phone']; } ?>">
                                    </div>
                                    <div class="col-md-6 item-ip">
                                        <input type="text" id="email" name="email" placeholder="Email address *" value="<?php if(isset($user)){ echo $user['email']; } ?>">
                                    </div>
                                </div>
                                <div class="btn-pay">
                                    <div class="btn-black" style="width: 200px;">
                                     <input type="submit" value="Proceed to pay" style="position: relative;z-index: 100;font-size: 14px;font-weight: 400;text-transform: uppercase;">
                                 </div>
                             </div>
                         <?php }else{ ?>
                            <div class="btn-pay">
                             <a href="login.php"> LOGIN </a>
                         </div>
                     <?php } ?>
                 </div>
                 <div class="col-md-6 check-right">
                    <?php
                    $query="SELECT * FROM cart_details WHERE status = '1' AND user_id='".$_SESSION['user_id']."' limit 2 ";
                    $c_result = $mysqli->query($query);
                    if(mysqli_num_rows($c_result) > 0){ ?>
                    <div class="order">
                        <h3>your order</h3>
                        <table class="cart-table">
                            <tbody>
                                <?php
                                    $total = 0;
                                    $total_quantity = 0;
                                    while($cart = $c_result->fetch_array(MYSQLI_ASSOC)){
                                        $total = $total +( $cart['selling_price'] * $cart['quantity']);
                                        $total_quantity = $total_quantity + $cart['quantity'];
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="#"><img src="images\sarees_images\<?php echo $cart['image'];?>" alt="" style="height: 100px;width: 100px;"></a>
                                                <div class="prd-infor">
                                                    <a href="#"><?php echo $cart['product_name'];?></a>
                                                </div>
                                            </td>
                                            <td><span>x <?php echo $cart['quantity'];?></span></td>
                                            <td>
                                                <p><?php echo ($cart['selling_price'] * $cart['quantity']);?></p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="comunication">
                            <div>
                                <b>Subtotal: </b>
                                <span> <?php echo $total;?></span>
                            </div>
                            <div>
                                <b>TOTAL: </b>
                                <span> <?php echo $total;?></span>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
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