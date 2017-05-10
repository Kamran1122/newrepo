<?php 
	require_once 'config.php';
	$userId= $_GET['userId'];
	$result = mysqli_query($db,"select productName,productCode,productCategory,productBrand from singleProduct where userId='2'");

	while ($row = mysqli_fetch_array($result))
		{
			$data[] = $row;
	}
echo json_encode($data);
