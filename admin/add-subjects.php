<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$trmsaid=$_SESSION['trmsaid'];

$faculty=$_POST['faculty'];

$sql="insert into faculty(faculty)values(:faculty)";
$query=$dbh->prepare($sql);
$query->bindParam(':faculty',$faculty,PDO::PARAM_STR);
$query->execute();
$LastInsertId=$dbh->lastInsertId();
if ($LastInsertId>0) { 
	header("location:manage-subjects.php?fadd=done");
}else{
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
}
?>

<!doctype html>
<html class="no-js" lang="fa">

<head>
   
    <title>راجستر کردن پوهنځی</title>
  

    <link rel="apple-touch-icon" href="apple-icon.png">


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div dir="rtl" class="breadcrumbs">
            <div class="col-sm-5">
                <div class="page-header float-left">
                    <div class="page-title">
						<ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">داشبورد</a></li>
                            
							
                            <li class="active">اضافه کردن پوهنځی</li>
                        </ol>
                       
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div  class="page-title">
                         <h1>چزیات پوهنځی</h1>
                    </div>
                </div>
            </div>
        </div>
		
        <div  class="content mt-3">
            <div class="animated fadeIn">


               

                    <div  class="col-lg-12">
                        <div class="card" style="text-align:right;">
                            <div class="card-header" ><small> جزیات </small><strong>پوهنځی </strong></div>
                            <form dir="rtl" method="post"  >
                                
                            <div class="card-body card-block">
 
                                <label dir="rtl"></label>
								<input type="text" name="faculty" value="" class="form-control" placeholder=" نام پوهنځی را اضافه کنید . . ." id="faculty" required="true"></div>
                                              <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                               <i class="fa fa-dot-circle-o"></i>  اضافه کردن پوهنځی </button></p>
                               </div>
                            </form>
                         </div>
                       </div>
                     
                    </div><!-- .content -->
                </div><!-- /#right-panel -->
                <!-- Right Panel -->


                            <script src="../vendors/jquery/dist/jquery.min.js"></script>
                            <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
                            <script src="../vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="../vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>
                            <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="../assets/js/main.js"></script>
</body>
</html>
<?php }  ?>