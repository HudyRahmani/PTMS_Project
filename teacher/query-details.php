<?php
session_start();
//error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsuid']==0)) {
  header('location:logout.php');
  } else{
// Updating Notes

if(isset($_POST['submit']))
{
$tid=$_SESSION['trmsuid'];
$qid=intval($_GET['qid']);
$notes=$_POST['notes'];
$query=$dbh->prepare("update tblquery set teacherNote=:notes where teacherId=:tid and id=:qid");
$query->bindParam(':notes',$notes,PDO::PARAM_STR);
$query->bindParam(':tid',$tid,PDO::PARAM_STR);
$query->bindParam(':qid',$qid,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Notes updated succesfull.")</script>';
echo "<script>window.location.href='queries.php'</script>";
}


  ?>
<!doctype html>
<html class="no-js" lang="fa">
<head>
    
    <title>مدیریت سوالات</title>
    
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
                        <h1>جزیات سوالات</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">دشبورد</a></li>
                            
                            <li class="active">جزیات سوالات</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div dir="rtl" style="text-align:right;" class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">جزیات سوالات</strong>
                            </div>
                            <div class="card-body">
                                <table id="dtBasicExample" class="table table-striped table-bordered">
                                    <thead>
                                        </thead>
<?php
$tid=$_SESSION['trmsuid'];
$qid=intval($_GET['qid']);
$sql="SELECT * from tblquery where teacherId='$tid' and id='$qid'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
              
                <tr>
               <th>نام کامل </th>
            <td><?php  echo htmlentities($row->fName);?></td>
            <th>ایمل آدرس </th>
                  <td><?php  echo htmlentities($row->emailId);?></td>
              </tr>
              <tr>
                <th>شماره تماس</th>
                   <td><?php  echo htmlentities($row->mobnum);?></td>
                   <th>تاریخ سوال</th>
                  <td><?php  echo htmlentities($row->queryDate);?></td>
              </tr>
<tr>
    <th>سوال</th>
     <td colspan="3"><?php  echo htmlentities($row->Query);?></td>
</tr>



 

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
    <script src="./assets/js/main.js"></script>
</body>

</html>
<?php }  ?>