<?php
 ob_start();
 session_start();
 require_once 'config.php';
 
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: index.html");
  exit;
 }
 // select loggedin users detail
 $res=mysqli_query($db,"SELECT * FROM users WHERE userId=".$_SESSION['user']);
 $userRow=mysqli_fetch_array($res);
$userId = $userRow['userId'];
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Apptech</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- modernizr JS
        ============================================ -->        
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	   
		<!-- Bootstrap CSS
		============================================ -->		
        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- font-awesome CSS
		============================================ -->
        <link rel="stylesheet" href="css/font-awesome2.min.css">
		<!-- material-design CSS
		============================================ -->
        <link rel="stylesheet" href="css/material-design-iconic-font.min.css">
		<!-- magnific-popup CSS
		============================================ -->
        <link rel="stylesheet" href="css/magnific-popup.css">
        <!-- venobox CSS
		============================================ -->
        <link rel="stylesheet" href="css/venobox.css">
		<!-- meanmenu CSS
		============================================ -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- slick CSS
		============================================ -->
        <link rel="stylesheet" href="css/slick.css">
		<!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="css/owl.carousel.css"> 
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/owl.transitions.css">
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="css/animate.css">
		<!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="css/normalize.css">
		<!-- main CSS
		============================================ -->
        <link rel="stylesheet" href="css/main.css">
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="style.css">
		<!-- responsive CSS
		============================================ -->
        <link rel="stylesheet" href="css/responsive.css">
        
        <!-- Style customizer (Remove these two lines please) -->
        <link rel="stylesheet" href="css/color/color-5.css">
        
		
    </head>
    <body>
        <div class="wrapper" id="dashboard-wrapper">
            <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->
            <!-- Add your site or application content here -->
            <header class="header-area">
                <!-- Menu Area
                ============================================ -->
                <div id="main-menu" class="sticker">
                    <div class="container" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="logo float-left">
                                    <a href="index.html"><img src="img/logo/logo.png" alt="logo" /></a>
                                </div>
                                <div class="main-menu float-right">
                                    <nav>
                                        <ul>
                                            <li class="active"><a href="#features-area">FEATURES</a></li>
                                            <li><a href="#pricing-area">PRICING</a></li>
                                            <li><a target="_blank" href="blog.html">BLOG</a></li>
                                            <li><a target="_blank" href="help.html">HELP CENTER</a></li>
                                            <li><a href="register.html">START A TRIAL</a></li>
                                            <li><a href="logout.php?logout">LOGOUT</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 hidden-lg hidden-md">
                                <div class="mobile-menu">
                                    <nav>
                                        <ul>
                                            <li class="active"><a href="#features-area">FEATURES</a></li>
                                            <li><a href="#pricing-area">PRICING</a></li>
                                            <li><a target="_blank" href="blog.html">BLOG</a></li>
                                            <li><a target="_blank" href="help.html">HELP CENTER</a></li>
                                            <li><a href="register.html">START A TRIAL</a></li>
                                            <li><a href="login.html">LOGIIN</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Home Area
            ============================================ -->
            
            <!-- About Area
            ============================================ -->
            
            
             <!-- Home Area
            ============================================ -->
            
            <!-- Video Area
            ============================================ -->
            
            


            <div class="question-area ptb-120">
                <div class="container" id="container-dashboard2">
                    <div class="row main-row">
                        <div class="col-md-9">


                            <!-- DASHBOARD CODE START -->
            <div class="alert alert-information" style="background-color:#35DB7F !important; color:#FFFFFF;width: 100%;">
            <span >
                Welcome! Now start adding products that you want to track by clicking <button class="btn information-box-button btn-primary" data-place="top"><i id="zmdi-white" class="zmdi zmdi-plus"></i> Add single product</button> below. <br /> After adding your product, simply click <button class="btn information-box-button btn-primary"><i id="zmdi-white" class="zmdi zmdi-plus" ></i><span> Add URL</span></button> to add both your own and your competitors' exact product links for that product. <br /> You can also use our <button class="btn information-box-button btn-primary" data-place="top"><i id="zmdi-white" class="zmdi zmdi-view-list"></i> Batch Import <sup>beta</sup></button> feature to add multiple products and URLs in bulk. <br /> <br />
                Need help? Check out our tutorials:             <i id="zmdi-white" class="zmdi zmdi-file"></i>
                <a href="#" class="tutorial" target="_blank"> PDF Tutorial </a>&nbsp
                <i id="zmdi-white" class="zmdi zmdi-videocam"></i>
                <a href="#" class="video_tutorial"> Video Tutorial</a>
            </span>
        </div> 
        <!-- TOP ALERT -->

        <div class="well-dashboard2">
            <div class="container">
                <div class="form-div" style="display: none;" >
                <form class="form-group" method="post" action="">
                    <label>Product name:</label><br>
                    <input type="text" id="proName" name="productName" class="textbox" >
                    <span class="text-danger" id="productName" ></span>
                    <br><br>
                    <label>Product code:</label><br>
                    <input type="text" name="productCode" id="proCode" class="textbox" >
                    <span class="text-danger" id="productCode" ></span>
                    <br><br>
                    <label>Category:</label><br>
                    <input type="text" name="productCategory" id="proCategory" class="textbox" >
                    <span class="text-danger" id="productCategory" ></span>
                    <br><br>
                    <label>Brand:</label><br>
                    <input type="text" name="productBrand" id="proBrand" class="textbox" >
                    <span class="text-danger" id="productBrand" ></span>
                    <br><br>
                    
                    <button type="button" class="btn btn-success btn-small" id="formSub" onclick="proFormSub(<?php echo $userId; ?>)"><li class="zmdi zmdi-check" ></li></button>
                    <button type="button" class="btn btn-danger btn-small" id="formSlideUp" ><li class="zmdi zmdi-close" ></li></button>
                    </div>
                </form>
            </div>

            <div >
                <button class="btn btn-primary single-product-btn" id="formSlideDown" ><li class="zmdi zmdi-plus" ></li> Add single product</button>
                
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#myModal" ><li class="zmdi zmdi-view-list" ></li> Batch Import <sup>beta</sup></button>
            <div id="products-div" >
                <?php
                $result = mysqli_query($db,"select productId,productName,productCode,productCategory,productBrand from singleProduct where userId='$userId order by productId desc'");

    while ($row = mysqli_fetch_assoc($result))
        {
            
            ?>
                
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
    
    


               <!-- <hr>
                <div class="products-view" >
                    <div class="row" >
                        <div class="col-md-9" >
                            <a href="#" style="color: black; "><h3><span class="zmdi zmdi-star"></span>
                            <span id="showProName">Product Name this the product name</span></h3></a>
                        </div>
                        <div class="col-md-3" >
                            <button class="btn" ><span class="zmdi zmdi-calendar" ></span></button>
                            <button class="btn" ><span class="zmdi zmdi-edit" ></span></button>
                            <button class="btn" ><span class="zmdi zmdi-close" ></span></button>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-9" >
                            
                            <div style="display: inline-flex; font-size: 20px;" >
                                <div id="showBrand">Company</div><div id="showCategory"></div><div id="showCode">&nbspProduct Code</div>
                            </div>
                            
                        </div>
                        <div class="col-md-3" >
                            <button class="btn" ></button>
                            <button class="btn" ></button>
                            <button class="btn" ></button>
                            <button class="btn" ></button>
                        </div>
                    </div>
                </div> 

                <table class="table table-condensed table-striped products_table" >
                    <thead>
                        <tr>
                            <th>Company</th>
                            <th>Price</th>
                            <th>Change</th>
                            <th>Position</th>
                            <th>Stock</th>
                            <th class="last_update" >Updated</th>
                            <th class="last_update_short" >Updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td_site" >
                                <a href="#">Company</a>
                            </td>
                            <td class="td_price" >
                                <i class="zmdi zmdi-time" ></i>
                            </td>
                            <td class="td_change" >
                                <i class="zmdi zmdi-time" ></i>
                            </td>
                            <td class="td_position" >
                                <i><strong>-</strong></i>
                            </td>
                            <td class="td_stock" >
                                <i><strong>-</strong></i>
                            </td>
                            <td class="td_update" >
                                Will be updated in a few hours.
                            </td>
                            <td class="td_edit" >
                                <a href="#"><i class="zmdi zmdi-edit" ></i></a>
                                <a href="#"><i class="zmdi zmdi-close" ></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table> -->
                <div class="url_field" id="<?php echo $row['productId'] ?>" >
                    <label>URL: </label>
                    <input type="text" id="<?php echo $row['productId']; ?>" class="textbox" style="padding:5px; width:40%;">
                    <button class="btn btn-success" onclick="btnUrlSubmit( <?php echo $row['productId']; ?>, <?php echo $userId; ?> )" > <span  class="zmdi zmdi-check" ></span> </button>
                    <button class="btn btn-danger" onclick="btnClose(<?php echo $row['productId'] ?>)" > <span  class="zmdi zmdi-close" ></span> </button>
                </div>
                <button class="btn btn-success" onclick="btnUrl(<?php echo $row['productId'] ?>);" >
                    <span class="zmdi zmdi-plus" ></span> Add URL
                </button>       <hr>          <?php

    } ?>
            </div>
        </div>    

    </div>

