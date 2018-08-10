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
        <a  class="current" data-original-title="Go to Home">Our Work</a>
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
                <h5>Create Our Work Details</h5>
               
              </div>
              <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" id="addForm" enctype="multipart/form-data">
                  
                <div class="row">
                    <div class="col-md-6 pull-left">
                        
                        
                        <div class="control-group">
                                <label class="control-label">Type</label>
                                <div class="controls">
                                    <?php
                                    $type= $obj->select("*","work_type","1 ORDER BY type");   
                                    if(is_array($type)):
                                    ?>
                                        <select name="work_type" >
                                            <option value=''>Select Type</option>
                                        <?php
                                            foreach($type as $key=>$value):
                                            ?>
                                            <option value='<?=$value[0]?>'><?=$value[1]?></option>
                                        <?php
                                            endforeach;
                                            ?>
                                        </select>
                                    <?php
                                    endif;
                                        ?>
                                    
                                </div>
                            </div>
                        
                        
                        
                        
                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" name="title" id="title">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">URL</label>
                                <div class="controls">
                                    <input type="text" name="url" id="url">
                                </div>
                            </div>

                            
                     </div>   
                
                    <div class="col-md-6 pull-left">
                          <div class="control-group">
                            <label class="control-label">Publish Date</label>
                            <div class="controls">
                                <input type="date" name="publish_date">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label">For Whom</label>
                            <div class="controls">
                                <input type="text" name="for_whom" id="for_whom">
                            </div>
                          </div>  

                        <div class="control-group">
                                <label class="control-label">Image</label>
                                <div class="controls">
                                    <input type="file" name="work_image" id="work_image" >
                                </div>
                          </div>  
                        
            <div class="control-group">
                <input type="submit" value="Add" class="btn btn-primary" style="margin-top:10px;margin-left: 100px; margin-bottom:0px;  " id ="btnAddProd">
                <input type="reset" value="Reset" class="btn btn-warning" id="btnResetAddProduct" style="margin-top:10px;margin-left: 100px; margin-bottom:0px;  ">
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
                <h5>Edit Our Work Details</h5>
               
              </div>
              <div class="widget-content nopadding">
                <form class="form-horizontal" method="post" id="editForm" enctype="multipart/form-data">
                  
                <div class="row">
                    <div class="col-md-6 pull-left">
                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls" id="typeDropDown">
                                </div>
                            </div>
                        
                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" name="title">
                                    <input type="hidden" name="id">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">URL</label>
                                <div class="controls">
                                    <input type="text" name="url">
                                </div>
                            </div>

                             
                     </div>   
                
                    <div class="col-md-6 pull-left">
                          <div class="control-group">
                            <label class="control-label">Publish Date</label>
                            <div class="controls">
                                <input type="date" name="publish_date">
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label">For Whom</label>
                            <div class="controls">
                                <input type="text" name="for_whom">
                            </div>
                          </div>
                        
                        <div class="control-group">
                                <label class="control-label">Image</label>
                                <div class="controls">
                                    <input type="file" name="work_image" multiple>
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
                </form>
              </div>
            </div>
          </div>

        </div>
        <!-- view container -->  
        <div class="widget-box">

          <div class="widget-title bg_lg"><span class="icon"><i class="icon-signal"></i></span>
            <h5>Our Work Details</h5>
           <div class="btn btn-primary btn-lg pull-right" style="margin-top: 3px; margin-right: 3px;" id="btnCreate">Create Our Work Details</div>
           <div class="btn btn-danger btn-lg pull-right" style="margin-top: 3px; margin-right: 3px; display: none;" id="btnCancel">Cancel</div>
          </div>
          <div></div>  
          <div class="widget-content ">
            <h4><center>View Our Work Details </center></h4>
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Sr.No.</th>
                  <th>Title</th>
                  <th>URL</th>
                  <th>Image</th>
                  <th>Type</th>
                  <th>Publish Date</th>
                  <th>For Whom</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="tableContainer">
                <?php
                  $record = $obj->select("*","our_work","1");
                  //$record = $obj->execute("SELECT categories.ID,categories.category_name" );
                  if(is_array($record)):
                  //$id=$record[0][0];
                    foreach ($record as $key => $value) :                   
                ?>
                <tr class="gradeX">
                  <td><?= $key+1; ?></td>
                  <td><?= $value[1] ;?></td>
                    <td><?= $value[2] ;?></td> 
                    <td><?= "<img src='../$value[3]' height='200' width='200'>";?></td>
                    <td>
                        <?php
                        $type = $obj->select("type","work_type","ID=$value[6]");
                        if(is_array($type)):
                            echo $type[0][0];
                        else:
                            echo "---";
                        endif;
                        ?>
                    </td>
                    <td><?= $value[4] ;?></td> 
                    <td><?= $value[5] ;?></td>
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
<script src="../assets/admin/js/custom/our_work.js"></script>

<!--end-js-part-->

</body>
</html>
