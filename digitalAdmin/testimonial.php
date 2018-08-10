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
<link rel="stylesheet" href="../assets/admin/css/datepicker.css" />
<link rel="stylesheet" href="../assets/admin/font-awesome/css/font-awesome.css"  />
<link rel='stylesheet' href="../assets/admin/css/openSans.css" />
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
        <a  class="current" data-original-title="Go to Home">Testimonial</a>
      </div>

    </div>
  <!--End-breadcrumbs-->

  <!--Action boxes-->
    <div class="container-fluid">
      

      <div class="row-fluid">
    
        <!-- add container -->
        <div class="widget-box" id="addContainer" style="display: none;">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Add Testimonial</h5>
               
              </div>
              <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" id="addForm" enctype="multipart/form-data">
                  

                  <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                      <input type="text" name="name">
                    </div>
                  </div>
                    
                 <div class="control-group">
                    <label class="control-label">Designantion &amp; Company</label>
                    <div class="controls">
                      <input type="text" name="designation_company">
                    </div>
                  </div>    
                    
                    
                  <div class="control-group">
                    <label class="control-label">Image</label>
                    <div class="controls">
                      <input type="file" name="testimonial_image" >
                    </div>
                  </div>
                 
                  <div class="control-group">
                    <label class="control-label">Wordings</label>
                    <div class="controls">
                      <textarea name="wordings" cols="5" rows="6"></textarea>
                    </div>
                  </div>
                  <div>
                    <input type="submit" value="Add" class="btn btn-primary" style="margin-top:10px;margin-left: 250px; margin-bottom:20px; " id ="btnAddProd">
                   <input type="reset" value="Reset" class="btn btn-warning" id="btnResetAddProduct" style="margin-top:10px;margin-left: 10px; margin-bottom:20px; ">
                  </div>
                </form>  
              </div>
            </div>
          </div> 
          

        </div>
        <!-- Edit Container -->
        <div class="widget-box" id="editContainer" style="display: none;">
          <div class="span12">
            <div class="widget-box">
              <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
                <h5>Edit Testimonial</h5>
               
              </div>
              <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" id="editForm" enctype="multipart/form-data">
                  

                  <div class="control-group">
                    <label class="control-label">Name</label>
                    <div class="controls">
                      <input type="text" name="name">
                      <input type="hidden" name="id">
                    </div>
                  </div>
                   
                  <div class="control-group">
                    <label class="control-label">Designantion &amp; Company</label>
                    <div class="controls">
                      <input type="text" name="designation_company">
                    </div>
                  </div>  
                    
                    
                  <div class="control-group">
                    <label class="control-label">Image</label>
                    <div class="controls">
                      <input type="file" name="testimonial_image">
                    </div>
                  </div>
                 
                  <div class="control-group">
                    <label class="control-label">Wordings</label>
                    <div class="controls">
                      <textarea name="wordings" cols="5" rows="6"></textarea>
                    </div>
                  </div>


                   <!--<div class="control-group">
                    <label class="control-label">Status</label>
                    <div class="controls" id="statusDropDown">
                     
                    </div>
                  </div>-->

                  <div>
                    <input type="submit" value="Update" class="btn btn-primary" style="margin-top:10px;margin-left: 250px; margin-bottom:20px; " >
                   
                      <input type="reset" value="Reset" class="btn btn-warning" style="margin-top:10px;margin-left: 20px; margin-bottom:20px; " >
                  </div>
                </form>  
              </div>
            </div>
          </div> 
          

        </div>
        <!-- view container -->  
        <div class="widget-box">

          <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
            <h5>Testimonial Details</h5>
           <div class="btn btn-danger btn-lg pull-right" style="margin-top: 3px; margin-right: 3px; display: none;" id="btnCancel">Cancel</div>
           <div class="btn btn-primary btn-lg pull-right" style="margin-top: 3px; margin-right: 3px; " id="btnCreate">Add Testimonial</div>
          </div>
          <div></div>  
          <div class="widget-content ">
            <h4><center>View Course Details </center></h4>
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sr.No.</th>
                  <th>Name</th>
                    <th>Designation/Company</th>
                  <th style="width:8%;">Image</th>
                  <th>Testimonial</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="tableContainer">

                <?php

                  $record = $obj->select("*","testimonial","1");
                  if(is_array($record)):
                    foreach ($record as $key => $value):
                ?>      
                  <tr>
                    <td><?= $key+1 ?></td>
                    <td><?= $value[1]?></td>
                   <td><?= $value[2]?></td>
                    <td><img src="../<?= $value[4]?>" class="img-responsive" ></td>
                    <td><?= $value[3]?></td>
                    <td><!--<center><span class="btn <?= ($value[4] == 1)? 'btn-success' : 'btn-danger'?>"><?= $value[5] ?> </span></center>--></td>
                    <td>

                      
                        <center>
                          <a id="e-<?= $value[0] ?>" class="edit-element tip-bottom" data-original-title="Edit"><i class="icon-edit"></i></a>                    
                          <a class="remove-element tip-bottom" id="d-<?= $value[0] ?>" data-original-title="Remove"><i class="icon-trash"></i></a>                 
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
<script src="../assets/admin/js/bootstrap-datepicker.js"></script> 
<script src="../assets/admin/js/jquery.validate.js"></script> 
<script src="../assets/admin/js/jquery.wizard.js"></script> 
<script src="../assets/admin/js/custom/testimonial.js"></script>

</body>
</html>
