<?php
include('database_connection.php');
if(isset($_POST["action"]))
{
	$query="SELECT *FROM product where product_status='1'";
	if(isset($_POST["minimum_price"],$_POST["maximum_price"])&& !empty($_POST))
	{
		$query.=" AND product_price BETWEEN'".$_POST["minimum_price"]."'AND '".$_POST
		";
	}
	if(isset($_POST["brand"]))
	{
		$brand_filter =implode("','",$_POST["brand"]);
		$query.="
		AND product_brand IN ('".$brand_filter."')
		";
		"
	}
	if(isset($_POST["ram"]))
	{
		$brand_filter =implode("','",$_POST["ram"]);
		$query.="
		AND product_brand IN ('".$ram_filter."')
		";
		"
	}
$statement=$connect->prepare($query);
$statement->execute();
$result=$statement->fetchAll();
$total_row=$statement->rowcount();
$output='';
if($total_row>0)
{
	foreach($result as $rowcount{
		$output.='
		<div class="col-sm-4 col-lg-3 col-md-3">
		<img src="image/'.$row['product_image'].'" alt="" class="img-responsive">
		<p align="center"><strong><a href="...">'.$row['product_name'].'</a></strong></p>'
		<h4 st6le="text-align:center;" class="text-danger">'.$row['product_price'].'</h4>
		<p>camera:'.$row['product_camera'].'MP<br/>
		brand:'.$row['product_brand'].'<br/>
		ram:'.$row['product_ram'].'<br/>
		storage:'.$row['product_storage'].'GB</p>
		</div>
		</div>


		';
		}}
		else{
			$output='<h3>no data found</h3>';

		}
		echo $output;
	}
}
}