<?php include '../common/constant.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
<title><?= constant("OWNERCOMPANYNAME") ?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<!--css-part-->
<link rel="stylesheet" href="../assets/admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="../assets/admin/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../assets/admin/css/uniform.css" />
<link rel="stylesheet" href="../assets/admin/css/select2.css" />
<link rel="stylesheet" href="../assets/admin/css/matrix-style.css" />
<link rel="stylesheet" href="../assets/admin/css/matrix-media.css" />
<link rel="stylesheet" href="../assets/admin/font-awesome/css/font-awesome.css"  />
<link rel="stylesheet" href="../assets/admin/css/openSans.css" />
<link rel="shortcut icon" href="../images/logo.jpg">
<!--end-css-part-->

</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.php"><?= constant("OWNERCOMPANYNAME") ?></a></h1>
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
      <div id="breadcrumb">
        <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
        <a  class="current" data-original-title="Go to Home">Contact Us</a>
      </div>

    </div>
  <!--End-breadcrumbs-->

  <!--Action boxes-->
    <div class="container-fluid">
      

      <div class="row-fluid">
        <!-- add container -->
        <!-- Edit Container -->
        <!-- view container -->  
        <div class="widget-box">

             <!-- <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
                <h5>Reviews Details</h5>
               <div class="btn btn-primary btn-lg pull-right" style="margin-top: 3px; margin-right: 3px;" id="btnCreate">Create Reviews</div>
               <div class="btn btn-danger btn-lg pull-right" style="margin-top: 3px; margin-right: 3px; display: none;" id="btnCancel">Cancel</div>
              </div>
              <div></div>  -->
          <div class="widget-content ">
            <h4><center>View Reviews/Feedback/Queries </center></h4>
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sr.No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Subject</th>
                  <th>Message</th>
                    <th>Action</th>    
                </tr>
              </thead>
              <tbody id="tableContainer">
                <?php
                  $record = $obj->select("*","contact_us","1");                           
                  if(is_array($record)):
                    foreach ($record as $key => $value) :                   
                ?>
                  
                <tr class="gradeX">
                  <td><?= $key+1 ?></td>
                  <td><?= $value[1] ?></td> 
                  <td><?= $value[2] ?></td> 
                  <td><?= $value[3] ?></td> 
                  <td><?= $value[4] ?></td>      
                  <td>
                     <center>
                            <a class="remove-element tip-bottom" id="d-<?= $value[0]  ?>" data-original-title="Remove"><i class="icon-trash"></i></a>   
                    </center>
                    </td>
                    
                </tr>
                <?php
                   endforeach;  
                  endif;  
                ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  <!--End-Action boxes-->  

</div>

<!--end-main-container-part-->

<!-- bootstrap model end-->


<!--Footer-part-->
  <?php require('partial/footer.php'); ?>

<!--end-Footer-part-->

<!--js-part-->
<script src="../assets/admin/js/jquery.min.js"></script> 
<script src="../assets/admin/js/jquery.ui.custom.js"></script> 
<script src="../assets/admin/js/bootstrap.min.js"></script> 
<script src="../assets/admin/js/jquery.uniform.js"></script> 
<script src="../assets/admin/js/select2.min.js"></script> 
<script src="../assets/admin/js/jquery.dataTables.min.js"></script> 
<script src="../assets/admin/js/matrix.js"></script> 
<script src="../assets/admin/js/matrix.tables.js"></script>
<script src="../assets/admin/js/jquery.validate.js"></script> 
<script src="../assets/admin/js/jquery.wizard.js"></script> 
<script src="../assets/js/user/contact_us.js"></script>
<!--end-js-part-->

</body>
</html>
