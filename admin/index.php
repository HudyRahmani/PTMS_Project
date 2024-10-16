<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) {
			 
				$username=$_POST['username'];
				$password=md5($_POST['password']);
				$sql ="SELECT ID FROM tbladmin WHERE UserName=:username and Password=:password";
				$query=$dbh->prepare($sql);
				$query-> bindParam(':username', $username, PDO::PARAM_STR);
				$query-> bindParam(':password', $password, PDO::PARAM_STR);
				$query-> execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
			     if($query->rowCount() > 0){
						foreach ($results as $result) {
						$_SESSION['trmsaid']=$result->ID;
						}
						$_SESSION['login']=$_POST['username'];
						header("location:dashboard.php");
				} else{
					header("location:index.php?invalid=details");
				}
				 
				 
}

?>
    
<!doctype html>
<html class="no-js" lang="fa">
<head>
    
    <title>وارد شدن به حساب مدیر</title>
    

    <link rel="apple-touch-icon" href="apple-icon.png">
   


    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body  class="bg-dark" style=" background-image: url('images/5.jpg'); background-size:cover;">


    <div class="sufee-login d-flex align-content-center flex-wrap p-5" >
        <div class="container" style="font-family:arial; shadow" >
            <div class="login-content" style="box-shadow:1px 1px 40px 20px grey;">
                <div class="login-logo bg-primary p-3 ">
                    <h3 style="color:black" class="text-white" >سیستم معلوماتی استادان پوهنتون پروان </h3>
                </div>
				<hr  color="black"/>
                <div class="login-form py-5 ">
					<?php if(isset($_GET["password"])) { ?>
						<div style="text-align:center;color:green"  >پسورد به موفقیت تبدیل شد</div>
					<?php } ?>
                    <form dir="rtl" action=""  method="post" name="login">
                        <?php if(isset($_GET["invalid"])) { ?>
							<span class="pull-right" style="color:red">نام یوزر یا پسورد اشتبا است </span><br>
						<?php } ?>
                        <div class="form-group ">
                            <label class="pull-right">نام یوزر</label>
                            <input type="text" class="form-control" placeholder="نام کاربر خود را وارد کنید..." required="true" name="username">
                        </div>
                            <div class="form-group">
                                <label class="pull-right">رمز عبور</label>
                                <input type="password" class="form-control" placeholder="رمز ورود خود را وارد کنید..." name="password" required="true">
                        </div>
                                <div class="checkbox">
                                    <div class="pull-left pb-4">
										<a class="p-2" style="background-color:yellow;color:black;border-radius:40px;" href="../index.php" class="bg-primary" >برگشت به صفحه اصلی<span style="font-size:20px;font-weight:bold;">&#8592;</span></a><i class="fa fa-on"></i>
									</div>
									 <div class="pull-right pd-4">
										<a class="p-2  " style="background-color:yellow;color:red;border-radius:40px;" href="forgot-password.php" >رمز فراموشم شده<span style="font-size:20px;">؟</span></a>
									</div> 
                                </div>
                                <button style="font-size:18px;" type="submit" class="btn btn-primary btn-flat m-b-2 m-t-30" name="login" >ورود به سیستم</button>
                                
                            
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
