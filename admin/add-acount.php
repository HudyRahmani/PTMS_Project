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
$teacherid=$_POST["teacherid"];
$username=$_POST["username"];
$password=md5($_POST['password']);
$repassword = md5($_POST['repassword']);
  
	$query=$dbh->prepare("SELECT * from  acount where ID='$teacherid' ");
	$query->execute();
	$results=$query->fetchAll(PDO::FETCH_OBJ);
	  
		if(empty($_POST["username"])){
				$errors["username"] = "نام استاد ضروری است";
			}
		 
		else if($password != $repassword){
			$errors["repassword"] = "رمز و تکرار مرز باهم همخوانی نمیکند";
		}
		else if($query->rowCount() > 0){
		  $errors["duplicate"] = "آمر صاحب قبلا برای این استاد حساب ساخته شده"; 
   }
   
  else{
  
$sql="insert into acount(ID,username,password)values(:teacherid,:username,:password)";
$query=$dbh->prepare($sql);
$query->bindParam(':teacherid',$teacherid,PDO::PARAM_STR);
$query->bindParam(':username',$username,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
 
 
$query->execute();
$LastInsertId=$dbh->lastInsertId();
if ($LastInsertId>0) {
	header("location:manage-acount.php?adda=done");
}else{
	$errors["somethingwrong"]="مشکل پیش آمده دوباره کوشش کنید";
    } 
}
}
?>

<!doctype html>
<html class="no-js" lang="fa">

<head>
   
    <title>صفحه اضافه کردن استادان</title>
  

    <link rel="apple-touch-icon" href="apple-icon.png">


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
		
	</script>


</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs" dir="rtl">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
						<ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">دشبورد</a></li>
                            <li><a href="manage-acount.php">جزیات حساب های</a></li>
                            <li class="active">اضافه کردن حساب</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                         <h1>جزیات حساب</h1>
                    </div>
                </div>
            </div>
        </div>
		<div class="float-right" style="margin-right:20px;">
			 
			<div class="text-danger"><h5 > <?php echo $errors['duplicate'];  ?></h5></div>
			<div class="text-danger"><h5 > <?php echo $errors['repassword'];  ?></h5></div>
			<div class="text-danger"><h5 > <?php echo $errors['somethingwrong'];  ?></h5></div> 
			
		</div>
        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
              
                    <!--/.col-->

                    

<!---------------------------------------------------------->
 <div class="col-lg-12" dir="rtl"> 
                        <div class="card" style="text-align:right;">
                        <div style="text-align:center;font-size:22px;" class="card-header ">  حساب جدیدی برای استاد ایجاد کنید </div>
                           <form name="" method="post" action="" enctype="multipart/form-data">
                            <div class="card-body card-block">
  
										 
										
										<div class="card" style="text-align:right;">
											 
											<div class="card-body card-block" style="font-size:17px;">
												<div class="form-group"><label for="city" class=" form-control-label">برای کدام استاد حساب ایجاد شود</label>
											<select type="text" name="teacherid"  required="true" id="teacherid" value="" class="form-control" >
												<option value="">انتخاب استاد</option>
													<?php 
													$sql2 = "SELECT * from  tblteacher ";
													$query2 = $dbh -> prepare($sql2);
													$query2->execute();
													$result2=$query2->fetchAll(PDO::FETCH_OBJ);
													foreach($result2 as $row)
													{          
													?>  
												<option value="<?php echo htmlentities($row->ID);?>"><?php echo htmlentities($row->Name);?>(<?php echo htmlentities($row->lname);?>)</option>
												 <?php } ?> 
											</select>
										</div> 
												<div class="form-group"><label for="company" class="  form-control-label">نام یوزر </label><input placeholder="نام یوزر را تایپ کنید..." required="true"   type="text" name="username" value="<?php   echo $_POST["username"];  ?>"  class="form-control" id="username"  ></div>
												<span class="text-danger"><h6> <?php echo $errors['username'];  ?></h6></span><br>
												<div class="form-group"><label for="company" class=" form-control-label">رمز استاد</label><input placeholder="مرز استاد را تایپ کنید..."  required="true"  type="password" name="password" value="<?php   echo $_POST["password"];  ?>"  class="form-control" id="lname" ></div>
												<span class="text-danger"><h6> <?php echo $errors['password'];  ?></h6></span><br>
												<div class="form-group"><label for="company" class=" form-control-label">تکرار دوباره رمز</label><input placeholder="تکرار دوباره رمز..." required="true"  type="password" name="repassword" value="<?php  echo $_POST['repassword']; ?>" class="form-control"   id="fname" ></div>
												 
											   </div>
											</form>
										</div> 
            
							 <p style="text-align: center;"><button style=" font-size:18px;width:100%;" type="submit" class="btn btn-primary btn-sm form-group" name="submit" id="submit"> <i class="fa fa-dot-circle-o" ></i> ایجاد حساب</button></p>
						</div> 
					</div>
    </div>

<!--------------------------------------------------------------------------------------------->

  

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