<?php 
include '../common/session.php';
 /*session_start();
    if(!isset($_SESSION["lyrical_id"] )){
       header("Location:index.php");
        exit();
    } */  
?>
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Welcome <!--?php echo ucwords($_SESSION['log_name']) ?>--></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <!-- <li><a href="change-password.php"><i class="icon-user"></i> Change Password</a></li>  -->
        <li class="divider"></li>
        <li><a href="logout.php"><i class="icon-key"></i> Log Out</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="logout.php"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
