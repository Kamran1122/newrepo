<?php

include_once 'config.php';

$userId =  htmlspecialchars(strip_tags( trim($_POST['userId'])));
$productName = htmlspecialchars(strip_tags( trim($_POST['productNameInput'])));
$productCode = htmlspecialchars(strip_tags( trim($_POST['productCodeInput'])));
$productCategory = htmlspecialchars(strip_tags( trim($_POST['productCategoryInput'])));
$productBrand = htmlspecialchars(strip_tags( trim($_POST['productBrandInput'])));
	
	$query = "INSERT INTO singleProduct(userId,productName,productCode,productCategory,productBrand) VALUES('$userId','$productName','$productCode','$productCategory','$productBrand')";
	mysqli_query($db,$query);

$result = mysqli_query($db,"select productId,productName,productCode,productCategory,productBrand from singleProduct where userId='$userId' order by productId desc");

	while ($row = mysqli_fetch_assoc($result))
		{
			
			?>
				<hr>
                <div class='products-view' >
                    <div class='row' >
                        <div class='col-md-9' >
                            <a href='#'' style='color: black; '>
                            <h3>
                                <span class='zmdi zmdi-star'></span>
                                <span id='showProName'><?php echo $row['productName'] ?></span>
                            </h3>
                            </a>
                        </div>
                        <div class='col-md-3' >
                            <button class='btn' ><span class='zmdi zmdi-calendar' ></span></button>
                            <button class='btn' ><span class='zmdi zmdi-edit' ></span></button>
                            <button class='btn' ><span class='zmdi zmdi-close' ></span></button>
                        </div>
                    </div>
                    <div class='row' >
                        <div class='col-md-9' >
                            <div style='display: inline-flex; font-size: 20px;'' >
                                <div id='showBrand'><?php echo $row['productBrand'] ?></div>
                                <div id='showCategory'>
                                </div><div id='showCode'>
                                &nbsp<?php echo $row['productCode'] ?>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-3' >
                        <button class='btn' ></button>
                        <button class='btn' ></button>
                        <button class='btn' ></button>
                        <button class='btn' ></button>
                    </div>
                </div>
            </div>
    
                <div class="url_field" id="<?php echo $row['productId'] ?>" >
                    <label>URL: </label>
                    <input type="text" name="" class="textbox" style="padding:5px; width:40%;" > 
                    <button class="btn btn-success" > <span  class="zmdi zmdi-check" ></span> </button>
                    <button class="btn btn-danger" onclick="btnClose(<?php echo $row['productId'] ?>)" > <span  class="zmdi zmdi-close" ></span> </button>
                </div>
                <button class="btn btn-success" onclick="btnUrl(<?php echo $row['productId'] ?>);" >
                    <span class="zmdi zmdi-plus" ></span> Add URL
                </button>                 <?php

    } ?>
	 
            

 




	