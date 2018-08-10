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
<!--
<link rel="shortcut icon" href="../images/logo.jpg">
-->
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
        <a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a>
        <a  class="current" data-original-title="Go to Home">Team Efforts</a>
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
              <div class="widget-title"><span class="icon"><i class="icon-info-sign"></i></span>
                <h5>Create Team Effort Details</h5>
               
              </div>
              <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" id="addForm">
                  
                <div class="row">
                    <div class="col-md-6 pull-left">
                            <div class="control-group">
                                <label class="control-label">Working Hours</label>
                                <div class="controls">
                                    <input type="text" name="working_hours">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Happy Clients</label>
                                <div class="controls">
                                    <input type="text" name="happy_clients">
                                </div>
                            </div> 
                     </div>   
                
                    <div class="col-md-6 pull-left">
                          <div class="control-group">
                            <label class="control-label">Awards</label>
                            <div class="controls">
                                <input type="text" name="awards">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label">Projects</label>
                            <div class="controls">
                                <input type="text" name="projects">
                            </div>
                          </div>  

            <div class="control-group">
                <input type="submit" value="Add" class="btn btn-primary" style="margin-top:10px;margin-left: 100px; margin-bottom:0px;  " id ="btnAddProd">
                <input type="reset" value="Reset" class="btn btn-warning" id="btnResetAddProduct" style="margin-top:10px;margin-left: 100px; margin-bottom:0px;  ">
            </div>
            </div>
                    
                    <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                      
                    </div>
                  </div>
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
                <h5>Edit Team Effort Details</h5>
               
              </div>
              <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" id="editForm">
                  
                <div class="row">
                    <div class="row">
                    <div class="col-md-6 pull-left">
                            <div class="control-group">
                                <label class="control-label">Working Hours</label>
                                <div class="controls">
                                    <input type="text" name="working_hours">
                                   <input type="hidden" name="id">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Happy Clients</label>
                                <div class="controls">
                                    <input type="text" name="happy_clients">
                                </div>
                            </div> 
                     </div>   
                
                    <div class="col-md-6 pull-left">
                          <div class="control-group">
                            <label class="control-label">Awards</label>
                            <div class="controls">
                                <input type="text" name="awards">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label">Projects</label>
                            <div class="controls">
                                <input type="text" name="projects">
                            </div>
                          </div>
                        
                        
                 <div class="control-group">
                  <input type="submit" value="Update" class="btn btn-primary" style="margin-top:10px;margin-left: 100px; margin-bottom:0px;  " id ="btnEdit">
                   <input type="button" value="Cancel" class="btn btn-warning" id="btnHideEditContainer" style="margin-top:10px;margin-left: 100px; margin-bottom:0px;  ">
                  </div>
                   <div class="control-group">
                    <label class="control-label"></label>
                    <div class="controls">
                      
                    </div>
                  </div>
                </div>
                </div>
                    </div>
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- view container -->  
        <div class="widget-box">

          <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
            <h5>Team Effort Details</h5>
           <div class="btn btn-primary btn-lg pull-right" style="margin-top: 3px; margin-right: 3px;" id="btnCreate">Create Team Effort Details</div>
           <div class="btn btn-danger btn-lg pull-right" style="margin-top: 3px; margin-right: 3px; display: none;" id="btnCancel">Cancel</div>
          </div>
          <div></div>  
          <div class="widget-content ">
            <h4><center>View Team Effort Details </center></h4>
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sr.No.</th>
                  <th>Working Hours</th>
                  <th>Happy Clients</th>
                  <th>Awards</th>
                  <th>Projects</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="tableContainer">
                <?php
                  $record = $obj->select("*","team_efforts","1");
                  //$record = $obj->execute("SELECT categories.ID,categories.category_name" );
                  if(is_array($record)):
                    $id=$record[0][0];
                    //foreach ($record as $key => $value) :                   
                ?>
                <tr class="gradeX">
                  <td>1</td>
                  <td><?= $record[0][1] ;?></td>
                    <td><?= $record[0][2] ;?></td>
                    <td><?= $record[0][3] ;?></td>
                    <td><?= $record[0][4] ;?></td>
                  <td>
                    <center>
                      <a id="e-<?= $id ?>" class="edit-element tip-bottom" data-original-title="Edit"><i class="icon-edit"></i></a>
                      <a class="remove-element tip-bottom" id="d-<?= $id ?>" data-original-title="Remove"><i class="icon-trash"></i></a>          
                    </center>
                  </td>
                </tr>
                <?php
                    //endforeach;  
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
<script src="../assets/admin/js/custom/team_efforts.js"></script>
<!--end-js-part-->

</body>
</html>
