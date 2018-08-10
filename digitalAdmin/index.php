<?php
    session_start();
    if(isset($_SESSION["lyrical_id"] )){
       header("Location:dashboard.php");
        exit();
    }   
include '../common/constant.php';
?>
<!--?php include '../common/constant.php';?>-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= OWNERCOMPANYNAME ?></title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../assets/admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../assets/admin/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="../assets/admin/css/matrix-login.css" />
        <link rel="stylesheet" href="../assets/admin/font-awesome/css/font-awesome.css"  />
		<link rel='stylesheet' type='text/css' href='../assets/admin/css/openSans.css'>
        <link rel="stylesheet" href="../assets/admin/css/uniform.css" />
        <link rel="stylesheet" href="../assets/admin/css/select2.css" />
        <link rel="stylesheet" href="../assets/admin/css/matrix-style.css" />
        <link rel="stylesheet" href="../assets/admin/css/matrix-media.css" />
       <!-- <link rel="shortcut icon" href="../images/logo.jpg">-->
    </head>
    <body>
        <div id="loginbox">
            <form id="loginform" class="form-vertical" >
				 <div class="control-group normal_text"> <h3><?= "Company name Constant" ?></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Enter User Name" name="user_name" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password" />
                        </div>
                    </div>
                </div>
                
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span style="width:200px;"><input type="submit" value="Login" class="btn btn-success" /></span>
                        </div>
                    </div>
                </div>
                
              <!--  
                <div class="form-actions">
                     <span class="pull-left"><a class="flip-link btn btn-info" id="to-recover">Lost password?</a></span> 
                    <center><span class=""><input type="submit" value="Login" class="btn btn-success" /></span></center>
                </div>-->
            </form>

            <!--<form id="recoverform"  class="form-vertical">
                <div class="control-group normal_text"> <h3><?= "Company name Constant" ?></h3></div>
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="email" placeholder="E-mail address" name="email" />
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a  class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><input type="submit" value="recover" class="btn btn-info"/></span>
                </div>
            </form>-->
        </div>
        <script src="../assets/admin/js/jquery.min.js"></script>  
        <script src="../assets/admin/js/matrix.login.js"></script> 
        <script src="../assets/admin/js/jquery.ui.custom.js"></script> 
        <script src="../assets/admin/js/bootstrap.min.js"></script> 
        <script src="../assets/admin/js/jquery.uniform.js"></script> 
        <script src="../assets/admin/js/select2.min.js"></script> 
        <script src="../assets/admin/js/jquery.dataTables.min.js"></script> 
        <script src="../assets/admin/js/matrix.js"></script> 
        <script src="../assets/admin/js/matrix.tables.js"></script>
        <script src="../assets/admin/js/jquery.wizard.js"></script> 
        <script src="../assets/admin/js/jquery.validate.js"></script> 
        <script src="../assets/admin/js/custom/login.js"></script>
       <!-- <script src="../assets/admin/js/custom/passwordRecovery.js"></script>-->
    </body>
</html>
