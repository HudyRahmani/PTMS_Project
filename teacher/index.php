<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT acount.ID,acount_ID,Picture ,Name FROM acount inner join tblteacher on tblteacher.ID=acount.ID WHERE username=:username and password=:password";
    $query=$dbh->prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
	$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['trmsuid']=$result->ID;
$_SESSION['trmstname']=$result->Name;
}

echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
	header("location:index.php?invalid=oky");
}
}

?>
    
<!doctype html>
<html class="no-js" lang="fa">
<head>
    
    <title>وصل شدن مدیر</title>
    

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark" style=" background-image: url('images/cool-background.png');">


    <div class="sufee-login d-flex align-content-center flex-wrap" >
        <div class="container">
            <div class="login-content">
                <div class="login-logo bg-primary p-3">
                    <h3 style="color:white"> سیستم مدیریتی استادان پوهنتون پروان </h3>
                    
                </div>
				<hr  color="white"/>
                <div dir="rtl" style="text-align:right;" class="login-form">
				<?php if(isset($_GET["invalid"])) { ?>
					<div style="color:red;" class="text-align:center;">یوزر نام و پسورد درست را تایپ کنید</div><br>
				<?php } ?>
                    <form action="" method="post" name="login">
                        
                        <div class="form-group">
                            <label>نام یوزر</label>
                            <input type="text" class="form-control" placeholder="یوزر نام خود را وارد کنید..." required="true" name="username">
                        </div>
                            <div class="form-group">
                                <label>رمز</label>
                                <input type="password" class="form-control" placeholder="رمز خود را پرداخت کنید..." name="password" required="true">
                        </div>
						<div class="checkbox">
                                    <div class="pull-left pb-4">
										<a class="p-2" style="background-color:yellow;color:black;border-radius:40px;" href="../index.php" class="bg-primary" >برگشت به صفحه اصلی<span style="font-size:20px;font-weight:bold;">&#8592;</span></a><i class="fa fa-on"></i>
									</div>
									 
                        </div>
							<!--
                            <div style="text-align:right;" class="checkbox">
                                    <label class="pull-right">
                                <a href="../index.php">صفحه اصلی</a>
                                 <label class="pull-right">
                                <a href="forgot-password.php" style="padding-left: 250px">رمز را فراموش کردم</a>
                            </label>

                            </div>
							-->
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" style="font-size:18px;" name="login">وارد شدن به سیستم</button>
                                <hr />
                                
                                
                            
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>


</body>

</html>
