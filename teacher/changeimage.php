<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsuid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
$eid=$_SESSION['trmsuid'];
$propic=$_FILES["newpic"]["name"];
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$allowed_extensions = array(".jpg",".JPG",".jpeg",".png",".gif");
$extension1 = substr($propic1,strlen($propic1)-4,strlen($propic1));
$allowed_extensions1 = array(".jpg",".JPG",".jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions) && !in_array($extension1,$allowed_extensions1))
{
echo "<script>alert('Profile Pics has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$propic=md5($propic).time().$extension;
move_uploaded_file($_FILES["newpic"]["tmp_name"],"images/".$propic);
$propic1=md5($propic1).time().$extension;
move_uploaded_file($_FILES["propic1"]["tmp_name"],"idimages/".$propic1);

 $sql="update tblteacher set Picture=:pic ,propic1=:propic1 where ID=:eid ";

$query = $dbh->prepare($sql);
$query->bindParam(':pic',$propic,PDO::PARAM_STR);
$query->bindParam(':propic1',$propic1,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Image has been updated")</script>';
echo "<script>window.location.href='profile.php'</script>";

  }
}
  ?>

<!doctype html>
<html class="no-js" lang="fa">

<head>
   
    <title>تبدیل عکس</title>
  
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
                        <h1>اپدیت عکس</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">دشبورد</a></li>
                            
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

                    <div dir="rtl" style="text-align:right;" class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong> اپدیت</strong><small> عکس </small></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                
                            <div class="card-body card-block">
 <?php
$eid=$_SESSION['trmsuid'];
$sql="SELECT * from  tblteacher where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <div class="form-group"><label for="company" class=" form-control-label">نام استاد</label><input type="text" name="subjects" value="<?php  echo $row->Name;?>" class="form-control" id="subjects" readonly='true'></div>
                                <div class="form-group"><label for="company" class=" form-control-label">عکس پروفایل</label>
                                <?php if($row->Picture==''):?>
<img src="images/no-image.png"  alt="NO Image">
<?php else: ?>    
<img src="images/<?php echo $row->Picture;?>" width="100%" height="100%" value="<?php  echo $row->Picture;?>">
<?php endif;?>
                                </div>
                                <div class="form-group">
                                    <label for="company" class=" form-control-label">پروفایل جدید</label>
                                    <input type="file" name="newpic" value="" class="form-control" id="newpic" required='true'>
                                </div>
                                   
                                        
                                            
                                                    
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