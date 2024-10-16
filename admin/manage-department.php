<?php session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
header('location:logout.php');
} else{

if($_GET['delid'])
{
$tid=$_GET['delid'];
$query=$dbh->prepare("delete from department where ID=:tid");
$query->bindParam(':tid',$tid,PDO::PARAM_STR);
$query->execute();
header("location:manage-department.php?delete=done");
  }

  ?>
<!doctype html>
<html class="no-js" lang="fa">
<head>
    
    <title>مدیریت دیپارتمنت</title>
    
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
                        <h1>مدیریت دیپارتمنت</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">دشبورد</a></li>
                            <li><a href="manage-department.php">مدیریت دیپارتمنت</a></li>
                            <li class="active">مدیریت دیپارتمنت</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
		<?php if(isset($_GET["fadd"])) { ?>
			<span class="pull-right" style="color:green; margin-right:20px;font-size:18px;">دیپارتمنت به موفقیت اضافه شد</span>
		<?php } ?>
		<?php if(isset($_GET["delete"])) { ?>
			<span class="pull-right" style="color:red; margin-right:20px;font-size:18px;">دیپارتمنت به موفقیت حذف شد</span>
		<?php } ?>

        <div dir="rtl" class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div style="text-align:right;" class="card-header">
                                <strong class="card-title">مدیریت دیپارتمنت</strong>
                            </div>
                            <div class="card-body">
                                <table style="text-align:right;" class="table">
                                    <thead>
                                        <tr>
                                            <tr>
                  <th>شماره</th>
            
                  <th>دیپارتمنت</th>
                    <th>تاریخ ثبت</th>       
                   <th>عمل</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$sql="SELECT * from department";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
              
                <tr>
                  <td><?php echo htmlentities($cnt);?></td>
            
                  <td><?php  echo htmlentities($row->department);?></td>
                  <td><?php  echo htmlentities($row->CreationDate);?></td>
                  <td>
<a href="manage-department.php?delid=<?php echo htmlentities ($row->ID);?>" class="btn btn-danger w-100" onclick="return confirm('آیا مطمئن هستید که می خواهید این دیپارتمنت را حذف کنید؟');">حذف دیپارتمنت</a>
                  </td>
                </tr>
               <?php $cnt=$cnt+1;}} ?>   

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


</body>

</html>
<?php }  ?>