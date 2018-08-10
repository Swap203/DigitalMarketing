<?php include '../common/constant.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
<title></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!--css-part-->
  <?php require('partial/css.php'); ?>
<!--<link rel="shortcut icon" href="">-->
<!--end-css-part-->

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.php"></a></h1>
</div>
<!--close-Header-part--> 

<!-- top menu start -->
  <?php require('partial/top-header.php'); ?> 

<!-- top menu end -->


<!--sidebar-menu-->
  <?php require('partial/navbar.php'); ?>
<!--sidebar-menu-->

<!--main-container-part-->
<div id="content">

  <!--breadcrumbs-->
    <div id="content-header">
      <div id="breadcrumb"> <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
  <!--End-breadcrumbs-->

  <!--Action boxes-->
    <div class="container-fluid">
      

      <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
          <h5>Site Analytics</h5>
        </div>
        <div class="widget-content" >
          <div class="row-fluid">
            <div class="span12">
              <ul class="quick-actions">
                
                <li class="bg_ly"> <a href="dashboard.php"><i class="icon-dashboard"></i>Dashboard</a> </li>

                <li class="bg_lb"> <a href="orders.php"><i class="icon-inbox"></i>Team Work</a> </li>

                <li class="bg_ls"> <a href="tshirts.php"><i class="icon-th"></i>Our Team</a> </li>
                  
                <li class="bg_ly"> <a href="payments.php"><i class="icon-tint"></i>Testimonial</a> </li>
                
                <li class="bg_lb"> <a href="payments.php"><i class="icon-phone"></i>Contact Us</a> </li>
                  
                <li class="bg_lo"> <a href="logout.php"><i class="icon-key"></i> Logout</a> </li> 
                               
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  <!--End-Action boxes-->  

</div>

<!--end-main-container-part-->

<!--Footer-part-->
  <?php require('partial/footer.php'); ?>

<!--end-Footer-part-->

<!--js-part-->
  <?php require('partial/js.php'); ?>
<!--end-js-part-->

</body>
</html>
