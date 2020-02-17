<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap.css">
</head>
<body>
<div class="container">

	<?php

$product[0]= [	'id'=>1,'name'=>'LB960963','price'=>'13.5','popular'=>true,	'img'=>'https://img.alicdn.com/imgextra/i2/1893020059/TB2cTdXufuSBuNkHFqDXXXfhVXa_!!1893020059.jpg_500x500.jpg'	];
$product[1]= [	'id'=>2,'name'=>'LB945758','price'=>'130.5','popular'=>false,	'img'=>'https://gd3.alicdn.com/imgextra/i3/2012126524/O1CN013bHI5P1y42TFMY6E4_!!2012126524.jpg_500x500.jpg'	];
$product[2]= [	'id'=>3,'name'=>'LB964453','price'=>'999.5','popular'=>false,	'img'=>'https://gd2.alicdn.com/imgextra/i2/2012126524/O1CN01WMLHfP1y42TRCZq3L_!!2012126524.jpg_500x500.jpg'	];
$product[3]= [	'id'=>4,'name'=>'LB91111','price'=>'2019.5','popular'=>false	,	'img'=>'https://myfashion2017.s3.amazonaws.com/productimage/Thefashion_20170218145631-556369.JPG'];
$product[4]= [	'id'=>5,'name'=>'LB33333','price'=>'333333','popular'=>true,	'img'=>'https://gd2.alicdn.com/imgextra/i2/1985570015/TB2aqpFi8yWBuNkSmFPXXXguVXa_!!1985570015.jpg_500x500.jpg'	];

$product[5]= [	'id'=>6,'name'=>'LB445563','price'=>'222','popular'=>false,	'img'=>'https://myfashion2017.s3.amazonaws.com/productimage/Thefashion_20180313073016-855198.PNG'	];
$product[6]= [	'id'=>7,'name'=>'LB964563','price'=>'678','popular'=>false,	'img'=>'https://gd1.alicdn.com/imgextra/i4/1811023121/TB20sLZmvBNTKJjSszeXXcu2VXa_!!1811023121.jpg_500x500.jpg'	];
$product[7]= [	'id'=>8,'name'=>'LB000005','price'=>'11','popular'=>false,	'img'=>'https://myfashion2017.s3.amazonaws.com/thum/Thefashion_20181001120320-320942.JPG'	];
$product[8]= [	'id'=>9,'name'=>'LB333335','price'=>'13.598','popular'=>false,	'img'=>'https://myfashion2017.s3.amazonaws.com/thum/Thefashion_20190118054849-824729.JPG'	];
$product[9]= [	'id'=>10,'name'=>'LB55555','price'=>'13.5567','popular'=>false,	'img'=>'https://gd3.alicdn.com/imgextra/i3/2012126524/O1CN013bHI5P1y42TFMY6E4_!!2012126524.jpg_500x500.jpg'	];


	 ?>
<!-- popular -->
<h2>Popular</h2>
<!-- <div class=""> -->
<?php
		foreach($product as $item)
		{
			if($item['popular']==true)
			{
?>
				<div style="width:180px;display:table-cell;height:300px;" class="well"><p>Popular</p>
					<img src="<?php echo $item['img'];?> " class="img-responsive" >

					<h4>Name : <?php echo $item['name']; ?></h4>
					<p>Price : <?php echo $item['price']; ?>$</p>
				</div>
<?php
			}
			else{
				?>
				<div style="width:180px;display:table-cell;height:300px;" >
					<p>In Stock</p>
					<img src="<?php echo $item['img'];?> " class="img-responsive" >
					<h4>Name : <?php echo $item['name']; ?></h4>
					<p>Price : <?php echo $item['price']; ?>$</p>
				</div>
				<?php
			}
		}
?>
</div>
<hr>

<!-- instock -->
<!-- <h2>Instock</h2>
<div class="">
<?php
	//	foreach($product as $item)
		{
		//	if($item['popular']!=true)
			{
?>
				<div style="width:180px;display:table-cell;" class="well">
					<img src="<?php// echo $item['img'];?> " class="img-responsive" >
					<h4>Name : <?php// echo $item['name']; ?></h4>
					<p>Price : <?php// echo $item['price']; ?>$</p>
				</div>
<?php
			}
		}
?>
</div> -->

</div>
</body>
</html>
