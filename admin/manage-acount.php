<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{

//Code for Deletion
if($_GET['delid'])
{
$tid=$_GET['delid'];
$query=$dbh->prepare("delete from acount where acount_ID=:tid");
$query->bindParam(':tid',$tid,PDO::PARAM_STR);
$query->execute();
	header("location:manage-acount.php?erorr=done");
  }


  ?>
<!doctype html>
<html class="no-js" lang="fa">
<head>
    
    <title>مدیریت کردن حسابها</title>
    
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
                        <h1>مدیریت حسابها</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">دشبورد</a></li>
                            <li><a href="manage-acount.php">مدیریت  حسابهای استادان</a></li>
                            <li class="active">مدیریت حسابهای استادان</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div dir="rtl" style="text-align:right;" class="content mt-3 ">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
					<?php if(isset($_GET["adda"])){ ?>
							<span  style="color:green;margin-right:10px;font-size:18px;">حساب به موفقیت ایجاد شد</span>
						<?php } ?>
						<?php if(isset($_GET["erorr"])){ ?>
							<span  style="color:red;margin-right:10px;font-size:18px;">حساب حذف شد</span>
						<?php } ?>
						<?php if(isset($_GET["change"])){ ?>
							<span  style="color:green;margin-right:10px;font-size:18px;">پسورد تبدیل شد</span>
						<?php } ?>
						 
                        <div class="card">
						
                            <div style="text-align:center;font-size:19px;"  class="card-header">
                                <span class="card-title">مدیریت کردن حسابهای استادان</span>
                            </div>
                            <div class="card-body">
                                <table id="dtBasicExample" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <tr>
											    <th>شماره</th>
											    <th>عکس استاد</th>
											    <th>نام یوزر استاد</th>      
											    <th>عمل</th>
											</tr>
                                        </tr>
                                       </thead>
   <?php
		$sql="SELECT acount_ID , acount.ID ,  username ,Picture from acount inner join tblteacher on tblteacher.ID=acount.ID";
		$query = $dbh -> prepare($sql);
		$query->execute();
		$results=$query->fetchAll(PDO::FETCH_OBJ);
		
		
		
		$cnt=1;
		if($query->rowCount() > 0)
		{
		foreach($results as $row)
		{               
	?>   
              
                  <tr>
							  <td><?php echo htmlentities($cnt);?></td>
							   <td><img src="../teacher/images/<?php echo $row->Picture;?>" width="50" height="50" style="border-radius:100px;" value="<?php  echo $row->Picture;?>" ></td>
						<td><?php  echo htmlentities($row->username);?> </td>
     
					 <td><a href="../teacher/forgot-password.php?tid=<?php echo htmlentities ($row->acount_ID);?>" class="btn btn-primary w-50">ویرایش حساب</a>
						<a href="manage-acount.php?delid=<?php echo htmlentities ($row->acount_ID);?>" class="btn btn-danger w-25" onclick="return confirm('Do you really want to delete?');">حذف حساب</a>
						
						
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
    <script  src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css">
<script type="text/javascript">
    $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
</body>

</html>
<?php }  ?>