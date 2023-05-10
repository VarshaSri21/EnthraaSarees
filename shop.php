<?php
require('database.php');

if(isset($_REQUEST['cat']))
{
    $shop_query="SELECT * FROM products WHERE status = '1' and category_id=".$_REQUEST['cat']." ";    
  //  echo $shop_query;
}
else if(isset($_REQUEST['clr']))
{
    $shop_query="SELECT * FROM products WHERE status = '1' and clr='".$_REQUEST['clr']."'";
 //   echo $shop_query;
}
else if(isset($_REQUEST['price']))
{
    $shop_query="SELECT * FROM products WHERE status = '1' order by selling_price ".$_REQUEST['price']."";
   // echo $shop_quer
}
else
{
 $shop_query="SELECT * FROM products WHERE status = '1' ";   
}
$shop_results = $mysqli->query($shop_query);


if(isset($_GET['add_cart'])){

    if(!isset($_SESSION['user_id'])){
        header("location:login.php");
        exit;
    }
//echo "<pre>";print_r(!isset($_SESSION['user_id']));exit;
 // check if product already exists in cart or not


    $cart_query="SELECT * FROM cart_details WHERE product_id = '".$_GET['add_cart']."' and status=1 ";
    $cart_result = $mysqli->query($cart_query);
    

    $product_query="SELECT * FROM products WHERE product_id = '".$_GET['add_cart']."' ";
    $product_result = $mysqli->query($product_query);
    $product = $product_result->fetch_array(MYSQLI_ASSOC);
        // if product exists 



    if(mysqli_num_rows($cart_result) > 0){


        $cart = $cart_result->fetch_array(MYSQLI_ASSOC);
        $total_qty = $cart['quantity'] +  1;
       // reterive cart database and calucate amount and quantity


        $cart_update = 'UPDATE `cart_details` SET status=1, `quantity` = '.$total_qty.' WHERE  status=1 and`cart_details`.`product_id`  = '.$_GET['add_cart'];
        $cart_update_result = $mysqli->query($cart_update);
        // after calculation update into cart table

        if($cart_update){
            header('location:cart.php');

        }else{
            header('location:shop.php');

        }

    }else{
        // product not exists in cart table


        //$product_query="SELECT * FROM products WHERE product_id = '".$_GET['add_cart']."' ";
        //$product_result = $mysqli->query($product_query);

        //$product = $shop_results->fetch_array(MYSQLI_ASSOC);



        $shop_query="INSERT INTO `cart_details` (`cart_id`, `user_id`, `product_id`, `product_name`, `image`, `selling_price`, `quantity`, `status`) VALUES ('', '".$_SESSION['user_id']."','".$_GET['add_cart']."', '".$product['product_name']."', '".$product['image']."', '".$product['selling_price']."', '1', '1');";
        $shop_results = $mysqli->query($shop_query);
        
        header('location:cart.php');

    }
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product Columns3</title>
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

	<style>
		.imgi{
			margin: auto;
			width: 400px;
		}
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
                                <li class="btn-navbar"><img src="assets/images/bar.png" alt=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end/header -->
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
                                <!-- end/banner -->

        




                                <!-- group-menu -->
                                <section class="group-menu">
                                   <div class="container">

                                    <div class="row">
                                      <div class="row">
                                         <div class="col-md-8">
                                            <div class="filter">
                                               <h4><b>FILTER</b></h4>
                                               <div class="hover-filter clearfix">
                                                  <div class="col-md-4">
                                                     <div class="category-details">
                                                        <h3>categories</h3>
                                                        <div class="col-md-8 item">
                                                           
                                                           <div class="list-group-item">

                                                               <ul>
                                                                  <li>
                                                                     <a href="shop.php?cat=1"> wedding </a>


                                                                 </li>
                                                                 <li>
                                                                     <a href="shop.php?cat=2"> tissue sarees</a>
                                                                 </li>
                                                                 <li>
                                                                     <a href="shop.php?cat=3"> cotton sarees</a>
                                                                 </li>

                                                             </ul>
                                                         </div>

                                                     </div>

                                                 </div>

                                                 <div class="col-md-1"></div>
                            <!--<div class="col-md-5">
                            	<div class="options">
                            		<h3>options</h3>
                            		<div class="item item-color">
                            			<h4>color: </h4>
                            			<ul>

                            				<li class="blue"></li>

                            				<li></li>
                            				<li></li>
                            				<li></li>
                            			</ul>
                            		</div>

                            		
                                </div>
                                <div class="col-md-1"></div>
                            </div>-->
                        </div>
                                                  <div class="col-md-4">
                                                     <div class="category-details">
                                                        <h3>COLOR</h3>
                                                        <div class="col-md-8 item">
                                                           
                                                           <div class="list-group-item">

                                                               <ul>
                                                                  <li>
                                                                     <a href="shop.php?clr=red"> RED </a>


                                                                 </li>
                                                                 <li>
                                                                     <a href="shop.php?clr=yellow"> YELLOW</a>
                                                                 </li>
                                                                 <li>
                                                                     <a href="shop.php?clr=blue"> BLUE</a>
                                                                 </li>

                                                             </ul>
                                                         </div>

                                                     </div>

                                                 </div>

                                                 <div class="col-md-1"></div>
                            <!--<div class="col-md-5">
                                <div class="options">
                                    <h3>options</h3>
                                    <div class="item item-color">
                                        <h4>color: </h4>
                                        <ul>

                                            <li class="blue"></li>

                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>

                                    
                                </div>
                                <div class="col-md-1"></div>
                            </div>-->
                        </div>
                                            <div class="col-md-4">
                                                     <div class="category-details">
                                                        <h3>Price</h3>
                                                        <div class="col-md-12 item">
                                                           
                                                           <div class="list-group-item">

                                                               <ul>
                                                                  <li>
                                                                     <a href="shop.php?price=asc"> LOW TO HIGH </a>


                                                                 </li>
                                                                 <li>
                                                                     <a href="shop.php?price=desc"> HIGH TO LOW</a>
                                                                 </li>
                                                             </ul>
                                                         </div>

                                                     </div>

                                                 </div>

                                                 <div class="col-md-1"></div>
                            <!--<div class="col-md-5">
                                <div class="options">
                                    <h3>options</h3>
                                    <div class="item item-color">
                                        <h4>color: </h4>
                                        <ul>

                                            <li class="blue"></li>

                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>

                                    
                                </div>
                                <div class="col-md-1"></div>
                            </div>-->
                        </div>
                    </div>
                    <div  class="col-md-4 ordering">
                    	<div style="display:none" class="new">
                            <span>
                    		<h4><b>Sort By</b></h4>
                    		<select title="Pick a number" class="selectpicker">
                    			<option>price-low to high</option>
                    			<option>price-high to low</option>

                    		</select>
                        </span>
                    	</div>
                    	
                    </div>
                    
                </div>
            </div>
            <div class="ordering">
            <ul style="float: right;" class="clearfix">
                            <li class="icon-right list">
                                <img class="img-ic" src="assets/images/list.png" alt="">
                                <img class="act-img" src="assets/images/list_box_active.png" alt="">
                            </li>
                            <li class="icon-right col active">
                                <img class="img-ic" src="assets/images/list_box.png" alt="">
                                <img class="act-img" src="assets/images/list_active.png" alt="">
                            </li>
                        </ul>
                    </div>
        </section>
        <!-- end/group-menu -->
        <!-- products -->
        <section class="products">
        	<div class="container">
        		<?php 
        		if(mysqli_num_rows($shop_results) > 0){
        			while( $shop = $shop_results->fetch_array(MYSQLI_ASSOC)){ ?>
        				<div class="row">
        					<!-- product start -->
        					<div class="col-md-4 col-sm-6 col-xs-12 item">
        						<div class="img-product">
        							<a href="Details_Product2.html"><img class="img-responsive imgi" src="images\sarees_images\<?php echo $shop['image']; ?>" alt=""></a>
        							<div class="icon-prd">
        								<div class="add-to-bag">

        									<button type="button" class="add link" href= "shop.php?add_cart=<?php echo $shop['product_id'];?>">
        										<span class="icon icon-ecommerce-basket"></span>
        										<small class="line1"> </small>
        										<span class="txt-bag" style="right: -15%;">add to cart</span>
        									</button>
        									<button type="button"><span class="pe-7s-like"></span></button>
        								</div>
        							</div>
        						</div>
        						<div class="title ">
        							<h4 class="product-name"><a href="#"><?php echo $shop['product_name']; ?></a></h4>
        							<span class="prosuct-price">
        								<b><?php echo $shop['selling_price']; ?></b>
        								<?php if($shop['selling_price'] < $shop['mrp']){ echo '<del>'.$shop['mrp'].'</del>'; } ?>
        							</span>
        							<span class="sk">SKU: <b><?php echo $shop['style_code']; ?></b>

        							</span>
        							<p class="title-list"><?php echo $shop['description']; ?>

        						</p>
        						<div class="share-product">
        							<h4>share: </h4>
        							<ul>
        								<li><a href="https://www.facebook.com/ennthra.ennthra"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        								</li>
        								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        								<li><a href="https://www.instagram.com/ennthra_enterprises"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
        								<li><a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a></li>
        							</ul>
        						</div>
        						<div class="icon-prd">
        							<div class="add-to-bag">
        								<button type="button" class="add link" href= "shop.php?add_cart=<?php echo $shop['product_id'];?>">
        									<span class="icon icon-ecommerce-basket"></span>
        									<small class="line1"> </small>
        									<span class="txt-bag" style="right: -15%;">add to cart</span>
        								</button>
        								<button type="button"><span class="pe-7s-like"></span></button>
        							</div>
        						</div>
        					</div>
        				</div>
        				<!-- product end -->

        			<?php    }
        		}
        		?>
        	</div>
        </div>
    </section>
    <!-- end/products -->
    <!-- pagination-prd -->
    <!--<div class="pagination-prd">
    	<div class="pagination-container">
    		<nav class="pagination">
    			<span class="prev"><a href="#" title=""><i class="fa fa-angle-left"></i></a></span>
    			<p>Page: </p>
    			<span class="page"><a href="#" title="">1</a></span>
    			<span class="page"><a href="#" title="">2</a></span>
    			<span class="next"><a href="#" title=""><i class="fa fa-angle-right"></i></a></span>
    		</nav>
    	</div>
    </div>-->
    <!-- end/pagination-prd -->
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
<script type="text/javascript">
    $('body').on('click','.link',function(e){
        var link = $(this).attr('href');
        location.href=link;
    });
</script>
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