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
$query=$dbh->prepare("delete from tblteacher where ID=:tid");
$query->bindParam(':tid',$tid,PDO::PARAM_STR);
$query->execute();
echo '<script>alert("Teacher deleted")</script>';
echo "<script>window.location.href ='manage-teacher.php'</script>";
  }


  ?>
<!doctype html>
<html class="no-js" lang="fa">
<head>
    
    <title>TRMS || Manage Teacher (poyaly Profile)</title>
    
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
                        <h1>مدیریت استادان</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">دشبورد</a></li>
                            <li><a href="manage-teacher.php">مدیریت استادان</a></li>
                            <li class="active"></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div dir="rtl" class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div style="text-align:right;" class="card-header">
                                <strong class="card-title">مدیریت استادان که رتبه علمی آنها پوهیالی هستند</strong>
                            </div>
                            <div class="card-body">
                                <table style="text-align:right;" id="dtBasicExample" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <tr>  
				  <th>شماره</th>
				 <th>عکس استاد</th>
                  <th>نام استاد</th>
                   <th>درجه تحصیلی</th>
                    <th>دسترسی</th>       
                   <th>عمل</th>
                   
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
$sql="SELECT * from tblteacher where degree='3'";
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
							   <td><img src="../teacher/images/<?php echo $row->Picture;?>" width="50" height="50" style="border-radius:100px;" value="<?php  echo $row->Picture;?>" ></td>
						<td><?php  echo htmlentities($row->Name);?>(<?php  echo htmlentities($row->lname);?>)</td>
 
							  <td><?php  $scienc=$row->sciencer;
										if($scienc=='1'){
											echo "پوهاند" ;
										}
										else if($scienc=='2'){
											echo "پوهنوال";
										}
										else if($scienc=='3'){
											echo "پوهندوی";
										}
										else if($scienc=='4'){
											echo "پوهنمل";
										}
										else if($scienc=='5'){
											echo "پوهنیار";
										}
										else if($scienc=='6'){
											echo "نامزد پوهنیار";
										}
										else if($scienc=='7'){
											echo "پوهیالی";
										}
										echo htmlentities($row->scienc);?>
							  </td>
								 <td><?php  $degre=$row->degree;
										if($degre=='1'){
											echo "لیسانس" ;
										}
										else if($degre=='2'){
											echo "ماستر";
										}
										else if($degre=='3'){
											echo "داکتر";
										}
										else if($degre=='4'){
											echo "مافوق داکتر";
										}
										 
										echo htmlentities($row->degre);?>
							  </td>
								<td><?php $status=$row->isPublic;
										if($status=='1'):
										echo "عمومی";
										else:
										echo "عمومی نیست";
										endif;    
									?></td>
									  
									  <td><a href="edit-teacher-detail.php?tid=<?php echo htmlentities ($row->ID);?>" class="btn btn-primary">ویرایش</a>
					<a href="manage-teacher.php?delid=<?php echo htmlentities ($row->ID);?>" class="btn btn-danger" onclick="return confirm('Do you really want to delete?');">حذف</a>
					<a href="queries.php?tid=<?php echo htmlentities ($row->ID);?>&&tname=<?php  echo htmlentities($row->Name);?> (<?php  echo htmlentities($row->tsub);?>)" class="btn btn-primary">سوالات پرسیده شده ؟</a>

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