</div>
    
                        <div class="col-md-3 panel-sidebar">
                            
                                <div class="panel-well" >
                                    <h3><li class="zmdi zmdi-label" ></li>  Price Changes</h3>
                                    <table class="table_sidebar_filter" >
                                        <tbody>
                                            <tr>
                                                <td class="sidebar_info_label" >Increased</td>
                                                <td class="sidebar_info" >0 Products</td>
                                            </tr>
                                            <tr>
                                                <td class="sidebar_info_label" >Decreased</td>
                                                <td class="sidebar_info" >0 Products</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>           
                                </div>
                                <div class="panel-well" >
                                    <h3><li class="zmdi zmdi-open-in-new" ></li> Out of stock</h3>
                                    <table class="table_sidebar_filter" >
                                        <tbody>
                                            <tr>
                                                <td class="sidebar_info_label" >Competitors</td>
                                                <td class="sidebar_info" >0 Products</td>
                                            </tr>
                                            <tr>
                                                <td class="sidebar_info_label" >My Store</td>
                                                <td class="sidebar_info" >0 Products</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>           
                                </div>
                                <div class="panel-well" >
                                    <h3><li class="zmdi zmdi-format-valign-center" ></li> Position</h3>
                                    <table class="table_sidebar_filter" >
                                        <tbody>
                                            <tr>
                                                <td class="sidebar_info_label" >I'm Cheapest</td>
                                                <td class="sidebar_info" >0 Products</td>
                                            </tr>
                                            <tr>
                                                <td class="sidebar_info_label" >I'm Cheaper</td>
                                                <td class="sidebar_info" >0 Products</td>
                                            </tr>
                                            <tr>
                                                <td class="sidebar_info_label" >Average</td>
                                                <td class="sidebar_info" >0 Products</td>
                                            </tr>
                                            <tr>
                                                <td class="sidebar_info_label" >I'm Higher</td>
                                                <td class="sidebar_info" >0 Products</td>
                                            </tr>
                                            <tr>
                                                <td class="sidebar_info_label" >I'm Highest</td>
                                                <td class="sidebar_info" >0 Products</td>
                                            </tr>
                                            <tr>
                                                <td class="sidebar_info_label" >All equal</td>
                                                <td class="sidebar_info" >0 Products</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            
                            
                        </div>
                        </div>
                </div>
            </div>

            <!-- About Area
            ============================================ -->
            
            <!-- About Area
            ============================================ -->
            
            <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top:130px;">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h2 class="modal-title">Import products</h2>
        </div>
        <div id="tablink" >Add new products</div>
        <div class="modal-body" id="modal-upload-area">
            <div id="modal-upload-text" >
                <h3>Upload your products list</h3>
                <div>Click here or drag your file to upload Excel file here</div>      
            </div>
        </div>
        <div id="modal-footer" >
          <h4>How to add new products</h4>
          <div> <b>1.</b> <a href="#">Download sample excel files</a></div>
          <div><b>2.</b> Add your products and competitor links like in sample file.</div>
          <div><b>3.</b> Upload your populated product list and you're done!</div>
          <div style="padding-top:5px; text-align: center;" >Do not hesitate to <a href="#">contact</a> us if you need any help.</div>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
            
            
            
            
            <footer class="footer-area pt-120 pb-80">
                <div class="container">
                    <div class="col-md-12 text-center">
                        <div class="footer-all">
                            <div class="footer-logo">
                                <a href="#"><img src="img/logo/2.png" alt="" ></a>
                            </div>
                            <div class="footer-icon">
                                <ul>
                                    <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-pinterest"></i></a></li>
                                    <li><a href="#"><i class="zmdi zmdi-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <div class="footer-text">
                                <span>
                                    Copyright © 2016
                                    <a href="http://bootexperts.com/" target="_blank">Bootexperts</a>
                                    all rights reserved.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- start scrollUp
            ============================================ -->
            <div id="toTop">
                <i class="fa fa-chevron-up"></i>
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
		<!-- jquery
		============================================ -->		
        <script src="js/vendor/jquery-1.11.3.min.js"></script>
		<!-- bootstrap JS
		============================================ -->		
        <script src="js/bootstrap.min.js"></script>
        <!-- ajax mails JS
        ============================================ -->
        <script src="js/ajax-mail.js"></script>
		<!-- plugins JS
		============================================ -->		
        <script src="js/plugins.js"></script>
		
        <!-- main JS
		============================================ -->
        <script src="js/main.js"></script>    
        <script>
                    

                  function btnUrlSubmit(productId,userId){
                        // var url = $("input#"+productId).val()
                        //alert(url); 
                        var url = "";
                    $(".textbox").each(function() {
                         url = $(this).val();
                         
                    });
                    console.log(url);
                    url = "";
                   /*     
                    if (url!="") {
                    var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/
                   if (!regexp.test(url)) {
                            alert("its not valid");
                        } 
                  else
                        {
                            alert("its valid");
                        }
                    } */

                    }
        </script>
    </body>
    
</html>
