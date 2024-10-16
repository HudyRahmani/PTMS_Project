<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=$_GET['tid'];
$propic1=$_FILES["propic1"]["name"];
$extension = substr($propic1,strlen($propic1)-4,strlen($propic1));
$allowed_extensions = array(".jpg","jpeg",".png",".gif",".JPG",".PNG",".JPEG");
if(!in_array($extension,$allowed_extensions))
{
$errors["invalid"]="jpg / jpeg/ png /gif فارمت درست انتخاب عکس ";
}
else
{

$propic1=md5($propic1).time().$extension;
 move_uploaded_file($_FILES["propic1"]["tmp_name"],"../teacher/idimages/".$propic1);

 $sql="update tblteacher set propic1=:propic1 where ID=:eid";

$query = $dbh->prepare($sql);
$query->bindParam(':propic1',$propic1,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
    $query->execute();

		header("location:manage-teacher.php?updateimage1=oky");

  }
}
  ?>

<!doctype html>
<html class="no-js" lang="fa">

<head>
   
    <title>اپدیت فوتوکاپی استاد</title>
  
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
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>اپدیت فوتوکاپی تذکره استاد</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">دشبورد</a></li>
                            <li><a href="manage-teacher.php">اپدیت فوتوکاپی تذکره استاد</a></li>
                            <li class="active">اپدیت</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->
					<div class="text-danger"><h6> <?php echo $errors['invalid'];  ?></h6></div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div style="text-align:right;" class="card-header"><small> اپدیت </small>فوتوکاپی <strong></strong></div>
                            <form dir="rtl" style="text-align:right;" name="" method="post" action="" enctype="multipart/form-data">
                                
                            <div class="card-body card-block">
 <?php
$eid=$_GET['tid'];
$sql="SELECT * from  tblteacher where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <div class="form-group"><label for="company" class=" form-control-label">نام استاد</label><input type="text" name="subjects" value="<?php  echo $row->Name;?>(<?php  echo $row->lname;?>)" class="form-control" id="subjects" readonly='true'></div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">اپدیت فوتوکاپی تذکره استاد</label>
                                                                <?php if($row->propic1==''):?>
<img src="../teacher/images/no-image.png"  alt="NO Image">
<?php else: ?>    
<img src="../teacher/idimages/<?php echo $row->propic1;?>" class="w-75 h-75" value="<?php  echo $row->propic1;?>">
<?php endif;?>
                                </div>
                                <div class="form-group"><label for="company" class=" form-control-label">پروفایل جدید </label><input type="file" name="propic1" value="" class="form-control" id="propic1" required='true'></div>
                                   
                                        
                                            
                                                    
                                                    </div>
                                                   <?php $cnt=$cnt+1;}} ?> 
                                                     <div class="card-footer">
                                                       <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i> اپدیت
                                                        </button></p>
                                                        
                                                    </div>
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
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